<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~論理演算子☆ポップアップメッセージ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>時間帯で変わるメッセ―ジ！！</h1>
      <h2>時間で表示変化</h2>
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
      <li><a href="time_msg.php">論理演算子</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>JavaScript論理演算子<br>～時間帯でメッセージ内容が変わるよ～</h2>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        ページを開いた時刻によってアラートダイアログボックスのメッセージ内容が変わるよ
      </div>
      2つ以上の条件式からなる1つの条件を設定してみよう<br>
      <br>
      今回は16時以上19時以内なら<br>
      <b>『もうすぐ退社の時間だよ！！』</b><br>
      <br>
      12時台か15時台なら<br>
      <b>『そろそろ休憩しよう！！』</b><br>
      <br>
      それ以外なら<br>
      <b>『お仕事頑張ってください！ファイト！！』</b><br>
      となります。

      <h3>ソースコードと概要</h3>

      <!-- ソースコード -->
      <pre><code class="prettyprint">var hour = new Date().getHours();

if (hour &gt;= 16 &amp;&amp; hour &lt;= 19) {
  window.alert(&quot;もうすぐ退社の時間だよ！！&quot;);
} else if (hour === 12 || hour === 15) {
  window.alert(&quot;そろそろ休憩しよう！！&quot;)
} else {
  window.alert(&quot;お仕事頑張ってください！ファイト！！&quot;)
}</code></pre>
      <!-- /ソースコード -->

      <h4>複数の条件式【論理演算子】</h4>
      <h5>&&演算子</h5>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        if (hour &gt;= 16 &amp;&amp; hour &lt;= 19)
      </div>
      変数hourの値が16以上かつ19以下<br>
      どちらの結果もtrueになるときに全体の結果がtrueになります。
      <h5>||演算子</h5>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        else if (hour === 12 || hour === 15)
      </div>
      変数hourの値が12もしくは15のとき<br>
      どちらか片方がtrueになるときに全体の結果がtrueになります。
      <h5>!演算子</h5>
      条件式の結果がfalseになるときに全体の結果がtrueになります。
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="../scripts/time_msg.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>