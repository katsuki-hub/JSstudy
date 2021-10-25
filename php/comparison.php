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
  <title>PHP編”文字列の比較”</title>
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
      <h1>文字列の比較</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="comparison.php">文字列の比較</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>文字列を比較する</h2>
        <h3>文字列と文字列の比較</h3>
        <?php
        function holiady($youbi)
        {
          if (($youbi == "土曜日") || ($youbi == "日曜日")) {
            echo $youbi, "はお休みです。\n <br>", PHP_EOL;
          } else {
            echo $youbi, "はお休みではありません。\n <br>", PHP_EOL;
          }
        }
        holiady("金曜日");
        holiady("土曜日");
        holiady("日曜日");
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function holiady($youbi) {
  if (($youbi == &quot;土曜日&quot;) || ($youbi == &quot;日曜日&quot;)) {
    echo $youbi, &quot;はお休みです。\n &lt;br&gt;&quot;,PHP_EOL;
  } else {
    echo $youbi, &quot;はお休みではありません。\n &lt;br&gt;&quot;,PHP_EOL;
  }
}
holiady(&quot;金曜日&quot;);
holiady(&quot;土曜日&quot;);
holiady(&quot;日曜日&quot;);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>文字列と数値を比較</h3>


        <div class="frame1">
          <b>厳密に比較する演算子</b><br>
          比較に===演算子を使う。上記のプログラムに===に書き換えると、「」以外はすべての比較が違うになる。
        </div>





      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>