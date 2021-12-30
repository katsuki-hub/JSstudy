<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~1つのファイルでフォーム処理~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "1つのファイルでフォーム処理" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="mile.php">フォーム~同ファイル~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>1つのファイルでフォーム処理を行う</h2>
        <?php
        require_once("es.php"); //フォーム~入力データのチェック~で参照してね
        if (!checkEn($_POST)) { //文字エンコードの検証
          $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
          $err = "Encoding Error! The espected encoding is" . $encoding;
          exit($err); //エラーメッセージを出してコードのキャンセルする
        }
        $_POST = es($_POST); //HTMLエスケープ(xss対策)
        ?>
        <b>マイルをkmに計算する</b>
        <?php
        if (isset($_POST["mile"])) {
          $isNum = is_numeric($_POST["mile"]); //数値かどうか確認
          if ($isNum) {
            $mile = $_POST["mile"];
            $error = "";
          } else {
            $mile = "";
            $error = '<span class = "error">数値を入力してください。</span>';
          }
        } else { //POSTされた値がないとき
          $isNum = false;
          $mile = "";
          $error = "";
        }
        ?>

        <!-- 入力フォーム（現在のページにPOST） -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <!-- es.phpのes()でxss対策-->
          <ul class="nolist">
            <li>
              <label>
                <input type="text" name="mile" value="<?php echo $mile; ?>">
              </label>マイル
              <?php echo $error ?>
            </li>
            <li><input type="submit" value="計算する"></li>
          </ul>
        </form>

        <?php
        if ($isNum) { //$mileが数値であれば計算結果を表示する
          echo "<HR>";
          $km = $mile * 1.609344;
          echo "{$mile}マイルは{$km}kmです！！";
        }
        ?>
        <div class="blank"></div>

        <h3>マイルをkmに換算するフォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$mileKm}";
        ?><br>
        <h4>ページが初めて開いたのかPOSTで開いたのかを判断</h4>
        <div class="frame3">
          $_POST["mile"]の値が設定されているかどうかで、初めて開いたのかフォームでPOSTでされて開いたのかを区別できる。<br>初めての時はからのフォームを表示し、POSTに値があればその入力値(マイル数)をフォーム表示し、kmに換算した計算結果を表示する。
        </div><br>

        <div class="frame2">
          <b>現在のページにPOSTする</b><br>
          現在開いているファイル名は、スーパーグローバル変数の$_SERVER['PHP_SELF']で調べることができます。<br><small>※$_SERVER['PHP_SELF']を使うことで後からファイル名を変更しても書き替えの必要がない。</small><br><br>この値を利用するならば、action = &quot;&lt;?php echo htmlspecialchars($_SERVER[&#039;PHP_SELF&#039;],ENT_QUOTES,&#039;UTF-8&#039;); ?&gt;&quot;でPOST先を指定できる。
        </div>
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