<?php
require_once("es.php"); //フォーム~入力データのチェック~で参照してね
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~ファイル読み込み~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "ファイル読み込み" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="readFile.php">ファイル</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <?php
    $filename = "../data/mytext.txt";
    try {
      $fileobj = new SplFileObject($filename, "rb");
    } catch (Exception $e) {
      echo '<span class="error">エラーがありました</span>';
      echo $e->getMessage();
      exit();
    }
    //ストリングを読み込む
    $readdata = $fileobj->fread($fileobj->getSize());
    if (!($readdata === FALSE)) {
      $readdata = es($readdata);
      //改行コードの前に<br>を挿入※HTMLエスケープ後に行う
      $readdata_br = nl2br($readdata, false);
      echo "{$filename}を読み込みました", "<br>";
      echo $readdata_br, "<HR>";
      echo '<a href="writeFile.php">ファイルに書き込む</a>';
    } else {
      echo '<span class="error">ファイルを読み込めませんでした</span>';
    }
    ?>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>