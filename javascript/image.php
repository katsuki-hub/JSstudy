<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~サムネイル画像切り替え~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>サムネイル画像の切り替え</h1>
      <h2>表示する大きな画像をクリックで選べるよ</h2>
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
      <li><a href="image.php">サムネイル変更</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>見たい画像を選択してみて</h2>
        <div class="img">
          <div>
            <img src="../images/j1.jpg" id="bigimg">
          </div>
          <ul>
            <li><img src="../images/j1.jpg" class="thumb" data-image="../images/j1.jpg"></li>
            <li><img src="../images/j2.jpg" class="thumb" data-image="../images/j2.jpg"></li>
            <li><img src="../images/j3.jpg" class="thumb" data-image="../images/j3.jpg"></li>
          </ul>
        </div>

        <h3>HTMLのソースコード</h3>
        <pre><code class="prettyprint">&lt;div class=&quot;img&quot;&gt;
  &lt;div&gt;
    &lt;img src=&quot;images/j1.jpg&quot; id=&quot;bigimg&quot;&gt;
  &lt;/div&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;img src=&quot;images/j1.jpg&quot; class=&quot;thumb&quot; data-image=&quot;images/j1.jpg&quot;&gt;&lt;/li&gt;
    &lt;li&gt;&lt;img src=&quot;images/j2.jpg&quot; class=&quot;thumb&quot; data-image=&quot;images/j2.jpg&quot;&gt;&lt;/li&gt;
    &lt;li&gt;&lt;img src=&quot;images/j3.jpg&quot; class=&quot;thumb&quot; data-image=&quot;images/j3.jpg&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
</code></pre>

        <h3>CSSのソースコード</h3>
        <pre><code class="prettyprint">section img {
  max-width: 100%;
}

.img {
  margin: 0 auto 0 auto;
  width: 90%;
}

.img ul {
  overflow: hidden;
  margin: 0;
  padding: 0;
  list-style-type: none;
}

.img li {
  float: left;
  margin-right: 1%;
  width: 32.33%;
}</code></pre>

        <h3>JavaScriptのソースコードと概要</h3>
        <pre><code class="prettyprint" lang-css>var thumbs = document.querySelectorAll(&quot;.thumb&quot;);

for (var i = 0; i &lt; thumbs.length; i++) {
  thumbs[i].onclick = function () {
    document.getElementById(&quot;bigimg&quot;).src = this.dataset.image;
  };
}</code></pre>


        <h4>querySelectorAllメソッド</h4>
        <div class="frame2">
          document.querySelectorAll("CSSセレクタ")
        </div>
        今回使用したメソッドは1つではなく()内で指定したCSSのセレクタにマッチする要素全てを取得します。<br><br>
        セレクタに『.thumb』を指定してるためclass属性のthumbが全て取得されて、変数『thumbs』に代入してます。<br><br>

        <div class="frame1">
          thumbs[i].onclick = function () {
          document.getElementById("bigimg").src = this.dataset.image;
          };
        </div>
        取得した要素全てにイベント設定する為にfor文を行い、onclickイベントを設定します。<br><br>
        <h4>this</h4>
        thisはイベントが発生した要素を指す<br>
        今回はonclickによりクリックされた要素で、イベントに設定するファンクションの中で使えます。
        <h4>data-*属性とdatasetプロパティ</h4>
        HTMLで記述したdata-*属性の属性名は自由に決めていい(※大文字は不可)<br>
        JavaScriptでその値を利用する際に記述する。<br>
        そして、onclickで設定したファンクション内の値をclass属性の『bigimg』と属性を書き換える！



      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var thumbs = document.querySelectorAll(".thumb");
  for (var i = 0; i < script thumbs.length; i++) {
    thumbs[i].onclick = function() {
      document.getElementById("bigimg").src = this.dataset.image;
    };
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>