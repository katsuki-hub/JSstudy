<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~デスクトップアプリ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "デスクトップアプリ" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="desktop_app.php">PySimpleGUI</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>簡単なアプリを作ってみよう</h2>
        <p>手軽にアプリ画面を構成するのに便利なライブラリである<b>PySimpleGUI</b>を使うと簡単にデスクトップアプリを開発出来ます。</p>
        <div class="frame2">
          pip install pysimplegui
        </div>
        <h3>デスクトップアプリを構成する様々なGUI部品</h3>
        <?php
        require_once("pyCode.php");
        echo $parts;
        ?>
        <img src="../images/py_img/parts.png" alt="部品構成" width="70%">

        <h3>インチからセンチへの計算ツール</h3>
        <?php echo $inch; ?>
        <img src="../images/py_img/inch.png" alt="インチ変換" width="70%">

        <h3>デジタル時計</h3>
        <?php echo $clock; ?>
        <img src="../images/py_img/clock.png" alt="デジタル時計" width="70%">
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