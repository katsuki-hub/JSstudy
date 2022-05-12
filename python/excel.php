<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~エクセルの自動化~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "エクセルの自動化" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="excel.php">Excel</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>膨大なライブラリがPyPIで公開されている</h2>
        <p>多くの機能は後から別途インストールして使えるようになっています。<br>pythonのライブラリは、PyPI (The Python Package lndex)というWebサイトにまとめられています。</p>
        <div class="frame3">
          「openpyxl」ライブラリーを使って、Excelファイルのシートやセルからデータを取り出したり、また逆にセルにデータを書き出したりと、
          さまざまな操作が可能になります。直接Excelファイル(拡張子が｢.xlsx｣)を操作するライブラリです。
        </div>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install -U openpyxl==3.0.4
        </div>
        <h2>基本的な操作</h2>
        <h3>モジュールのimport宣言</h3>
        <?php
        require_once("pyCode.php");
        echo $import;
        ?>
        <h3>ワークブックを用意する</h3>
        <?php echo $workbook; ?>
        <h3>ワークシートを操作するためのオブジェクトを取得する方法</h3>
        <?php echo $sheet; ?>
        <h3>セル名を指定する方法</h3>
        <?php echo $cell; ?>
        <h3>ファイルを保存</h3>
        <?php echo $save; ?>
        <h3>iter_rowsで繰り返し指定範囲を取得</h3>
        <?php echo $iter; ?>
        <div class="frame3">
          pythonのイテレータはfor文と組み合わせて使い要素を反復して値を取り出す機能です。
        </div>

        <div class="br100"></div>
        <h2>年齢生年対応表</h2>
        <?php echo $agelist; ?>

        <div class="br100"></div>
        <h2>西暦和暦の対応表</h2>
        <?php echo $wareki; ?>
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