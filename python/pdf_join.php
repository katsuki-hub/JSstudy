<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~PDF結合~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "PDF結合" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="pdf_join.php">PDF結合</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>PDFファイルを編集ソフトなしで結合</h2>
        <p>PDFを操作するライブラリー<b>PyPDF2</b>をコマンドラインよりインストールしておきます。</p>
        <h3>PDFファイルを結合</h3>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install pypdf2
        </div>
        <p>結合用の作業ファイルを作成し、「pdf_files」というフォルダの中に結合させたいPDFファイルを入れておく</p>
        <?php
        require_once("pyCode.php");
        echo $pdf_join;
        ?>
        <div class="br50"></div>

        <h3>画像ファイルをPDFファイルに結合</h3>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install img2pdf
        </div>
        <p>「image_files」というフォルダの中に結合させたい画像ファイルを入れておく</p>
        <?php echo $imagePDF; ?>
        <div class="frame4">
          画像データのサイズなどそのまま出力させていますが、明示的に指定することもできます。ただし、様々なファイルサイズによってエラーが多発したため、明示的に指定していません
        </div>
        <div class="frame1">
          <b>例外処理</b>
          <hr>
          try:<br>
          　　# 例外が発生しそうな処理<br>
          except:<br>
          　　# 例外が起きたとき<br>
          finally:<br>
          　　# 例外の有無に関わらず必ず実行する処理
        </div>
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