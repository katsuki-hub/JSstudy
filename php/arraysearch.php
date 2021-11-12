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
  <title>PHP編”配列の比較・検索”</title>
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
      <h1>配列の比較・検索</h1>
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
      <li><a href="arraysearch.php">配列の比較と検索</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列の値を検索する</h2>
        <div class="frame3">
          配列の検索で簡単なのは in_array()を使った検索です。配列に探している値があるかチェックし、見つかればtrue、見つからなければfalceを返します。
          <div class="frame2">
            <b>配列に値があるかどうかをチェック</b><br>
            $isIn = in_array($value,$array);
          </div>
          配列$arrayに$valueが見つかれば、$isInにtrueが代入されます。インデックス配列、連想配列のどちらの値でも検索可能
        </div>
        <h3>値を自然順位並べて検索して表示</h3>
        <?php
        $numlist = [4108, 4350, 4488, 4691];
        $numbers = [4426, 4350, 4444, 4488, 4424];

        function checkNumber($no)
        {
          global $numbers;
          if (in_array($no, $numbers)) {
            echo "{$no}番は合格です";
          } else {
            echo "{$no}は見つかりません";
          }
        }
        echo "<ol>\n";
        foreach ($numlist as $value) {
          echo "<li>", checkNumber($value), "</li>\n";
        }
        echo "</ol>\n";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$numlist = [4108, 4350, 4488, 4691];
$numbers = [4426, 4350, 4444, 4488, 4424];

function checkNumber($no) {
  global $numbers;
  if(in_array($no,$numbers)) {
    echo &quot;{$no}番は合格です&quot;;
  } else {
    echo &quot;{$no}は見つかりません&quot;;
  }
}
echo &quot;&lt;ol&gt;\n&quot;;
foreach ($numlist as $value) {
  echo &quot;&lt;li&gt;&quot;,checkNumber($value),&quot;&lt;/li&gt;\n&quot;;
}
echo &quot;&lt;/ol&gt;\n&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>文字列の配列を検索（完全一致検索）</h3>
        <?php
        $nameList = ["桃太郎", "浦島太郎", "一寸法師"];

        function namecheck($name)
        {
          global $nameList;
          if (in_array($name, $nameList)) {
            echo "{$name}は仲間です";
          } else {
            echo "{$name}は仲間ではありません";
          }
        }

        echo namecheck("桃太郎"), "\n <br>";
        echo namecheck("赤鬼"), "\n <br>";
        echo namecheck("浦島太郎"), "\n <br>";
        echo namecheck("一寸法師"), "\n <br>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$nameList = [&quot;桃太郎&quot;,&quot;浦島太郎&quot;,&quot;一寸法師&quot;];

function namecheck ($name) {
  global $nameList;
  if (in_array($name,$nameList)) {
    echo &quot;{$name}は仲間です&quot;;
  } else {
    echo &quot;{$name}は仲間ではありません&quot;;
  }
}

echo namecheck(&quot;桃太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;赤鬼&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;浦島太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;一寸法師&quot;),&quot;\n &lt;br&gt;&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>新規の値だけを追加する</h4>
        <div class="frame3">
          新規の値だけを配列に追加する関数 array_addUnique()をin_array()を利用して作成。第1引数で元の配列、第2引数で追加する値を渡します。<br>追加する値がin_array()でチェックし存在するならfalceを渡し、存在しなければ値を追加してtrueを返します。第1引数には&をつけて&$arrayとして参照渡しをしているので、引数で渡した配列を直接操作しています。
        </div>

        <h3>配列に新規の値だけを追加</h3>
        <?php
        function array_addUnique(&$array, $value)
        {
          if (in_array($value, $array)) {
            return false;
          } else {
            $array[] = $value; //値が含まれていなかった時に値を追加
            return true;
          }
        }

        $myList = ["キビ団子", "剣",];
        array_addUnique($myList, "金棒");
        array_addUnique($myList, "草履");
        array_addUnique($myList, "盾");
        print_r($myList);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function array_addUnique(&amp;$array, $value)
{
  if (in_array($value, $array)) {
    return false;
  } else {
    $array[] = $value; //値が含まれていなかった時に値を追加
    return true;
  }
}

$myList = [&quot;キビ団子&quot;, &quot;剣&quot;,];
array_addUnique($myList, &quot;金棒&quot;);
array_addUnique($myList, &quot;草履&quot;);
array_addUnique($myList, &quot;盾&quot;);
print_r($myList);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>値が見つかった位置、キーを返す</h2>
        <div class="frame3">
          array_search()は見つかった値のキーを返します。<br>インデックス配列の場合は値のインデックス番号がキーとして戻ります。複数の値が一致する場合は一番最初に見つかった値のキーを返します。見つからない場合はfalseが返る。
        </div>

        <h3>見つかったキーで別の配列から値を取り出す</h3>



      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>