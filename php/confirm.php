<?php
require_once("es.php");
session_start();
?>

<?php
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = "Encoding Error! The espected encoding is" . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
?>

<?php
//POSTされた値をセッション変数に受け渡す
if (isset($_POST['name'])) {
  $_SESSION['name'] = $_POST['name'];
}
if (isset($_POST['food'])) {
  $_SESSION['food'] = $_POST['food'];
}
$error = [];
if (empty($_SESSION['name'])) { //未設定の時エラー
  $error[] = "名前を入力してください";
} else {
  $name = trim($_SESSION['name']); //名前を取り出す
}
if (empty($_SESSION['food'])) { //未設定の時エラー
  $error[] = "好きな食べ物を入力してください";
} else {
  $food = trim($_SESSION['food']); //名前を取り出す
}
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~確認ページ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "確認ページ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <section>
      <div class="br50"></div>
      <h2>セッション確認ページ</h2>
      <form>
        <?php if (count($error) > 0) { ?>
          <!-- エラーがあったとき -->
          <span class="error"><?php echo implode('<br>', $error); ?></span><br>
          <span>
            <input type="button" value="戻る" onclick="location.href='sessionForm1.php'">
          </span>
        <?php } else { ?>
          <!-- エラーがなかったとき -->
          <span>
            　　　　名前：<?php echo es($name); ?><br>
            好きな食べ物：<?php echo es($food); ?><br>
            <input type="button" value="戻る" onclick="location.href='sessionForm1.php'">
            <input type="button" value="送信する" onclick="location.href='thanks.php'">
          </span>
        <?php } ?>
      </form>
    </section>

  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>