<?php
require_once("es.php");
session_start();
$error = [];
//セッションのチェック
if (!empty($_SESSION['name']) && !empty($_SESSION['food'])) {
  $name = $_SESSION['name'];
  $food = $_SESSION['food'];
} else {
  $error[] = "セッションエラーです";
}

killSession();
?>

<?php
function killSession()
{
  $_SESSION = []; //セッション変数の値を空にする
  //セッションクッキーを破棄
  if (isset($_COOKIE[session_name()])) {
    $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - 36000, $params['path']);
  }
  session_destroy(); //セッションを破棄
}
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~完了ページ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "完了ページ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <section>
      <div class="br50"></div>
      <h2>セッション完了ページ</h2>
      <?php if (count($error) > 0) { ?>
      <!-- エラーがあったとき -->
      <span class="error"><?php echo implode('<br>', $error); ?></span><br>
      <a href="sessionForm1.php">最初のページに戻る</a>
      <?php } else { ?>
      <!-- エラーがなかったとき -->
      <span>
        次のように受付しました。ありがとうございました。
        <HR>
        <span>
          　　　　名前：<?php echo es($name); ?><br>
          好きな食べ物：<?php echo es($food); ?><br>
          <a href="sessionForm1.php">最初のページに戻る</a>
        </span>
      </span>
      <?php } ?>
    </section>
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