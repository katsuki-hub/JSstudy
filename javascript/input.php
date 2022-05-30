<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~インプットとデータの加工~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>フォームの入力内容を取得する</h1>
      <h2>入力内容を読み取って出力</h2>
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
      <li><a href="input.php">インプット&出力</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>フォームを入力して検索してください！</h2>
      <form action="#" id="form">
        <input type="text" name="word">
        <input type="submit" value="検索">
      </form>
      <p id="output"></p>
      <br><br>

      <h3>HTMLソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;form action=&quot;#&quot; id=&quot;form&quot;&gt;
  &lt;input type=&quot;text&quot; name=&quot;word&quot;&gt;
  &lt;input type=&quot;submit&quot; value=&quot;検索&quot;&gt;
&lt;/form&gt;
&lt;p id=&quot;output&quot;&gt;&lt;/p&gt;</code></pre>
      <!-- /ソースコード -->
      <h4>フォームのコードです！</h4>
      <b>input type="submit" value="検索"</b>は送信ボタン<br>
      <b>action="#" id="form"</b>は指定された入力内容の送信場所<br><br>
      action属性には通常送信するURLを指定！今回は送信しないので『#』にしてます。ちなみに#はページの最上部を指す。

      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">document.getElementById(&quot;form&quot;).onsubmit = function () {
  var search = document.getElementById(&quot;form&quot;).word.value;
  document.getElementById(&quot;output&quot;).textContent = &quot;『&quot; + search + &quot;』の検索中...&quot;;
  return false;
};</code></pre>
      <!-- /ソースコード -->
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        document.getElementById("form")
      </div>
      &lt;form id=&quot;form&quot;&gt;～&lt;/form&gt;の要素を取得する。

      <h4>要素イベント作成</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        取得した要素.onsubmit = function () {<br>
        　処理内容<br>
        };
      </div>

      &lt;form&gt;要素のonsubmitイベントにファンクションを代入していきます。<br>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333;">
        ※onsubmitイベントは親要素の&lt;form&gt;に発生する！
        イベントファンクションには()内にパラメーターもなく、{}内にreturn命令もない。パラメーターもリターンもないファンクション
      </div>

      <h4>フォームの入力内容を読み取る</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        取得した("form")要素.読み取りたい部分のname属性.value
      </div>
      あとはHTMLに出力するだけです。

      <h4>return false</h4>
      フォームの基本動作をキャンセルするプログラムです。<br>
      今回はデータが送信されて、URLの語尾が変わり、ページ移動しようとしてしまう為、再読み込み状態となってしまいます。それにより、テキスト表示が一瞬だけになるので、フォーム基本動作をキャンセルさせています。

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  document.getElementById("form").onsubmit = function() {
    var search = document.getElementById("form").word.value;
    document.getElementById("output").textContent = "『" + search + "』の検索中...";
    return false;
  };
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>