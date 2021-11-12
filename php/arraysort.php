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
  <title>PHP編”配列のソート”</title>
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
      <h1>配列をソート</h1>
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
      <li><a href="arraysort.php">配列をソート</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列をソートする</h2>
        <div class="frame1">
          sort()はインデックス配列の値を昇順に並び替える関数です。インデックス番号もリセットされ、引数で渡した配列の値が並び替わります。
        </div>
        <h3>配列の値を昇順と降順にソートする</h3>
        <?php
        $data = [55, 3, 89, 21, 36, 10, 100, 66];
        sort($data); //昇順
        print_r($data);
        echo "\n <br><br>";
        rsort($data); //降順
        print_r($data);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [55,3,89,21,36,10,100,66];
sort($data); //昇順
print_r($data);
echo &quot;\n &lt;br&gt;&lt;br&gt;&quot;;
rsort($data); //降順
print_r($data);
?&gt;
</code></pre>
        <div class="blank"></div>
        <h4>複製した配列をソート</h4>
        <div class="frame3">
          元になっている配列を直接ソートせずに、配列を複製してソートしたい場合に使用する。
        </div>
        <h3>複製してソート</h3>
        <?php
        $data = [55, 3, 89, 21, 36, 10, 100, 66];
        $clone = $data;
        sort($clone);
        print_r($clone);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [55,3,89,21,36,10,100,66];
$clone = $data;
sort($clone);
print_r($clone);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>ソートの型のフラグ</h4>
        <div class="frame3">
          値を数値としてソートするか文字列としてソートするかといったオプションを第2引数で指定できます。
        </div>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>ソート型のフラグ</th>
            <th>動作</th>
          </tr>
          <tr>
            <td>SORT_REGULAR</td>
            <td>型変更をしない(初期値)</td>
          </tr>
          <tr>
            <td>SORT_NUMERIC</td>
            <td>数値として比較</td>
          </tr>
          <tr>
            <td>SORT_STRING</td>
            <td>文字列として比較</td>
          </tr>
          <tr>
            <td>SORT_LOCALE_STRING</td>
            <td>現在のロケールに基づく</td>
          </tr>
          <tr>
            <td>SORT_NATURAL</td>
            <td>文字列として自然順で比較</td>
          </tr>
          <tr>
            <td>SORT_FLAG_CASE</td>
            <td>大文字小文字を比較しない</td>
          </tr>
        </table>
        <div class="blank"></div>

        <h4>配列をソートする関数</h4>
        <div class="frame3">
          配列をソートする関数には値とキーどちらでソートするか、キーと値の関係性が維持されるか、昇順か降順かといった違いがあります。
        </div>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>関数名</th>
            <th>概要</th>
            <th>ソート</th>
            <th>キーと値の関係</th>
            <th>ソート順</th>
          </tr>
          <tr>
            <td>asort()</td>
            <td>連想配列を値で昇順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>arsort()</td>
            <td>連想配列を値で降順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>ksort()</td>
            <td>連想配列をキーで昇順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>krsort</td>
            <td>連想配列をキーで降順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>natcasesort()</td>
            <td>大文字小文字を区別せず自然順でソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>自然順</td>
          </tr>
          <tr>
            <td>natsort()</td>
            <td>自然順でソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>自然順</td>
          </tr>
          <tr>
            <td>sort()</td>
            <td>値で昇順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>rsort()</td>
            <td>値で降順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>shuffle()</td>
            <td>ランダムに並べる</td>
            <td>値</td>
            <td>維持しない</td>
            <td>ランダム</td>
          </tr>
          <tr>
            <td>uasort()</td>
            <td>値でユーザー定義順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>ユーザー定義</td>
          </tr>
          <tr>
            <td>uksort()</td>
            <td>キーでユーザー定義順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>ユーザー定義</td>
          </tr>
          <tr>
            <td>usort()</td>
            <td>値でユーザー定義順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>ユーザー定義</td>
          </tr>
        </table><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>