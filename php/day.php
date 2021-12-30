<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~日付フィールド~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フォーム~日付フィールド~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="day.php">フォーム~日付~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>日付フィールド</h2>
        <?php
        require_once("es.php"); //フォーム~入力データのチェック~で参照してね
        if (!checkEn($_POST)) { //文字エンコードの検証
          $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
          $err = "Encoding Error! The espected encoding is" . $encoding;
          exit($err); //エラーメッセージを出してコードのキャンセルする
        }
        $_POST = es($_POST); //HTMLエスケープ(xss対策)
        ?>

        <?php
        $error = [];
        if (!empty($_POST["theDate"])) { //POSTされた日付取り出し
          $postDate = trim($_POST["theDate"]); //日付文字列を取り出す
          $postDate = mb_convert_kana($postDate, "as"); //全角を半角にする

          $pattern1 = preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $postDate);
          $pattern2 = preg_match("#^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$#", $postDate);
          if ($pattern1) {
            $dataArray = explode("-", $postDate); //指定文字"-"で分割
          }
          if ($pattern2) {
            $dataArray = explode("/", $postDate); //指定文字"/"で分割
          }
          if ($pattern1 || $pattern2) { //正しい日付形式だったとき
            $theYear = $dataArray[0];
            $theMonth = $dataArray[1];
            $theDay = $dataArray[2];
            $isDate = checkdate($theMonth, $theDay, $theYear);
            if ($isDate) { //日付のオブジェクトを作る
              $dateObj = new DateTime($postDate);
            } else {
              $error[] = "日付として正しくありません。";
            }
          } else { //正しい日付形式でないときの表示例
            $today = new DateTime();
            $today1 = $today->format("Y-n-j");
            $today2 = $today->format("Y/n/j");
            $error[] = "日付は次のどちらかの形式で入力してください。<br>{$today1}または{$today2}";
            $isDate = false;
          }
        } else {
          $isDate = false;
          $postDate = "";
        }
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li><span>日付を選ぶ：</span>
              <input type="date" name="theDate" value=<?php echo "{$postDate}" ?>>
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <?php
        if ($isDate) { //正しい日付であれば表示する
          $date = $dateObj->format("Y年m月d日");
          $w = (int)$dateObj->format("w");
          $week = ["日", "月", "火", "水", "木", "金", "土"];
          $youbi = $week[$w];
          echo "<HR>";
          echo "{$date}は、{$youbi}曜日です。";
        }
        ?>

        <?php
        if (count($error) > 0) {
          echo "<HR>";
          echo '<span class = "error">', implode("<br>", $error), '</span>';
        }
        ?>

        <h2>年月日をプルダウン</h2>
        <?php
        //日付の初期値
        $theYear2 = date('Y');
        $theMonth2 = date('n');
        $theDay2 = date('j');
        $error = [];
        if (isset($_POST["year"]) && isset($_POST["month"]) && isset($_POST["day"])) {
          $theYear2 = $_POST["year"]; //POSTされた年月日で書き換える
          $theMonth2 = $_POST["month"];
          $theDay2 = $_POST["day"];
          //値が日付として正しいかチェック
          $isDate2 = checkdate($theMonth2, $theDay2, $theYear2);
          if (!$isDate2) {
            $error[] = "日付として正しくありません";
          } else { //日付オブジェクト作成
            $dateString = $theYear2 . "-" . $theMonth2 . "-" . $theDay2;
            $dateObj2 = new DateTime($dateString);
          }
        } else {
          $isDate2 = false;
        }
        ?>

        <!-- 今年前後15年のプルダウンメニュー -->
        <?php
        function yearOption()
        {
          global $theYear2;
          $thisYear = date('Y');
          $startYear = $thisYear - 15;
          $endYear = $thisYear + 15;
          echo '<select name = "year">', '\n';
          for ($i = $startYear; $i <= $endYear; $i++) {
            if ($i == $theYear2) {
              echo "<option value = {$i} selected>{$i}</option>", "\n";
            } else {
              echo "<option value = {$i}>{$i}</option>", "\n";
            }
          }
          echo '</select>';
        }

        //1~12月のプルダウンメニュー
        function monthOption()
        {
          global $theMonth2;
          echo '<select name = "month">';
          for ($i = 1; $i <= 12; $i++) { //POSTされた月を選択する
            if ($i == $theMonth2) {
              echo "<option value = {$i} selected>{$i}</option>", "\n";
            } else {
              echo "<option value = {$i}>{$i}</option>", "\n";
            }
          }
          echo '</select>';
        }

        //1~31日のプルダウンメニュー
        function dayOption()
        {
          global $theDay2;
          echo '<select name = "day">';
          for ($i = 1; $i <= 31; $i++) {
            if ($i == $theDay2) { //POSTされた日を選択
              echo "<option value = {$i} selected>{$i}</option>", "\n";
            } else {
              echo "<option value = {$i}>{$i}</option>", "\n";
            }
          }
          echo '</select>';
        }
        ?>

        <!-- 年月日のプルダウンメニュー -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li>
              <?php yearOption(); ?>年
              <?php monthOption(); ?>月
              <?php dayOption(); ?>日
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <?php
        if ($isDate2) {
          $date2 = $dateObj2->format("Y年m月d日");
          $w = (int)$dateObj2->format("w");
          $week = ["日", "月", "火", "水", "木", "金", "土"];
          $youbi = $week[$w];
          echo "<HR>";
          echo "{$date2}は、{$youbi}曜日です。";
        }
        ?>

        <?php
        if (count($error) > 0) {
          echo "<HR>";
          echo '<span class = "error">', implode("<br>", $error), '</span>';
        }
        ?>

        <div class="blank"></div>
        <h3>文字エンコード検証とhtmlエスケープ</h3>
        <?php
        require_once("code.php");
        echo "{$xss}";
        ?><br>

        <h3>選んだ日付の曜日を求めて表示させる</h3>
        <?php
        require_once("code.php");
        echo "{$datefield}";
        ?><br>

        <h3>プルダウンメニューで選んで入力</h3>
        <?php
        require_once("code.php");
        echo "{$pullDate}";
        ?><br>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>