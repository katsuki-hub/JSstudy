<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~Mathオブジェクト★小数点の切り捨て~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>小数点第〇位で切り捨てる</h1>
      <h2>四則演算以外の計算</h2>
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
      <li><a href="math.php">四則演算以外の計算</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>円周率から小数点切捨て処理</h2>
      <p>円周率は
        <span>
          <script>
          document.write(Math.PI);
          </script>
        </span>
        です。
      </p>
      <p>普通に切り捨てると
        <span>
          <script>
          document.write(Math.floor(Math.PI));
          </script>
        </span>
        です。
      </p>
      <p>小数点第2位で切り捨てると<span id="output"></span>です。</p>

      <h3>HTMLソースコード</h3>
      <!-- /ソースコード -->
      <pre><code class="prettyprint">&lt;p&gt;普通に切り捨てると
  &lt;span&gt;
    &lt;script&gt;document.write(Math.floor(Math.PI));&lt;/script&gt;
  &lt;/span&gt;
    です。
&lt;/p&gt;
&lt;p&gt;小数点第2位で切り捨てると&lt;span id=&quot;output&quot;&gt;&lt;/span&gt;です。&lt;/p&gt;</code></pre>
      <!-- ソースコード -->

      <h3>JavaScriptのソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var point = function (num, digit) {
  var time = Math.pow(10, digit);
  return Math.floor(num * time) / time;
}

document.getElementById(&quot;output&quot;).textContent = point(Math.PI, 2);</code></pre>
      <!-- /ソースコード -->

      <h4>Mathオブジェクトとファンクション</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var point = function (num, digit)
      </div>
      2つのパラメーター(切り捨てたい元の数字,小数点の位の指定数字)を受け取ります。<br><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var time = Math.pow(10, digit);
      </div>
      Math.pow(a, b)はaをb乗する処理なので、10をdigit回掛けて変数timeに代入します。<br><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        return Math.floor(num * time) / time;
      </div>
      変数timeには100が代入されているので、num×100してMath.floorメソッドで小数点以下を切捨ててから変数time⇒(100)で割っています。
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var point = function(num, digit) {
    var time = Math.pow(10, digit);
    return Math.floor(num * time) / time;
  }

  document.getElementById("output").textContent = point(Math.PI, 2);
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>