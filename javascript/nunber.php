<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~データ型比較演算子☆数字の大小を比較条件~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>ランダムに設定した数字を当てよう</h1>
      <h2>様々な比較演算子を使用する</h2>
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
      <li><a href="nunber.php">比較演算子</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>更新してランダムで1～6の数を当てよう！</h2>
      <div>
        <input id="Button1" type="button" value="リロード" onclick="Button_Click();" />
      </div>

      <h3>比較演算子を使ったソースコード解説</h3>

      <!--ソースコードがCSSの場合は、さらにlang-cssを追加-->
      <pre><code class="prettyprint">var number = Math.floor(Math.random() * 6)+1;
var answer = parseInt(window.prompt(&quot;数当てゲーム。1～6の数字を入力してね&quot;));
var message;
if (answer === number) {
  message = &quot;あたりでーーす！！&quot;;
} else if (answer &lt; number) {
  message = &quot;残念！もっと大きい数字でした！&quot;;
} else if (answer &gt; number) {
  message = &quot;残念！もっと小さい数字でした～～( ﾟДﾟ)&quot;;
} else {
  message = &quot;1-6の数字をいれてな！&quot;;
}
window.alert(message);

function Button_Click() {
  window.location.reload();
}</code></pre>

      <h4>Math.floorメソッド</h4>

      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        Math.floor(数式などの端数切捨て)
      </div>
      小数点以下の端数を切り捨てるメソッドです。

      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        Math.random()
      </div>
      0 以上 1 未満 (0 は含むが、 1 は含まない) の範囲で浮動小数点の擬似乱数を返します

      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        <a class="red">※ワンポイントメモ</a><br>
        <br>
        Math.round()<br>
        小数点以下を四捨五入する<br>
        <br>
        Math.ceil ()<br>
        小数点以下切り上げる<br>
        <br>
        Math.floor(Math.random()* 10);<br>
        0~9までの数をランダムに表示させる<br>
        <br>
        Math.floor(Math.random()* 10)+1;<br>
        1~10までの数をランダムに表示させる
      </div>


      <h4>parseIntメソッド</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        parseInt(変換させたい文字列)
      </div>
      parseIntメソッドは文字列を整数に変換させます。<br>
      今回でいうと、プロンプトに入力された内容は数字であっても文字として認識されます。その後の処理で大小比較するので、変数answerに代入する前に整数にしています。

      <h4>変数だけを定義</h4>
      var message;はvar 変数名に続き、終了の;でデータを代入せずに定義だけをしています。<br>
      データの代入は後から行います。何故かというと、if文などで代入されるデータが変わる為です。
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var number = Math.floor(Math.random() * 6) + 1;
  var answer = parseInt(window.prompt("数当てゲーム。1～6の数字を入力してね"));
  var message;
  if (answer === number) {
    message = "あたりでーーす！！";
  } else if (answer < script number) {
    message = "残念！もっと大きい数字でした！";
  } else if (answer > number) {
    message = "残念！もっと小さい数字でした～～( ﾟДﾟ)";
  } else {
    message = "1-6の数字をいれてな！";
  }
  window.alert(message);

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