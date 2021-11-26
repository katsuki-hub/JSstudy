<!doctype html>
<html lang="ja">

<head>
  <?php include(dirname(__FILE__) . '/../commom/phpHead.php'); ?>
  <title>PHP編”フォーム~入力データのチェック~”</title>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <div class="header-contents">
      <h1>フォーム~入力データのチェック~</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formDetaCheck.php">フォーム~データチェック~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>値が入っているかどうかチェック</h2>
        <h3>入力フォームを表示</h3>
        <form method="POST" action="nameCkeck.php">

        </form>




      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php include(dirname(__FILE__) . '/../commom/footer.php'); ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>