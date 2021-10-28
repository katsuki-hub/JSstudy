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
  <title>PHP編”文字列の変換”</title>
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
      <h1>文字列の変換</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="convert.php">文字列の変換</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>全角・半角/ひらがな・カタカナの変換</h2>
        <div class="frame1">
          <b>文字を変換する</b><br>
          mb_convert_kana(変換対象の文字列,option,encoding)<br><br>
          encodingの文字エンコーディングは省略した場合は内部エンコーディングが採用されます。
        </div>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>オプション</th>
            <th>変換</th>
          </tr>
          <tr>
            <td>r</td>
            <td>全角英字 ⇒ 半角英字</td>
          </tr>
          <tr>
            <td>n</td>
            <td>全角数字 ⇒ 半角数字</td>
          </tr>
          <tr>
            <td>a</td>
            <td>全角の英数記号 ⇒ 半角の英数記号</td>
          </tr>
          <tr>
            <td>s</td>
            <td>全角スペース ⇒ 半角スペース</td>
          </tr>
          <tr>
            <td>R</td>
            <td>半角英字 ⇒ 全角英字</td>
          </tr>
          <tr>
            <td>N</td>
            <td>半角数字 ⇒ 全角数字</td>
          </tr>
          <tr>
            <td>A</td>
            <td>半角の英数記号 ⇒ 全角の英数記号</td>
          </tr>
          <tr>
            <td>S</td>
            <td>半角のスペース ⇒ 全角のスペース</td>
          </tr>
          <tr>
            <td>h</td>
            <td>ひらがな ⇒ 半角カタカナ</td>
          </tr>
          <tr>
            <td>C</td>
            <td>ひらがな ⇒ 全角カタカナ</td>
          </tr>
          <tr>
            <td>H</td>
            <td>半角カタカナ ⇒ ひらがな</td>
          </tr>
          <tr>
            <td>c</td>
            <td>全角カタカナ ⇒ ひらがな</td>
          </tr>
          <tr>
            <td>k</td>
            <td>全角カタカナ ⇒ 半角カタカナ</td>
          </tr>
          <tr>
            <td>K</td>
            <td>半角カタカナ ⇒ 全角カタカナ</td>
          </tr>
          <tr>
            <td>V</td>
            <td>濁点付きの文字を1文字に変換する</td>
          </tr>
        </table>
        <h3>文字の変換</h3>
        <?php
        $msg1 = "Ｈｅｌｌｏ！　ＰＨＰをはじめよう。";
        $msg2 = "HELLO! PHPをはじめよう。";
        $name = "かつまるかんじゅうろう";
        $hankana = mb_convert_kana($name, "h");
        $zenkana = mb_convert_kana($name, "C");
        echo mb_convert_kana($msg1, "as"), "<br>", PHP_EOL;
        echo mb_convert_kana($msg2, "AS"), "<br>", PHP_EOL;
        echo $hankana, "<br>", PHP_EOL;
        echo $zenkana, "<br>", PHP_EOL;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$msg1 = &quot;Ｈｅｌｌｏ！　ＰＨＰをはじめよう。&quot;;
$msg2 = &quot;HELLO! PHPをはじめよう。&quot;;
$name = &quot;かつまるかんじゅうろう&quot;;
$hankana = mb_convert_kana($name,&quot;h&quot;);
$zenkana = mb_convert_kana($name,&quot;C&quot;);
echo mb_convert_kana($msg1, &quot;as&quot;),&quot;&lt;br&gt;&quot;,PHP_EOL;
echo mb_convert_kana($msg2,&quot;AS&quot;),&quot;&lt;br&gt;&quot;,PHP_EOL;
echo $hankana,&quot;&lt;br&gt;&quot;,PHP_EOL;
echo $zenkana,&quot;&lt;br&gt;&quot;,PHP_EOL;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>英文字の大文字・小文字の変換</h2>
        <div class="frame1">
          半角の英文字は strtoupper()で小文字を大文字に変換<br>
          strtolower()で大文字を小文字に変換できる<br>
          unfirst()は英文の先頭の文字を大文字にする<br>
          ucwords()は英文に含まれている単語の先頭の文字を大文字にします。
        </div>

        <h3>英文字の変換</h3>
        <?php
        $alphabet = "Apple Iphone";
        echo strtoupper($alphabet), "<br>", PHP_EOL;
        echo strtolower($alphabet), "<br>", PHP_EOL;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$alphabet = &quot;Apple Iphone&quot;;
echo strtoupper($alphabet),&quot;&lt;br&gt;&quot;,PHP_EOL;
echo strtolower($alphabet),&quot;&lt;br&gt;&quot;,PHP_EOL;
</code></pre>
        <div class="blank"></div>

        <h2>不要な改行や空白を取り除く</h2>
        <div class="frame1">
          フォームに入力されたテキストの先頭や末尾の不要な空白や改行を取り除く関数<br>trim()先頭と末尾<br>ltrim()が先頭、rtrim()が末尾の除去<br><br>※初期値では全角空白を取り除けない。第2引数に取り除きたい文字を指定することが出来る。<br>全角空白を取り除くには第2引数に "\x20\t\n\r\o\v　"　※最後の空きは全角空白です
        </div>
        <h3>不要な文字の取り除き</h3>
        <?php
        $tabu = "\tタブと改行を入れてるよ！！     \n\n";
        $result = trim($tabu);
        echo "処理前：\n", "<br>";
        echo "[", $tabu, "]\n", "<br>";
        echo "処理後：\n", "<br>";
        echo "[", $result, "]\n", "<br>";
        ?><br>
        ※ソースではタブと改行されている

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$tabu = &quot;\tタブと改行を入れてるよ！！     \n\n&quot;;
$result = trim($tabu);
echo &quot;処理前：\n&quot;;
echo &quot;[&quot;, $tabu, &quot;]\n&quot;;
echo &quot;処理後：\n&quot;;
echo &quot;[&quot;, $result, &quot;]\n&quot;;
</code></pre>
        <div class="blank"></div>

        <h2>その他の文字変換</h2>
        <table border="1" class="function">
          <tr>
            <td>htmlspecialchars()</td>
            <td>&から始まる文字列(エンティティ)に置き換える<br>第2引数でENT_QUOTES指定でシングルとダブルクォートの両方変換。デフォルトはダブルクォートのみ</td>
          </tr>
          <tr>
            <td>strip_tags()</td>
            <td>HTMLタグが含まれた文字列を全て取り除く</td>
          </tr>
          <tr>
            <td>rawurlencode()</td>
            <td>URLエンコード<br>空白文字は％20に変換</td>
          </tr>
          <tr>
            <td>urlencode()</td>
            <td>URLエンコード<br>空白文字は+に変換</td>
          </tr>
          <tr>
            <td>rawurldecode()</td>
            <td>rawurlencode()でエンコードされた文字をデコード</td>
          </tr>
          <tr>
            <td>urldecode()</td>
            <td>urlencode()でエンコードされた文字をデコード</td>
          </tr>
        </table>
        <br><br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>