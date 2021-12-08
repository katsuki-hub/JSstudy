<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~様々なフォームボタン" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "様々なフォームボタン~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="radio.php">フォームボタン</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>ラジオボタンで選択</h2>
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
        ?>

        <!-- ラジオボタンを初期値でチェック(選択)するかどうか -->
        <?php
        function checked($value, $question)
        {
          if (is_array($question)) { //配列のとき値が含まれていればtrue
            $isChecked = in_array($value, $question);
          } else { //配列でないとき値が一致すればtrue
            $isChecked = ($value === $question);
          }
          if ($isChecked) { //ラジオボタンのinputにchecked入れるかどうか
            echo "checked";
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
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <?php
        $isSubmited = $isSex && $isMarriage;
        if ($isSubmited) { //「性別」と「結婚」が受信されていれば結果を表示
          echo "<HR>";
          echo "あなたは{$sex}、{$marriage}です。";
        }
        ?>

        <?php
        if (count($error) > 0) { //エラー表示
          echo "<HR>";
          //implode関数で配列の要素に<br>を付けて連結
          echo '<span class = "error">', implode("<br>", $error), '</span>';
        }
        ?>
        <div class="blank"></div>

        <h3>文字エンコード検証とhtmlエスケープ</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$xss}";
        ?>

        <h3>ラジオボタンのフォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$radio}";
        ?>



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