<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~オブジェクトを1つの変数で管理~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>アイテムの価格と在庫を表示する</h1>
      <h2>HTMLに出力する</h2>
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
      <li><a href="object.php">オブジェクト</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>在庫表示</h2>
      <table border="1">
        <tr bgcolor="pink">
          <th>商品</th>
          <th>値段</th>
          <th>在庫数</th>
        </tr>
        <tr>
          <td id="title"></td>
          <td id="price"></td>
          <td id="stock"></td>
        </tr>
      </table>
      <br>
      <h3>HTMLソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;td id=&quot;title&quot;&gt;&lt;/td&gt;
&lt;td id=&quot;price&quot;&gt;&lt;/td&gt;
&lt;td id=&quot;stock&quot;&gt;&lt;/td&gt;</code></pre>
      <!-- /ソースコード -->
      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var jsbook = { title: &quot;JavaScript学習帳&quot;, price: 1700, stock: 8 };
document.getElementById(&quot;title&quot;).textContent = jsbook.title;
document.getElementById(&quot;price&quot;).textContent = jsbook.price + &quot;円&quot;;
document.getElementById(&quot;stock&quot;).textContent = jsbook.stock;</code></pre>
      <!-- /ソースコード -->
      <h4>オブジェクトの作成"1個以上のプロパティ"</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var 変数名 = {プロパティ名:データ,……,……};
      </div>
      データをひとまとめにし、1つの変数として扱えるデータというのは配列と同じです。ただし、オブジェクトにはインデックス番号はありません。
      <h4>オブジェクトからプロパティデータ読み取り</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        オブジェクト名.プロパティ名<br>
        　　または<br>
        オブジェクト名["プロパティ名"]
      </div>
      <h4>オブジェクトからプロパティデータ書き換え</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        オブジェクト名.プロパティ名 = 新しいデータ;<br>
        　　または<br>
        オブジェクト名["プロパティ名"] = 新しいデータ;
      </div>
      <h4>for…in文</h4>
      今回のソースコードには使用してませんが、オブジェクト専用の繰り返し文です。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
        for(var プロパティを保存しておく変数 in オブジェクト名) {<br>
        処理内容<br>
        }
      </div>
      これは、オブジェクトのプロパティを全て読み取ることだけを目的とした、専用の繰り返し文です。<br>
      プロパティを保存しておく変数は一般的に『ｐ』にします。<br>

      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
        プロパティに保存されているデータを読み取りたいときは<br>
        <b>オブジェクト名[p]</b>とします。<br>
        <u>※オブジェクト名.ｐは使えない</u><br>
        for…in文の中では[]を使う方法のみです。
      </div>
      <h4>配列との違い</h4>
      for…in文を使うとオブジェクトのプロパティを全て読み取れますが、場合によっては登録した順に出てこない事がある。<br>
      配列はインデックス番号がついているので、順序が崩れることはない！


    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var jsbook = {
    title: "JavaScript学習帳",
    price: 1700,
    stock: 8
  };
  document.getElementById("title").textContent = jsbook.title;
  document.getElementById("price").textContent = jsbook.price + "円";
  document.getElementById("stock").textContent = jsbook.stock;



  /*
  for (var p in jsbook) {
      document.write(p + "=" + jsbook[p]);
  }
  */

  /*
  console.log(jsbook);
  console.log(jsbook.title);
  console.log(jsbook["price"]);
  jsbook.stock = 10;
  console.log(jsbook.stock);
  */
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>