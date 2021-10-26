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
  <title>PHP編”文字列の検索”</title>
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
      <h1>文字列の検索</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="search.php">文字列の検索</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>文字列を検索する</h2>
        <div class="frame3">
          文字列を検索する関数のstrpos()またはmb_strpos()は、検索して最初に見つかった位置を返します。<br>マルチバイト文字の検索にはmb_strpos()を使い、文字の位置は0から数え、ない場合はfalseを返す。<br>この時、if文では0はfalseと判定されるので===演算子を使って厳密な判定を行う。<br><br>※最後に見つかった位置を返す関数は strrpos()及び mb_strrpos()もある
        </div>
        <h3>文字列が含まれている位置を調べる</h3>
        <?php
        function check($target, $str)
        {
          $result = mb_strpos($target, $str);
          if ($result === false) {
            echo "「{$str}」は「{$target}」には含まれていません。\n <br>";
          } else {
            echo "「{$str}」は「{$target}」の{$result}文字目にあります。\n <br>";
          }
        }
        check("福岡県福岡市博多区", "博多");
        check("福岡県福岡市博多区", "天神");
        check("PHP,JavaScript,Ruby", "PHP");
        check("PHP,JavaScript,Ruby", "c++");
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function check ($target,$str) {
  $result = mb_strpos($target,$str);
  if ($result === false) {
    echo &quot;「{$str}」は「{$target}」には含まれていません。\n &lt;br&gt;&quot;;
  } else {
    echo &quot;「{$str}」は「{$target}」の{$result}文字目にあります。\n &lt;br&gt;&quot;;
  }
}
check(&quot;福岡県福岡市博多区&quot;,&quot;博多&quot;);
check(&quot;福岡県福岡市博多区&quot;,&quot;天神&quot;);
check(&quot;PHP,JavaScript,Ruby&quot;,&quot;PHP&quot;);
check(&quot;PHP,JavaScript,Ruby&quot;,&quot;c++&quot;);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>「不可」が含まれている個数を調べる</h3>


      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>