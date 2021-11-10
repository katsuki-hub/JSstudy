<!doctype html>
<html lang="ja">

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P2ZWXCZ');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <title>PHP編”配列の抽出”</title>
  <meta name=”description” content=”PHP編の学習技術ブログです。”>
  <meta name="keywords" content="PHP,プログラミング,技術ブログ,PHP超入門編,ソースコード" />
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="android-touch-icon.png">
  <meta property="og:title" content="プログラミング学習帳～簡単解説！JavaScript初級コード～">
  <meta property="og:type" content="website">
  <meta property="og:description" content="JavaScript超入門編の学習技術ブログです。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
  <meta property="og:url" content="https://katsu-study.work/">
  <meta property="og:site_name" content="JavaScript学習帳">
  <meta property="og:image" content="https://katsu-study.work/images/js.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="JSプログラミング講座">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="manifest" href="../manifest.json">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <div class="header-contents">
      <h1>配列の値を効率よく取り出す</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <div id="boxmenu">
      <nav class="phpnav">
        <ul class="menu_1">
          <li><a href="../index.html">HOME</a></li>
          <li><a href="syntax.php">制御構造</a></li>
          <li><a href="function.php">関数</a></li>
          <li><a href="string.php">文字列</a></li>
          <li><a href="convert.php">文字列の変換</a></li>
          <li><a href="comparison.php">文字列の比較</a></li>
          <li><a href="search.php">文字列の検索</a></li>
          <li><a href="regex.php">正規表現</a></li>
          <li><a href="array.php">配列</a></li>
          <li><a href="array02.php">配列の要素</a></li>
          <li><a href="arrayextract.php">配列の抽出</a></li>
        </ul>

        <div class="copyright">
          <small>&copy; 2021 かつまる学習帳</small>
        </div>
      </nav>
    </div><!-- /boxmenu -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="arrayextract.php">配列の抽出</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列から順に値を取り出す</h2>
        <div class="frame3">
          foreach文を使うことで、配列から値を取り出すことができます。値だけを取り出す書式とキーと値の両方を取り出す書式の2種類ある。
          <div class="frame2">
            <b>配列から値を順に取り出して繰り返す</b><br>
            foreach($array as $value){<br>
            　$valueを使った繰り返しの処理<br>
            }
          </div>
          インデックス配列から値を取り出す書式。$arrayから順に値を$valueを取り出して、すべての値に対して{}の文を繰り返し実行します。
        </div>
        <h3>名前の配列からリストを作る</h3>
        <?php
        $namelist = ["桃太郎", "金太郎", "一寸法師", "赤鬼"];
        echo "<ol>", "\n";
        foreach ($namelist as $value) {
          echo "<li>", $value, "さん</li>\n";
        }
        echo "</ol>\n";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$namelist = [&quot;桃太郎&quot;, &quot;金太郎&quot;, &quot;一寸法師&quot;, &quot;赤鬼&quot;];
echo &quot;&lt;ol&gt;&quot;, &quot;\n&quot;;
foreach ($namelist as $value) {
  echo &quot;&lt;li&gt;&quot;, $value, &quot;さん&lt;/li&gt;\n&quot;;
}
echo &quot;&lt;/ol&gt;\n&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>
        <h3>配列の正の値だけを合計する</h3>
        <?php
        $valuelist = [15, -50, 25, 38, 9];
        $sum = 0;
        foreach ($valuelist as $value) {
          if ($value > 0) {
            $sum += $value;
          }
        }
        echo "正の値の合計は{$sum}です。";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$valuelist = [15, -50, 25, 38, 9];
$sum = 0;
foreach ($valuelist as $value) {
  if ($value &gt; 0) {
    $sum += $value;
  }
}
echo &quot;正の値の合計は{$sum}です。&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>foreach文でキーと配置を順に取り出す</h2>
        <div class="frame3">
          連想配列からキーと値を取り出すとき
          <div class="frame2">
            <b>配列からキーと値を順に取り出して繰り返す</b><br>
            foreach($array as $key => $$value){<br>
            $key と $valueを使った繰り返しの処理<br>
            }
          </div>
          $arrayから順にキーと値を$keyと$value取り出して、すべての要素に対して{}の分を繰り返し実行します。
        </div>
        <h3>配列からすべてのキーと値を取り出す</h3>
        <?php
        $data = ["ID" => "FF", "品名" => "ファイナルファイト", "価格" => "8800"];
        echo "<ul>", "\n";
        foreach ($data as $key => $value) {
          echo "<li>", $key, "：", $value, "</li>\n";
        }
        echo "</ul>\n";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [&quot;ID&quot; =&gt; &quot;FF&quot;, &quot;品名&quot; =&gt; &quot;ファイナルファイト&quot;, &quot;価格&quot; =&gt; &quot;8800&quot;];
echo &quot;&lt;ul&gt;&quot;, &quot;\n&quot;;
foreach ($data as $key =&gt; $value) {
  echo &quot;&lt;li&gt;&quot;, $key, &quot;：&quot;, $value, &quot;&lt;/li&gt;\n&quot;;
}
echo &quot;&lt;/ul&gt;\n&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列から条件に合う値を抽出する</h2>
        <div class="frame3">
          array_filterを使うと条件に合う値を配列から抽出することができます。
          <div class="frame2">
            <b>配列から条件に合う値を抽出する</b><br>
            $filtered = array_filter($myArray,callback);
          </div>
          $myArrayの配列の値をcallbackで指定した関数で判定し、結果がtrueになった値だけを$filteredの配列に抽出します。callback関数には配列の値が引数として渡されます。元の配列はインデックス配列でも連想配列でも構いません。
        </div>
        <h3>配列から正の値だけを抽出する</h3>
        <?php
        function isPlus($value)
        { //コールバック関数
          return $value > 0; //値が正なら抽出
        }

        $valuelist = ["a" => 3, "b" => 0, "c" => 5, "d" => -2, "e" => 4];
        $filtered = array_filter($valuelist, "isPlus");
        print_r($filtered);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function isPlus($value)
{ //コールバック関数
  return $value &gt; 0; //値が正なら抽出
}

$valuelist = [&quot;a&quot; =&gt; 3, &quot;b&quot; =&gt; 0, &quot;c&quot; =&gt; 5, &quot;d&quot; =&gt; -2, &quot;e&quot; =&gt; 4];
$filtered = array_filter($valuelist, &quot;isPlus&quot;);
print_r($filtered);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>インデックス配列を変数に展開する</h2>
        <div class="frame3">
          list()を使うとインデックス配列の値を効率よく変数に代入できます。
          <div class="frame2">
            <b>配列を変数に展開する</b><br>
            list($var1,$var2,$var3,...) = インデックス配列;
          </div>
        </div>
        <h3>配列を変数に展開する</h3>
        <?php
        $data = [4521, "花山薫", 16];
        list($id, $name, $age) = $data;
        echo "会員ID：", "$id", "\n <br>";
        echo "お名前：", "$name", "\n <br>";
        echo "年齢：", "$age", "\n";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [4521, &quot;花山薫&quot;, 16];
list($id, $name, $age) = $data;
echo &quot;会員ID：&quot;,&quot;$id&quot;,&quot;\n &lt;br&gt;&quot;;
echo &quot;お名前：&quot;,&quot;$name&quot;,&quot;\n &lt;br&gt;&quot;;
echo &quot;年齢：&quot;,&quot;$age&quot;,&quot;\n&quot;;
?&gt;
</code></pre><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>