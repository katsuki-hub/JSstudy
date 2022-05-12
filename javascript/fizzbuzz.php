<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~算術演算子~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>算術演算子を学習</h1>
      <h2>FizzBuzzゲーム</h2>
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
      <li><a href="fizzbuzz.php">算術演算子</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <p>3で割り切れる数字の時は<b>「Fizz!」</b>5で割り切れる時は<b>「Bizz!」</b>、3でも5でも割り切れるときは<b>「FizzBuzz!」</b>と叫ぶゲームです。</p>
      <script>
      var fizzbuzz = function(num) {
        if (num % 3 === 0 && num % 5 === 0) {
          return "FizzBuzz!";
        } else if (num % 3 === 0) {
          return "Fizz!";
        } else if (num % 5 === 0) {
          return "Buzz!";
        } else {
          return num;
        }
      }
      for (var i = 1; i <= 30; i++) {
        document.write(fizzbuzz(i) + "<br>");
      }
      </script>
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>