<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~スライドショー~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>画像のスライドショー</h1>
      <h2>ボタンクリックで画像切り替え</h2>
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
      <li><a href="slide.php">スライドショー</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>見たい画像を選択してみて</h2>
        <div class="slide">
          <div class="image_box">
            <img id="main_image" src="../images/j1.jpg">
          </div>
          <div class="toolbar">
            <div class="nav">
              <div id="prev">＜</div>
              <span id="page"></span>
              <div id="next">＞</div>
            </div>
          </div>
        </div>

        <h3>HTMLのソースコード</h3>

        <pre><code class="prettyprint">&lt;div class=&quot;slide&quot;&gt;
  &lt;div class=&quot;image_box&quot;&gt;
    &lt;img id=&quot;main_image&quot; src=&quot;images/j1.jpg&quot;&gt;
  &lt;/div&gt;
  &lt;div class=&quot;toolbar&quot;&gt;
    &lt;div class=&quot;nav&quot;&gt;
      &lt;div id=&quot;prev&quot;&gt;＜&lt;/div&gt;
      &lt;span id=&quot;page&quot;&gt;&lt;/span&gt;
      &lt;div id=&quot;next&quot;&gt;＞&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>


        <h3>CSSのソースコード</h3>

        <pre><code class="prettyprint lang-css">.slide {
  margin: 0 auto;
  border: 1px solid black;
  width: 100%;
  background-color: black;
}

img {
  max-width: 100%;
}

.toolbar {
  overflow: hidden;
  text-align: center;
}

.nav {
  display: inline-block;
}

#prev {
  float: left;
  margin:8px 50px 0 0;
  width: 100px;
  color: #fff;
  font-weight: bold;
}

#next {
  float: right;
  margin: 8px 0 0 50px;
  width: 100px;
  color: #fff;
  font-weight: bold;
}

#prev:hover {
  background-color: #f8f0e3;
  color: #1201fd;
  text-decoration: underline;
}

#next:hover {
  background-color: #f8f0e3;
  color: #1201fd;
  text-decoration: underline;
}

#page {
  display: inline-block;
  float: left;
  margin-top: 8px;
  height: 32px;
  color: #fff;
}</code></pre>


        <h3>JavaScriptのソースコードと概要</h3>

        <pre><code class="prettyprint">var images = [&quot;images/j1.jpg&quot;, &quot;images/j2.jpg&quot;, &quot;images/j3.jpg&quot;];
var current = 0;
var pageNum = function () {
  document.getElementById(&quot;page&quot;).textContent = (current + 1) + &quot;/&quot; + images.length;
}
var changeImage = function (num) {
  if (current + num &gt;= 0 &amp;&amp; current + num &lt; images.length) {
    current += num;
    document.getElementById(&quot;main_image&quot;).src = images[current];
    pageNum();
  }
};

var preloadImage = function(path) {
  var imgTag = document.createElement(&quot;img&quot;);
  imgTag.src = path;
}

for (var i = 0; i &lt; images.length; i++) {
  preloadImage(images[i]);
}

pageNum();

document.getElementById(&quot;prev&quot;).onclick = function () {
  changeImage(-1);
};
document.getElementById(&quot;next&quot;).onclick = function () {
  changeImage(1);
};</code></pre>

        <h4>スライドショーに必要な変数</h4>
        <div class="frame1">
          var images = ["images/j1.jpg", "images/j2.jpg", "images/j3.jpg"];<br>
          var current = 0;
        </div>
        配列imagesを作成し、大きな画像のパスを登録する。<br>
        次に変数currentを定義し、0を代入！いま何枚目の画像を表示しているかを保存するために使う
        <h4>changeImageファンクション</h4>
        prev,nextがクリックされたら-1か1をパラメーターとして渡し、パラメーター(num)に代入する。<br><br>
        <div class="frame2">
          if (current + num >= 0 && current + num < images.length) { </div>
            current + num が０以上かつ current + num が配列の項目数より少ない場合はtrueになる。<br>(配列imagesのインデックス番号内に収まるときだけ！)<br><br>
            <div class="frame2">
              current += num;
            </div>
            変数currentにnumを足して、その結果をcurrentに再代入してます。<br><br>
            <div class="frame2">
              document.getElementById("main_image").src = images[current];
            </div>
            HTMLの「id="main_image"」を取得して、そのscr属性に配列imagesのcurrent番目のパスを設定している。<br>
            scr属性の値を書き換えれば、表示される画像が切り変わる！
            <h4>pageNumファンクション</h4>
            <div class="frame2">
              document.getElementById("page").textContent = (current + 1) + "/" + images.length;
            </div>
            "page"idを取得して、＝右側をテキストコンテンツに値を設定する。<br>
            currentは配列のインデックス番号なので、0～2が入っており、1～3と自然にする為 +1 しています。
            <h4>プリロード</h4>
            画像読み込みの待ち時間を少なくするために、先に読み込んでおく『プリロード』というテクニックがあります。<br><br>
            配列magesの項目数分、繰り返しpreloadImageファンクションを呼び出します。<br><br>
            <div class="frame2">
              var imgTag = document.createElement("img");<br>
              imgTag.src = path;
            </div>
            createElementは()内のタグを生成し、メモリに保存するメソッドです。<br><br>
            imgタグを変数imgTagに代入します。<br>
            代入された変数imgTagのタグsrc属性に、配列imagesに登録された画像のパスを指定しています。<br><br>
            すると、メモリ内にまだダウンロードしていない画像を指定するimgタグがある事になります。<br><br>
            ここでブラウザがまだ読み込んでいないファイルをダウンロードしキャッシュします。<br><br>
            <b>プリロード</b>は、大きいデータを扱う際によく使われる方法です。
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var images = ["../images/j1.jpg", "../images/j2.jpg", "../images/j3.jpg"];
  var current = 0;
  var pageNum = function() {
    document.getElementById("page").textContent = (current + 1) + "/" + images.length;
  }
  var changeImage = function(num) {
    if (current + num >= 0 && current + num < images.length) {
      current += num;
      document.getElementById("main_image").src = images[current];
      pageNum();
    }
  };

  var preloadImage = function(path) {
    var imgTag = document.createElement("img");
    imgTag.src = path;
  }

  for (var i = 0; i < images.length; i++) {
    preloadImage(images[i]);
  }

  pageNum();

  document.getElementById("prev").onclick = function() {
    changeImage(-1);
  };
  document.getElementById("next").onclick = function() {
    changeImage(1);
  };
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>