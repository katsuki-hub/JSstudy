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
  <title>PHP編”制御構造~条件分岐や繰り返し処理~”</title>
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
      <h1>制御構造~条件分岐や繰り返し処理~</h1>
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
          <li><a href="arraysort.php">配列をソート</a></li>
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
      <li><a href="syntax.php">PHPシンタックス</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>条件が満たされている間は繰り返すwhile文</h2>
        <h3>合計が21になる3個の変数が決まるまで繰り返す</h3>
        <?php
        do {
          //変数に1～13の乱数を入れる
          $a = mt_rand(1, 13);
          $b = mt_rand(1, 13);
          $c = mt_rand(1, 13);
          $abc = $a + $b + $c;
          //合計が21になったらループを抜ける
          if ($abc == 21) {
            break;
          }
        } while (TRUE);
        echo "合計が21になる3個の数字　{$a}、{$b}、{$c}";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
do {
  //変数に1～13の乱数を入れる
  $a = mt_rand(1, 13);
  $b = mt_rand(1, 13);
  $c = mt_rand(1, 13);
  $abc = $a + $b + $c;
  //合計が21になったらループを抜ける
  if ($abc == 21) {
    break;
  }
} while (TRUE);
echo &quot;合計が21になる3個の数字　{$a}、{$b}、{$c}&quot;;
?&gt;
</code></pre>

        <div class="blank"></div>
        <h2>カウンタを使った繰り返し for文</h2>
        <h3>for文で処理を10回繰り返す</h3>
        <?php
        for ($i = 0; $i < 10; $i++) {
          echo "{$i}回。";
        }
        ?>
        <pre><code class="prettyprint">&lt;?php
for ($i = 0; $i &lt; 10; $i++) {
  echo &quot;{$i}回。&quot;;
}
?&gt;</code></pre>

        <div class="blank"></div>
        <h2>カウンタの値に意味をもたせた処理</h2>
        <h3>人数が3人までなら1人1,000円、4人目からは半額の500円として6人までの料金計算</h3>
        <?php
        $price = 0;
        for ($people = 1; $people <= 6; $people++) {
          if ($people <= 3) {
            $price += 1000;
          } else {
            $price += 500;
          }
          echo "{$people}人なら{$price}円です。";
        }
        ?>
        <pre><code class="prettyprint">&lt;?php
$price = 0;
for ($people=1; $people&lt;=6; $people++) {
  if ($people&lt;=3) {
    $price += 1000;
  } else {
    $price += 500;
  }
  echo &quot;{$people}人なら{$price}円です。&quot;;
}
?&gt;
</code></pre>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>