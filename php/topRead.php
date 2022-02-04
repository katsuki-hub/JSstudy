<?php
require_once("es.php");
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~メモ読み込み~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "メモ読み込み" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="topMemo.php">TOPメモ</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <?php
    $filename = "../data/topMemo.txt";
    try {
      $fileObj = new SplFileObject($filename, "rb");
    } catch (Exception $e) {
      echo '<span class="error">エラーがありました</span>';
      echo $e->getMessage();
      exit();
    }

    $fileObj->flock(LOCK_SH);
    //先頭から10行取り出し
    $data = new LimitIterator($fileObj, 0, 10);
    foreach ($data as $key => $value) {
      //01~10,ストリング,改行
      echo sprintf("%02d: %s\n", $key + 1, es($value)), "<br>";
    }
    $fileObj->flock(LOCK_UN);

    echo "<HR>", '<a href="topMemo.php">メモ入力ページへ</a>';
    ?>
    <br>
    <input type="button" id="reload" value="リロード">
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script>
    var reload = document.getElementById('reload');
    reload.addEventListener('click', function() {
      window.location.reload(true);
    });
  </script>
</body>

</html>