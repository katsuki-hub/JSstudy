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
  <title>PHP編”正規表現の基本知識”</title>
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
      <h1>正規表現の基本知識</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="regex.php">正規表現</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>正規表現の基本知識</h2>
        <h4>正規表現とは</h4>
        <div class="frame1">
          文字列をパターンで検索して、パターンにマッチするかどうかチェックする、置換する、分割するといった文字列処理を行う手法です。<br><br>
          パターンにマッチで利用する関数はpreg_match()です。<br>第1引数にパターンの文字列、第2引数に検索対象の文字列を指定する。
        </div>
        <div class="frame2">
          $result = preg_match($pattern,$subject)<br>
          マッチした時1、マッチしなかったら0が戻る解析できなかったり、エラーの場合はfalseになります。<br>パターンは//で囲む　※##でも可
        </div>

        <h3>「46-49」が含まれているかどうか調べる</h3>
        <?php
        $result1 = preg_match("/46-49/u", "確か49-46でした");
        $result2 = preg_match("/46-49/u", "たぶん46-49だった");
        var_dump($result1);
        var_dump($result2);
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$result1 = preg_match(&quot;/46-49/u&quot;, &quot;確か49-46でした&quot;);
$result2 = preg_match(&quot;/46-49/u&quot;, &quot;たぶん46-49だった&quot;);
var_dump($result1);
var_dump($result2);
?&gt;
</code></pre>
        <div class="frame2">
          <p>任意の1文字を含むパターン<br>
            /4.-49/<br><br>
            任意の1文字が6～9の数字のパターン<br>
            /4[6-9]-49/
          </p>
        </div>
        <div class="blank"></div>

        <h4>後置オプション（PCREパターン修飾子）</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>後置オプション</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>i</td>
            <td>アルファベットの大文字小文字を区別しない</td>
          </tr>
          <tr>
            <td>m</td>
            <td>行単位でマッチングする</td>
          </tr>
          <tr>
            <td>s</td>
            <td>ドット(.)で改行文字もマッチングする</td>
          </tr>
          <tr>
            <td>u</td>
            <td>パターン文字をUTF-8エンコードで扱う</td>
          </tr>
          <tr>
            <td>x</td>
            <td>パターンの中の空白文字を無視する(文字パターン内の空白を除く)</td>
          </tr>
        </table><br><br>

        <h3>文字クラスを使ったパターン</h3>


      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>