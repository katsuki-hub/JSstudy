<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~変数☆比較演算子を使ったダイアログボックス表示~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>入力内容に応じて動作を変更する</h1>
      <h2>変数に保存された内容で動作を切り替えます</h2>
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
      <li><a href="var.php">変数</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>入力内容でダイアログボックスのコメントを返す。</h2>
      <div>
        <input id="Button1" type="button" value="リロード" onclick="Button_Click();" />
      </div>
      <h3>ソースコードと概要</h3>

      <pre><code class="prettyprint">var answer = window.prompt(&quot;ヘルプを見ますか？？？&quot;);

if (answer === &quot;はい&quot;) {
	window.alert(&quot;概要の案内&quot;);
} else if (answer === &quot;いいえ&quot;) {
	window.alert(&quot;復習を勧める&quot;);
} else {
	window.alert(&quot;&#039;はい&#039;か&#039;いいえ&#039;でお答えください。&quot;);
}
function Button_Click() {
	window.location.reload();
}</code></pre>

      <h4>promptメソッド</h4>
      alertやconfirmと同じwindowオブジェクトのメソッドです。<br>
      ()内のテキストや数式のメッセージがダイアログボックスに表示される。
      <h4>変数</h4>
      プログラミングではよく使われる機能です。<br>
      データを代入して、保存させて後にデータ処理で使えるようになります。<br>
      使い方として、初めに定数を定義する必要がります。
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var 好きな変数名 = 代入させたいもの
      </div>
      <h4>変数データの書き換え</h4>
      一度定義した変数であっても、何度もデータを書き換えることは可能です。<br>
      ちなみに変数データを記憶しているのは、開いているページが表示されている時だけになります。<br>
      ブラウザを閉じると変数はクリアされる。
      <h4>演算子</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        <b>代入演算子(=)</b><br>
        右側のデータを左側に代入する<br>
        <br>
        <b>比較演算子(===)</b><br>
        左右が同じならば結果がtrueになる
      </div>

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var answer = window.prompt("変数についての説明を見ますか？？？");
  if (answer === "はい") {
    window.alert("ソースコードとその概要をご覧ください！");
  } else if (answer === "いいえ") {
    window.alert("そう言わずに復習をしなさい");
  } else {
    window.alert("'はい'か'いいえ'でお答えください。");
  }

  function Button_Click() {
    window.location.reload();
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>