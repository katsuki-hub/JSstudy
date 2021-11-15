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
  <title>PHP編”配列の要素に関数”</title>
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
      <h1>配列の各要素に関数適用</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <div id="boxmenu">
      <nav class="phpnav">
        <ul class="menu_1">
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
          <li><a href="arraysort.php">配列をソート</a></li>
          <li><a href="arraysearch.php">配列の比較・検索</a></li>
          <li><a href="arrayfunction.php">配列の要素に関数</a></li>
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
      <li><a href="arrayfunction.php">配列の要素に関数</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列の要素で関数を繰り返し実行する</h2>
        <div class="frame3">
          array_walk()は各要素を引数にして指定の関数を繰り返し実行します。<br>これはforeach文の配列から値を取り出して繰り返すのと似ています。
          <div class="frame2">
            <b>各要素を引数にして関数を繰り返し実行する</b><br>
            $result = array_walk(&$array,$callBack,$userdata);
          </div>
          $arrayの配列から1つ要素を取り出し、それを引数として$callBackで指定した関数を実行します。<br>実行後、次の要素を取り出し、その要素を引数として再び$callBack関数で実行します。<br>この操作は配列の要素の数だけ繰り返します。<br>※引数で渡された配列$arrayの値を直接書き換える<br>$userdataはオプションですが、$callBack関数の第3引数として渡すことができる値です。<br>戻り値の$resultはarray_walk()の処理が成功した時true、失敗した時falseが返る
          <div class="frame2">
            <b>コールバック関数</b><br>
            function 関数名($value,$key,$userdata) {<br>
            　処理文<br>
            }<br>
            array_walk(&[キー1 => 値1,...],myFunc,引数);<br>
            　function myFunc($value,$key,$userdata) {<br>
            　処理文<br>
            }
          </div>
        </div>
        <h3>配列の値をドル換算してリスト表示する</h3>
        <?php
        function exchabgeList($value, $key, $rateData)
        {
          $rate = $rateData["rate"];
          if ($rate == 0) {
            return;
          }
          $price = $value / $rate;
          $exPrice = sprintf('%.02f', $price); //下2桁まで表示する書式
          echo "<li>", $rateData["symbol"], $exPrice, "</li>"; //<li>タグと通貨シンボルをつける
        }

        $priceList = [5000, 30000, 240000];
        $dollaryen = ["symbol" => "$", "rate" => 113.86];
        echo "<ul>";
        array_walk($priceList, "exchabgeList", $dollaryen);
        echo "</ul>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function exchabgeList($value, $key, $rateData) {
  $rate = $rateData[&quot;rate&quot;];
  if ($rate == 0) {
    return;
  }
  $price = $value / $rate;
  $exPrice = sprintf(&#039;%.02f&#039;, $price); //下2桁まで表示する書式
  echo &quot;&lt;li&gt;&quot;, $rateData[&quot;symbol&quot;], $exPrice, &quot;&lt;/li&gt;&quot;; //&lt;li&gt;タグと通貨シンボルをつける
}

$priceList = [5000, 30000, 240000];
$dollaryen = [&quot;symbol&quot; =&gt; &quot;$&quot;, &quot;rate&quot; =&gt; 113.86];
echo &quot;&lt;ul&gt;&quot;;
array_walk($priceList, &quot;exchabgeList&quot;, $dollaryen);
echo &quot;&lt;/ul&gt;&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列の要素全てに同じ関数を適用する</h2>
        <div class="frame3">
          <div class="frame2">
            <b>配列の個々の値でコールバック関数を実行する</b><br>
            $result = array_map($callBack,$array);
          </div>
          array_map()には2つの使い方があります。1つは指定した配列の要素にコールバック関数を適用したいときです。<br>※引数で与えた配列を直接書き換えるのではなく、コールバック関数で処理した配列が$resultに入ります。
          <div class="frame2">
            <b>コールバック関数</b><br>
            function 関数名($value) {<br>
            　処理文<br>
            　return 値<br>
            }
          </div>
        </div>
        <h3>コールバック関数で2つの配列を合わせてリスト表示</h3>
        <?php
        function listUp($value1, $value2)
        {
          echo "<li>", $value1, "==", $value2, "</li>", "\n";
        }

        $point = ["10km", "20km", "30km", "40km", "Goal"];
        $split = ["00:55:21", "01:45:33", "02:39:59", "03:26:18", "03:48:06",];
        echo "<ul>", "\n";
        array_map("listUp", $point, $split);
        echo "</ul>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function listUp($value1,$value2) {
  echo &quot;&lt;li&gt;&quot;,$value1,&quot;==&quot;,$value2,&quot;&lt;/li&gt;&quot;,&quot;\n&quot;;
}

$point = [&quot;10km&quot;,&quot;20km&quot;,&quot;30km&quot;,&quot;40km&quot;,&quot;Goal&quot;];
$split = [&quot;00:55:21&quot;,&quot;01:45:33&quot;,&quot;02:39:59&quot;,&quot;03:26:18&quot;,&quot;03:48:06&quot;,];
echo &quot;&lt;ul&gt;&quot;,&quot;\n&quot;;
array_map(&quot;listUp&quot;,$point,$split);
echo &quot;&lt;/ul&gt;&quot;;
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