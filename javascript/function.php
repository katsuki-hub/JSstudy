<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~ファンクションの作成と利用~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>ファンクションを学習</h1>
      <h2>税込み合計金額を表示するミニプログラム</h2>
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
      <li><a href="fizzbuzz.php">ファンクション</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>税込み価格</h2>
      <p>お食事代8,000円とお土産代450円の税込み価格は？</p>
      <P id="output"></P>
      <p id="output2"></p>

      <!-- ソースコード -->
      <h3>HTMLのソースコード</h3>
      <pre><code class="prettyprint">&lt;p&gt;お食事代8,000円とお土産代450円の税込み価格は？&lt;/p&gt;
&lt;P id=&quot;output&quot;&gt;&lt;/P&gt;
&lt;p id=&quot;output2&quot;&gt;&lt;/p&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var total = function (price) {
  var tax = 0.10;
  return price + price * tax;
}

document.getElementById(&quot;output&quot;).textContent = &quot;◆お食事の値段は&quot; + total(8000) + &quot;円です&quot;;
document.getElementById(&quot;output2&quot;).textContent = &quot;◆お土産代の値段は&quot; + total(450) + &quot;円です。&quot;;</code></pre>
      <!-- /ソースコード -->

      <h4>ファンクションとは？</h4>
      よく行われる処理を1つにまとめたサブプログラムになります。<br>
      使いたいときに呼び出して利用できるので、よく使われます。<br>
      ※ファンクションは呼び出さないと処理されることはありません。<br><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
        ファンクション()内のパラメーターを受け取り、加工をしたのち、その結果を呼び戻して元に返します。
      </div>
      今回は total(8000)というファンクションを受け取って、8000+消費税の計算し、8640を呼び出して元に戻したということです。
      <h4>ファンクションの作成</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        var ファンクション名 = function(要求するパラメーター) {<br>
        処理の内容<br>
        }
      </div>
      要求するパラメーター名はfunction()に続く{～}の中だけで有効な変数として機能します。


    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var total = function(price) {
    var tax = 0.10;
    return price + price * tax;
  }

  document.getElementById("output").textContent = "◆お食事の値段は" + total(8000) + "円です";
  document.getElementById("output2").textContent = "◆お土産代の値段は" + total(450) + "円です。";
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>