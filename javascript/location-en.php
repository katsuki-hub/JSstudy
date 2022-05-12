<!doctype html>
<html lang="en">

<head>
  <?php $title = "JavaScript編~プルダウンメニューでリンク設定~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>プルダウンメニューでリンク設定</h1>
      <h2>選択されている項目を切り替える</h2>
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
      <li><a href="location.php">プルダウン</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <form id="form">
        <select name="select">
          <option value="location.php">日本語</option>
          <option value="location-en.php">English</option>
          <option value="location-zh.php">中文</option>
        </select>
      </form>
      <h2>English Page</h2>
      <p>I will explain on the japan page</p>
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="../scripts/location.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>