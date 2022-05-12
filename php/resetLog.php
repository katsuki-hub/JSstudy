<?php
$result1 = setcookie('visitedLog[counter]', "", time() - 3600); //有効期限を過去へ
$result2 = setcookie('visitedLog[time]', "", time() - 3600);
$result = ($result1 && $result2);
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "リセットページ" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "リセットページ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <div class="blank"></div>
    <?php
    if ($result) {
      echo "訪問ログのクッキーを破棄しました", "<hr>";
      echo '<a href="visitedLog.php">訪問カウンターページに戻る</a>';
    } else {
      echo '<span class="error">クッキーの破棄でエラー</span>';
    }
    ?>
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