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
  <title>PHP編”文字列”</title>
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
      <h1>文字列</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="string.php">文字列</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>ヒアドキュメント構文</h2>
        <div class="frame2">
          <<<"識別子"<br>
            ~任意の文字列~<br>
            識別子;
        </div>
        <h3>複数行の文字列をヒアドキュメントで作成</h3>
        <?php
        $document = "ヒアドキュメント構文";
        $msg = <<<"EOD"
        これから"PHPの$document"の書式を覚えよう。
        ソースコード参照だよ！
        EOD;
        echo $msg;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$document = &quot;ヒアドキュメント構文&quot;;
$msg = &lt;&lt;&lt;&quot;EOD&quot;
これから&quot;PHPの$document&quot;の書式を覚えよう。
ソースコード参照だよ！
EOD;
echo $msg;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>Nowdoc構文</h2>
        ヒアドキュメント構文とは違い、文章内の変数を展開しません。<br>ヒアドキュメントはダブルクォートで囲まれた文字列<br>Nowdocはシングルクォートで囲まれた文字列
        <h3>複数行の文字列をNowdocで作成</h3>
        <?php
        $documentN = "Nowdoc構文";
        $msg = <<<'EOD'
        これから"PHPの$documentN"の書式を覚えよう。
        ソースコード参照だよ！
        EOD;
        echo $msg;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$document = &quot;Nowdoc構文&quot;;
$msg = &lt;&lt;&lt;&#039;EOD&#039;
これから&quot;PHPの$documentN&quot;の書式を覚えよう。
ソースコード参照だよ！
EOD;
echo $msg;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>フォーマット文字列 printf()</h2>
        <div class="frame2">
          printf('フォーマット文字列',値1,値2,...,値n)
        </div>

        <h4>型指定子</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>型指定子</th>
            <th>意味</th>
          </tr>
          <tr>
            <td>%</td>
            <td>パーセント文字。引数は不要</td>
          </tr>
          <tr>
            <td>d</td>
            <td>引数を整数として扱う。10進数で表現</td>
          </tr>
          <tr>
            <td>u</td>
            <td>引数を整数として扱う。符号なしの10進数で表現</td>
          </tr>
          <tr>
            <td>F</td>
            <td>引数をfloatとして扱う。浮動小数点数として表現</td>
          </tr>
          <tr>
            <td>s</td>
            <td>引数を文字列として扱う。</td>
          </tr>
          <tr>
            <td>x</td>
            <td>引数を整数として扱う。16進数の(小文字で)表現</td>
          </tr>
          <tr>
            <td>X</td>
            <td>引数を整数として扱う。16進数の(大文字で)表現</td>
          </tr>
        </table>

        <h3>円周率の少数第3位までを出力する</h3>
        <?php
        echo M_PI; //円周率を出力
        echo "<br>", PHP_EOL; //改行
        printf('円周率は%.3fです。', M_PI); //フォーマット文字列を指定
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
echo M_PI; //円周率を出力
echo &quot;&lt;br&gt;&quot;, PHP_EOL; //改行
printf(&#039;円周率は%.3fです。&#039;, M_PI);　//フォーマット文字列を指定
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>フォーマット文字列を変数で指定</h3>
        <?php
        $format = '最大値%.1f,最小値%.1f';
        $a = 18.89;
        $b = 12.33;
        printf($format, $a, $b);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$format = &#039;最大値%.1f,最小値%.1f&#039;;
$a = 18.89;
$b = 12.33;
printf($format,$a,$b);
        </code></pre>
        <div class="blank"></div>

        <h2>フォーマット文字列の構文と書式修飾子</h2>
        <div class="frame2">
          '...%書式修飾子 型指定子...'
        </div><br>
        <p><b>パディング指定子</b><br>
          足りない分を埋める文字を指定。<br>※空白か0以外の文字指定には、全体をダブルクォートで囲み、埋める文字の前にシングルクォートを置く
        </p>
        <h3>足りない部分を0と*で埋める</h3>
        <?php
        $year = 2021;
        $month = 9;
        $day = 1;
        $en = 7890;
        printf('%04d-%02d-%02d', $year, $month, $day);
        echo "<br>", PHP_EOL; //改行
        printf("経費は%'*6d円です", $en);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$year = 2021;
$month = 9;
$day = 1;
$en = 7890;
printf(&#039;%04d-%02d-%02d&#039;, $year, $month, $day);
echo &quot;&lt;br&gt;&quot;, PHP_EOL; //改行
printf(&quot;経費は%&#039;*6d円です&quot;, $en);
</code></pre><br>
        

        <p><b>アラインメント指定子</b><br>
          パディング指定子で埋める際に、値を左寄せにするか右寄せにするかを指定する。<br>桁の数字前に-で左寄せ、+で右寄せ
        </p><br>

        <p><b>精度指定子</b><br>
          ピリオドに続いて小数点以下の桁数を指定します。浮動小数点の場合は桁数で四捨五入し、文字列の場合は文字数で切り捨てる。
        </p>
        <div class="blank"></div>

        <h2>フォーマットされた文字列を返す sprintf()</h2>
        sprintf()はフォーマット文字列を適用した文字列を返す関数です。フォーマット後の文字列を変数などに代入できます。
        <h3>フォーマット済みの文字列を変数に入れて扱う</h3>
        <?php
        $tosi = 2021;
        $seq = 892;
        $type = "RR";
        $id = sprintf('%04d%06d-%s', $tosi, $seq, $type);
        echo "商品ナンバーは、", $id, "です。";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$tosi = 2021;
$seq = 892;
$type = &quot;RR&quot;;
$id = sprintf(&#039;%04d%06d-%s&#039;, $tosi, $seq, $type);
echo &quot;商品ナンバーは、&quot;, $id, &quot;です。&quot;;
</code></pre>
        <div class="blank"></div>

        <h2>置換する値を配列で指定</h2>
        文字列の中に置換する配列が複数個あるときprintf()の代わりにvprintf()を使うと値を配列で指定できる。同様にsprintf()に対してvsprintf()がある。
        <h3>フォーマット文字列の%を配列の値で置換</h3>
        <?php
        $max = 18.77;
        $min = 11.12;
        $ave = 14.945;
        $data = array($max, $min, $ave); //置換する配列
        $formatt = '最大値%.1f、最小値%.1f、平均値%.2f'; //値を置換して表示
        vprintf($formatt, $data);
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$max = 18.77;
$min = 11.12;
$ave = 14.945;
$data = array($max, $min, $ave); //置換する配列
$formatt = &#039;最大値%.1f、最小値%.1f、平均値%.2f&#039;; //値を置換して表示
vprintf($formatt, $data);
</code></pre>
        <div class="blank"></div>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>