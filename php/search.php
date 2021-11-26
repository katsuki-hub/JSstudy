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
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
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
        <div class="frame2">
          mb_substr_countは検索した文字列が何個含まれているかを返す関数。下のソースでは「不可」が3個以上含まれていると再試験にしている。
        </div>
        <?php
        function check2($target2)
        {
          $result = mb_substr_count($target2, "不可");
          if ($result >= 3) {
            echo "不可が{$result}個あるので、再試験です。\n <br>";
          } else {
            echo "合格です\n <br>";
          }
        }
        check2("優,不可,良,可,良,可");
        check2("可,優,不可,不可,良,不可");
        check2("不可,可,不可,不可,良,不可");
        check2("可,可,不可,良,良");
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function check2($target2)
{
  $result = mb_substr_count($target2, &quot;不可&quot;);
  if ($result &gt;= 3) {
    echo &quot;不可が{$result}個あるので、再試験です。\n &lt;br&gt;&quot;;
  } else {
    echo &quot;合格です\n &lt;br&gt;&quot;;
  }
}
check2(&quot;優,不可,良,可,良,可&quot;);
check2(&quot;可,優,不可,不可,良,不可&quot;);
check2(&quot;不可,可,不可,不可,良,不可&quot;);
check2(&quot;可,可,不可,良,良&quot;);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>見つかった位置から後ろの文字列を取り出す</h3>
        <div class="frame2">
          mb_strstr()は特定の文字を検索して最初に見つかった位置から後ろにある文字を取り出す関数です。大文字小文字を区別しないで検索するなら mb_stristr()を使います。見るからない場合はfalseが戻ってきます。
        </div>
        <?php
        function pickout($target3, $str3)
        {
          $result = mb_stristr($target3, $str3);
          if ($result === false) {
            echo "(not found)\n <br>";
          } else {
            echo "{$result}\n <br>";
          }
        }
        pickout("福岡県福岡市博多区1-1-1", "博多区");
        pickout("福岡県福岡市博多区1-1-1", "福岡");
        pickout("福岡県福岡市博多区1-1-1", "東京");
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function pickout($target3, $str3)
{
  $result = mb_stristr($target3, $str3);
  if ($result === false) {
    echo &quot;(not found)\n &lt;br&gt;&quot;;
  } else {
    echo &quot;{$result}\n &lt;br&gt;&quot;;
  }
}
pickout(&quot;福岡県福岡市博多区1-1-1&quot;, &quot;博多区&quot;);
pickout(&quot;福岡県福岡市博多区1-1-1&quot;, &quot;福岡&quot;);
pickout(&quot;福岡県福岡市博多区1-1-1&quot;, &quot;東京&quot;);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>検索置換を行う</h3>
        <div class="frame2">
          <b>検索して置換する</b><br>
          str_replace($search,$replace,$subject,$count)<br><br>
          <b>大文字小文字を区別せずに置換する</b><br>
          str_ireplace($search,$replace,$subject,$count)<br><br>
          ※検索した文字を空白 "" に置換することで、見つかった文字を削除できる。
        </div>

        <?php
        $subject = "三匹の子猫がいる。";
        echo str_replace("猫", "豚", $subject), "\n <br>";
        echo str_replace("猫", "牛", $subject), "\n <br>";
        echo $subject;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$subject = &quot;三匹の子猫がいる。&quot;;
echo str_replace(&quot;猫&quot;,&quot;豚&quot;,$subject),&quot;\n &lt;br&gt;&quot;;
echo str_replace(&quot;猫&quot;,&quot;牛&quot;,$subject),&quot;\n &lt;br&gt;&quot;;
echo $subject;
?&gt;
</code></pre>
        <div class="blank"></div>
        <h4>検索文字と置換文字を配列で指定する</h4>
        <div class="frame3">
          str_replace()とstr_ireplace()では、第1引数と第2引数を配列で指定できる。つまり、複数の検索文字を置換したり設定が可能
        </div>
        <h3>"p"と"a"を"?"に置き換える</h3>
        <?php
        $search = array("p", "a");
        $subject = "Do you want a piece of pumpkin pie, Katsumaru?";
        $result = str_ireplace($search, "?", $subject, $count);
        echo "置換前：{$subject}", "\n <br>";
        echo "置換後：{$result}", "\n <br>";
        echo "置換個数：{$count}";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$search = array(&quot;p&quot;,&quot;a&quot;);
$subject = &quot;Do you want a piece of pumpkin pie, Katsumaru?&quot;;
$result = str_ireplace($search,&quot;?&quot;,$subject,$count);
echo &quot;置換前：{$subject}&quot;,&quot;\n &lt;br&gt;&quot;;
echo &quot;置換後：{$result}&quot;,&quot;\n &lt;br&gt;&quot;;
echo &quot;置換個数：{$count}&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>それぞれ配列指定で名前と年齢をベルの文字に置換</h3>
        <?php
        $search = ["鈴木", "35歳"];
        $replace = ["A", "x歳"];
        $subject = "担任の鈴木先生は35歳の英語担当です。";
        $result = str_replace($search, $replace, $subject);
        echo "置換前：{$subject}", "\n <br>";
        echo "置換後：{$result}";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$search = [&quot;鈴木&quot;, &quot;35歳&quot;];
$replace = [&quot;A&quot;, &quot;x歳&quot;];
$subject = &quot;担任の鈴木先生は35歳の英語担当です。&quot;;
$result = str_replace($search, $replace, $subject);
echo &quot;置換前：{$subject}&quot;, &quot;\n &lt;br&gt;&quot;;
echo &quot;置換後：{$result}&quot;;
</code></pre><br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php include(dirname(__FILE__) . '/../commom/footer.php'); ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>