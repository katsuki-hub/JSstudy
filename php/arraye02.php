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
  <title>PHP編”配列要素の削除と置換”</title>
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
      <h1>配列要素の削除・置換・連結・分割</h1>
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
          <li><a href="array.php">配列の要素</a></li>
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
      <li><a href="search.php">配列要素</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列の要素を削除する</h2>
        <div class="frame3">
          <div class="frame2">
            $removed = array_splice($myArray,$start,$lengs);
          </div>
          第1引数の配列$myArrayの$startで指定した位置から、$lengsで指定した個数の要素を削除します。$lengsを省略すると初期値の0になり、1個も削除しません。$removedに戻るのは、削除後の配列ではなく、削除した要素の配列です。
        </div>
        <h3>インデックス配列から値を削除する</h3>
        <?php
        $myArray = ["a", "b", "c", "d", "e"];
        $removed = array_splice($myArray, 1, 2);
        echo '実行後：$myArray', "\n <br>";
        print_r($myArray);
        echo "<br>";
        echo '戻り：$removed', "\n <br>";
        print_r($removed);
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$myArray = [&quot;a&quot;, &quot;b&quot;, &quot;c&quot;, &quot;d&quot;, &quot;e&quot;];
$removed = array_splice($myArray, 1, 2);
echo &#039;実行後：$myArray&#039;, &quot;\n &lt;br&gt;&quot;;
print_r($myArray);
echo &quot;&lt;br&gt;&quot;;
echo &#039;戻り：$removed&#039;,&quot;\n &lt;br&gt;&quot;;
print_r($removed);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列の先頭・末尾を取り出す</h2>
        <div class="frame3">
          <b>配列の先頭から値を取り出す</b>
          <div class="frame2">
            $removed = array_shift($myArray);
          </div>
          <b>配列の末尾から値を取り出す</b>
          <div class="frame2">
            $removed = array_pop($myArray);
          </div><br>
          値を取り除くと、値の並びのインデックス番号はリセットされます。
        </div>
        <h3>配列の先頭の値を取り出す</h3>
        <?php
        $myArray = ["a", "b", "c", "d", "e"];
        $removed1 = array_shift($myArray);
        $removed2 = array_pop($myArray);
        echo '実行後：$myArray', "\n <br>";
        print_r($myArray);
        echo "<br>";
        echo '戻り：$removed1',"\n <br>";
        print_r($removed1);
        echo "<br>";
        echo '戻り：$removed2',"\n <br>";
        print_r($removed2);
        ?>
        <!-- ソースコード -->
<pre><code class="prettyprint">&lt;?php
$myArray = [&quot;a&quot;, &quot;b&quot;, &quot;c&quot;, &quot;d&quot;, &quot;e&quot;];
$removed1 = array_shift($myArray);
$removed2 = array_pop($myArray);
echo &#039;実行後：$myArray&#039;, &quot;\n &lt;br&gt;&quot;;
print_r($myArray);
echo &quot;&lt;br&gt;&quot;;
echo &#039;戻り：$removed1&#039;,&quot;\n &lt;br&gt;&quot;;
print_r($removed1);
echo &quot;&lt;br&gt;&quot;;
echo &#039;戻り：$removed2&#039;,&quot;\n &lt;br&gt;&quot;;
print_r($removed2);
?&gt;
</code></pre>
        <div class="blank"></div>



      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>