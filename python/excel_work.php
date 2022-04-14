<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~エクセルの自動化(work)~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "エクセルの自動化(work)" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="excel_work.php">EXCEL</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>請求書をテンプレートに自動生成</h2>
        <p>ビジネス書類はどの会社でも特定のフォーマットが決まっているでしょうから、プログラミングでテンプレートにデータを流し込むだけという状態にしていきます。<br><br>
          今回は下記のようなテンプレの請求書を用意して自動生成させていきます。</p>
        <img src="../images/py_img/invoice_temp.png" alt="請求書テンプレ" width="70%">

        <h3>請求書の自動生成</h3>
        <?php
        require_once("pyCode.php");
        echo $invoice;
        ?>
        <img src="../images/py_img/invoice01.png" alt="請求書" width="70%">





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