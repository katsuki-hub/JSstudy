<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~クッキーの読み・書き・削除~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>アンケート送信　１度しか送信できません！</h1>
      <h2>クッキーの読み・書き・削除</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_js.php"); ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="thanks.php">クッキー</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      アンケートの送信ありがとうございました。<br><br>

      これからも<a href="https://katsumaru.blog/">『かつまるアウトドア部Log』</a>を楽しんでご覧ください！

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>