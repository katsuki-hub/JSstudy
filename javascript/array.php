<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~配列を使って項目リストを表示する~" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  .li li {
    background: #ffa89d70;
    border-radius: 8px;
    box-shadow: 0px 0px 5px rgb(66, 66, 66);
    padding: 5px;
    position: relative;
  }

  .li ul li::before {
    content: "";
    position: fixed;
    left: 5px;
  }
  </style>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>項目をリスト表示する</h1>
      <h2>項目をHTMLに出力する</h2>
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
      <li><a href="array.php">配列</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>やることリスト</h2>
      <ul class="li" id="list"></ul>
      <br>
      <h3>HTMLソースコード</h3>

      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;ul class=&quot;li&quot; id=&quot;list&quot;&gt;&lt;/ul&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScriptのソースコードと概要</h3>

      <!-- ソースコード -->
      <pre><code class="prettyprint">var todo = [&quot;データ整理&quot;, &quot;JavaScriptの学習&quot;, &quot;与信審査と債権管理&quot;, &quot;データ解析によるコンバージョン獲得経路算出&quot;, &quot;広告キーワードプランナーによる解析&quot;];
todo.push(&quot;自己分析をしておく&quot;);
for (var i = 0; i &lt; todo.length; i++) {
  var li = document.createElement(&quot;li&quot;);
  li.textContent = todo[i];
  document.getElementById(&quot;list&quot;).appendChild(li);
}</code></pre>
      <!-- /ソースコード -->
      <h4>配列の作成</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var 変数名 = [];
      </div>
      配列を使えば、リストがいくら増えても使う変数は1つで済みます。データの管理がし易くなる。
      <h4>配列からデータを読み取る</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        配列変数名 [インデックス番号]
      </div>
      配列データには順番に0，1，2と番号が付く！これを<b>インデックス番号</b>という。最初の番号は「0」からなので注意！！
      <h4>全ての項目を読み取る</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        配列変数名.length
      </div>
      lengthプロパティは、その配列に登録されているデータの個数を表します。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        for (var i = 0; i < todo.length; i++) {<br>
          処理内容<br>
          }
      </div>
      定数iを定義して0を代入し、iに1つずつ足して繰り返してiをインデックス番号としてデータを読み取る！<br>
      条件式は(変数i)が(変数名.length)より小さければ繰り返すという条件にする。<br><br>
      今回の繰り返し分は配列を行う際に高い頻度で使われています。

      <h4>配列オブジェクトを操作するメソッド</h4>
      <table border="1">
        <tr style="background-color: beige;">
          <th>メソッド名</th>
          <th>意味</th>
        </tr>
        <tr>
          <td>配列変数名.push("追加したい項目")</td>
          <td>配列の最後にデータを追加</td>
        </tr>
        <tr>
          <td>配列変数名.pop()</td>
          <td>配列の最後のデータを削除</td>
        </tr>
        <tr>
          <td>配列変数名.shift()</td>
          <td>配列の最初のデータを削除</td>
        </tr>
        <tr>
          <td>配列変数名.unshift("追加したい項目")</td>
          <td>配列の最初にデータ追加</td>
        </tr>
      </table>

      <h4>項目をHTMLに書き出す</h4>
      上記のHTMLソースコードを挿入しておく
      <h5>タグを生成</h5>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        document.createElement("タグ名");
      </div>
      タグ名を"li"にすると&lt;li&gt;&lt;/li&gt;を生成し、変数liに代入しています。そして、配列todoのインデックスi番目のデータを指定しています。
      <h4>appendChildメソッド</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        取得した要素.appendChild(挿入したい子要素)
      </div>
      取得した要素に()のパラメーターで指定した要素を子要素として挿入する。他に子要素がある場合は、その下に挿入します。
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var todo = ["データ整理", "JavaScriptの学習", "与信審査と債権管理", "データ解析によるコンバージョン獲得経路算出", "広告キーワードプランナーによる解析"];
  todo.push("自己分析をしておく");
  for (var i = 0; i < script script todo.length; i++) {
    var li = document.createElement("li");
    li.textContent = todo[i];
    document.getElementById("list").appendChild(li);
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>