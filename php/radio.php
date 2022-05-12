<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~様々なフォーム~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "フォーム~ラジオ・チェック・プル・リスト" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="radio.php">様々なフォーム</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>ラジオボタンとプルダウン選択</h2>
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
        $error = []; //エラーを入れる配列
        if (isset($_POST["sex"])) {
          $sexValues = ["男性", "女性"];
          $isSex = in_array($_POST["sex"], $sexValues);
          if ($isSex) {
            $sex = $_POST["sex"];
          } else {
            $sex = "error";
            $error[] = "「性別」に入力エラーがあります。";
          }
        } else { //POSTされた値がないとき
          $isSex = false;
          $sex = "男性";
        }

        if (isset($_POST["marriage"])) {
          $marriageValue = ["独身", "既婚", "同棲中"];
          $isMarriage = in_array($_POST["marriage"], $marriageValue);
          if ($isMarriage) {
            $marriage = $_POST["marriage"];
          } else {
            $marriage = "error";
            $error[] = "「結婚」に入力エラー！！";
          }
        } else { //POSTされた値がないとき
          $isMarriage = false;
          $marriage = "独身";
        }

        if (isset($_POST["blood"])) {
          $bloodType = ["A型", "B型", "O型", "AB型"];
          $isBlood = in_array($_POST["blood"], $bloodType);
          if ($isBlood) {
            $blood = $_POST["blood"];
          } else {
            $blood = "error";
            $error[] = "「血液型」に入力エラー！！";
          }
        } else { //POSTされた値がないとき
          $isBlood = false;
          $blood = "A型";
        }
        ?>


        <?php
        //ラジオボタンを初期値でチェック(選択)するかどうか
        function checked($value, $question)
        {
          if (is_array($question)) { //配列のとき値が含まれていればtrue
            $isChecked = in_array($value, $question);
          } else { //配列でないとき値が一致すればtrue
            $isChecked = ($value === $question);
          }
          if ($isChecked) { //フォームのinputにchecked入れるかどうか
            echo "checked";
          } else {
            echo "";
          }
        }

        //プルダウンを初期値でチェック(選択)するかどうか
        function selected($value, $question)
        {
          if (is_array($question)) {
            $isSelected = in_array($value, $question);
          } else {
            $isSelected = ($value === $question);
          }
          if ($isSelected) { //フォームのinputにselected入れるかどうか
            echo "selected";
          } else {
            echo "";
          }
        }
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li><span>性別：　</span>
              <label><input type="radio" name="sex" value="男性" <?php checked("男性", $sex); ?>>男性</label>
              <label><input type="radio" name="sex" value="女性" <?php checked("女性", $sex); ?>>女性</label>
            </li>
            <li><span>結婚：　</span>
              <label><input type="radio" name="marriage" value="独身" <?php checked("独身", $marriage); ?>>独身</label>
              <label><input type="radio" name="marriage" value="既婚" <?php checked("既婚", $marriage); ?>>既婚</label>
              <label><input type="radio" name="marriage" value="同棲中" <?php checked("同棲中", $marriage); ?>>同棲中</label>
            </li>
            <li><span>血液型：　</span>
              <select name="blood">
                <option value="A型" <?php selected("A型", $blood); ?>>A型</option>
                <option value="B型" <?php selected("B型", $blood); ?>>B型</option>
                <option value="O型" <?php selected("O型", $blood); ?>>O型</option>
                <option value="AB型" <?php selected("AB型", $blood); ?>>AB型</option>
              </select>
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <?php
        $isSubmited = $isSex && $isMarriage;
        if ($isSubmited) { //「性別」と「結婚」が受信されていれば結果を表示
          echo "<HR>";
          echo "あなたは{$sex}、{$marriage}です。", "<br>";
          echo "血液型は{$blood}です。";
        }
        ?>

        <?php
        if (count($error) > 0) { //エラー表示
          echo "<HR>";
          //implode関数で配列の要素に<br>を付けて連結
          echo '<span class = "error">', implode("<br>", $error), '</span>';
        }
        ?>


        <h2>チェックボックスとリストボックスで選択</h2>
        <?php
        $error2 = [];
        if (isset($_POST["tour"])) {
          $tours = ["キャンプ", "コテージ", "ホテル"];
          $diffValue = array_diff($_POST["tour"], $tours); //配列同士を比較し、重複していない要素を取得
          if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
            $tourChecked = $_POST["tour"];
          } else {
            $tourChecked = [];
          }
        } else {
          $tourChecked = [];
          $error2[] = "「宿泊先」にエラーがあります。";
        }

        if (isset($_POST["meal"])) {
          $meals = ["朝食付き", "昼食付き", "ディナー付き"];
          $diffValue = array_diff($_POST["meal"], $meals); //配列同士を比較し、重複していない要素を取得
          if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
            $mealChecked = $_POST["meal"];
          } else {
            $mealChecked = [];
          }
        } else {
          $mealChecked = [];
          $error2[] = "「食事」にエラーがあります。";
        }

        if (isset($_POST["place"])) {
          $placeArea = ["河川", "山", "海"];
          $diffValue = array_diff($_POST["place"], $placeArea); //配列同士を比較し、重複していない要素を取得
          if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
            $placeSelected = $_POST["place"];
          } else {
            $placeSelected = [];
          }
        } else {
          $placeSelected = [];
          $error2[] = "「場所」にエラーがあります。";
        }
        ?>


        <!-- 入力フォーム -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li><span>宿泊先：　</span>
              <label><input type="checkbox" name="tour[]" value="キャンプ"
                  <?php checked("キャンプ", $tourChecked); ?>>キャンプ</label>
              <label><input type="checkbox" name="tour[]" value="コテージ"
                  <?php checked("コテージ", $tourChecked); ?>>コテージ</label>
              <label><input type="checkbox" name="tour[]" value="ホテル" <?php checked("ホテル", $tourChecked); ?>>ホテル</label>
            </li>
            <li><span>お食事：　</span>
              <label><input type="checkbox" name="meal[]" value="朝食付き"
                  <?php checked("朝食付き", $mealChecked); ?>>朝食付き</label>
              <label><input type="checkbox" name="meal[]" value="昼食付き"
                  <?php checked("昼食付き", $mealChecked); ?>>昼食付き</label>
              <label><input type="checkbox" name="meal[]" value="ディナー付き"
                  <?php checked("ディナー付き", $mealChecked); ?>>ディナー付き</label>
            </li>
            <li><span>場所：　</span>
              <select name="place[]" size="3" multiple>
                <option value="河川" <?php selected("河川", $placeSelected); ?>>河川</option>
                <option value="山" <?php selected("山", $placeSelected); ?>>山</option>
                <option value="海" <?php selected("海", $placeSelected); ?>>海</option>
              </select>
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <!-- 宿泊先か食事のどちらかがチェックされていれば結果表示 -->
        <?php
        $isSelected = count($mealChecked) > 0 || count($tourChecked) > 0;
        if ($isSelected) {
          echo "<HR>";
          echo "宿泊先：", implode("と", $tourChecked), "<br>";
          echo "お食事：", implode("と", $mealChecked), "<br>";
          echo "場所：", implode("と", $placeSelected), "<br>";
        } else {
          echo "<HR>";
          echo "選択されていません。";
        }
        ?>

        <?php
        if (count($error2) > 0) { //エラー表示
          echo "<HR>";
          //implode関数で配列の要素に<br>を付けて連結
          echo '<span class = "error">', implode("<br>", $error2), '</span>';
        }
        ?>
        <!-- 初期値でチェックchecked関数は上記のラジオボタンフォームを参照 -->


        <div class="blank"></div>

        <h3>文字エンコード検証とhtmlエスケープ</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$xss}";
        ?><br>

        <h3>ラジオボタンとプルダウンのフォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$radio}";
        ?><br>

        <h3>チェックボックスとリストボックスのフォーム</h3>
        <?php
        require_once("code.php");
        echo "{$checkBox}";
        ?><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>