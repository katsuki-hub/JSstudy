<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~リスト番号に0足して桁数を合わせよう~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>「0」をつけて桁数を合わせる</h1>
      <h2>曲目リストに番号をつける</h2>
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
      <li><a href="digit.php">桁数合わせ</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>UVERworld自身を超える10枚目のアルバム</h2>
      <h3>UNSER</h3>
      <p>2020年に結成20周年、デビュー15周年を迎えるUVERworldの記念すべき10枚目のアルバム!
        12月には東京ドーム2デイズ公演を控え、そのうち1日は男性限定ライブ、通称"男祭り"となり、日本記録を自身で更新する。</p>
      <div id="list">
        <!--配列songsのデータ数分繰り返し<p>を追加する-->
      </div>
      <h3>HTMLソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;div id=&quot;list&quot;&gt;&lt;/div&gt;</code></pre>
      <!-- /ソースコード -->
      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var addzero = function (num, digit) {
  var numString = String(num);
  while (numString.length &lt; digit) {
    numString = &quot;0&quot; + numString;
  }
  return numString;
}

var songs = [&quot;曲名&quot;,……,……,……];
for (var i = 0; i &lt; songs.length; i++) {
  var UNSER = document.createElement(&quot;p&quot;);
  UNSER.textContent = addzero(i + 1, 2) + &quot;. &quot; + songs[i];
  document.getElementById(&quot;list&quot;).appendChild(UNSER);
}</code></pre>
      <!-- /ソースコード -->

      <h4>ファンクションの仕組みと処理</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var addzero = function (num, digit)
      </div>
      ファンクションは2つのパラメーターを受け取っています。<br>
      numが成形する数で、digitは桁数です。<br>
      『01』と表示するには文字列連結が必要なので、数値を文字列に変換処理しなければいけない。<br><br><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var numString = String(num);
      </div>
      Stringは()内のデータを文字列へ変換します。
      <br><br><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd">
        while (numString.length < digit) {<br>
          numString = "0" + numString;<br>
          }
      </div>
      digitで指定された桁数に達するまで、『0』を連結させます。<br>
      文字列データのlengthプロパティは文字列の文字数を表します。
      <h4>曲名リストの番号</h4>
      配列を作成して、曲名を入れていく！<br><br>
      ↓↓詳しくは↓↓<br>
      <a href="https://katsu-study.work/array.html">配列～項目リストの表示</a><br><br>
      ※インデックス番号は0からなので、成形する数は∔1で合わせます。<br>
      ※配列の[]内は項目が多いと、カンマの後ろで改行できる。
    </section>

  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var addzero = function(num, digit) {
    var numString = String(num);
    while (numString.length < digit) {
      numString = "0" + numString;
    }
    return numString;
  }

  var songs = [
    "Making it Drive",
    "AFTER LIFE",
    "Touch off",
    "境界",
    "stay on",
    "First Sight",
    "ODD FUTURE",
    "無意味になる夜",
    "EDENへ",
    "ConneQt",
    "OXYMORON",
    "One Last Time",
    "ROB THE FRONTIER",
    "GOOD and EVIL",
    "UNSER"
  ];
  for (var i = 0; i < songs.length; i++) {
    var UNSER = document.createElement("p");
    UNSER.textContent = addzero(i + 1, 2) + ". " + songs[i];
    document.getElementById("list").appendChild(UNSER);
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>