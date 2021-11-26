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
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="array02.php">配列要素</a></li>
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
        echo '戻り：$removed1', "\n <br>";
        print_r($removed1);
        echo "<br>";
        echo '戻り：$removed2', "\n <br>";
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

        <h2>配列の要素を置換・挿入する</h2>
        <div class="frame3">
          <div class="frame2">
            $removed = array_splice($myArray,$start,$length=(),$replacement);
          </div>
          <b>置換</b><br>
          array_splice()に第4引数$replacementを指定すると、要素の置換が出来ます。配列の$myArrayの$start位置から$length個を削除し、それを$replacementの配列と置換します。<br>
          <b>挿入</b><br>
          $lengthを0にすると1個も削除されず$startの位置に要素を挿入したことになります。<br><br>$removedには削除された要素の配列が入ります。
        </div>
        <h3>配列の2番目から3個の要素を置換する</h3>
        <?php
        $myArray = ["A", "B", "C", "D", "E"];
        $replace = ["7", "8", "9"];
        $removed = array_splice($myArray, 1, 3, $replace);
        echo '置換後：$myArray', "\n <br>";
        print_r($myArray);
        echo "\n <br>";
        echo '戻り：$removed', "\n <br>";
        print_r($removed);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$myArray = [&quot;A&quot;,&quot;B&quot;,&quot;C&quot;,&quot;D&quot;,&quot;E&quot;];
$replace = [&quot;7&quot;,&quot;8&quot;,&quot;9&quot;];
$removed = array_splice($myArray,1,3,$replace);
echo &#039;置換後：$myArray&#039;,&quot;\n &lt;br&gt;&quot;;
print_r($myArray);
echo &quot;\n &lt;br&gt;&quot;;
echo &#039;戻り：$removed&#039;,&quot;\n &lt;br&gt;&quot;;
print_r($removed);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列と配列を連結する</h2>
        <div class="frame3">
          <div class="frame2">
            +演算子で連結する
          </div>
          配列A + 配列Bのように + 演算子を使って配列を連結すると、配列Bが配列Aよりも要素の個数が多いときに、その多い部分を配列Aに追加した配列Cが作られます。<br><br>
          <div class="frame2">
            <b>複数の配列を連結する</b><br>
            $result = array_merge($array1,$array2,$array3,...);
          </div>
          array_mergeで配列を連結していく。重複したキーは後の配列の値が採用される。<br><br>
          <div class="frame2">
            array_merge_recursive()で連結する
          </div>
          array_mergeと似ているが、重複するキーがあった場合の連結の仕方に違いがあり、重複キーの値を多重配列にしてすべて残す。
        </div>
        <h3>配列を+演算子とarray_merge</h3>
        <?php
        $a = ["A", "B", "C"];
        $b = ["D", "E", "F", "G", "H"];
        $c = ["c1", "c2", "c4", "c5", "c6", "c7"];
        $result = $a + $b + $c;
        echo "+演算子連結", "\n <br>";
        print_r($result);
        echo "\n <br>";
        echo "array_merge連結", "\n <br>";
        $result2 = array_merge($a, $b, $c);
        print_r($result2);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$a = [&quot;A&quot;, &quot;B&quot;, &quot;C&quot;];
$b = [&quot;D&quot;, &quot;E&quot;, &quot;F&quot;, &quot;G&quot;, &quot;H&quot;];
$c = [&quot;c1&quot;, &quot;c2&quot;, &quot;c4&quot;, &quot;c5&quot;, &quot;c6&quot;,&quot;c7&quot;];
$result = $a + $b + $c;
echo &quot;+演算子連結&quot;,&quot;\n &lt;br&gt;&quot;;
print_r($result);
echo &quot;\n &lt;br&gt;&quot;;
echo &quot;array_merge連結&quot;,&quot;\n &lt;br&gt;&quot;;
$result2 =array_merge($a,$b,$c);
print_r($result2);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>連想配列を連結</h3>
        <?php
        $a = ["a" => 1, "b" => 2, "c" => 3];
        $b = ["b" => 200, "d" => 40];
        $result = array_merge($a, $b);
        $result2 = array_merge_recursive($a, $b);
        echo "array_merge連結", "\n <br>";
        print_r($result);
        echo "\n <br>";
        echo "array_merge_recursive連結", "\n <br>";
        print_r($result2);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$a = [&quot;a&quot;=&gt;1,&quot;b&quot;=&gt;2,&quot;c&quot;=&gt;3];
$b = [&quot;b&quot;=&gt;200,&quot;d&quot;=&gt;40];
$result = array_merge($a,$b);
$result2 = array_merge_recursive($a,$b);
echo &quot;array_merge連結&quot;, &quot;\n &lt;br&gt;&quot;;
print_r($result);
echo &quot;\n &lt;br&gt;&quot;;
echo &quot;array_merge_recursive連結&quot;, &quot;\n &lt;br&gt;&quot;;
print_r($result2);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>2つの配列から連想配列を作る</h2>
        <div class="frame3">
          array_combine(keys,values)を使うと、配列keysをキー、配列valuesを値にした連想配列を作ることが出来ます。
        </div>
        <h3>通過地点をキー、スプリットを値にした連想配列にする</h3>
        <?php
        $point = ["5km", "10km", "20km", "40km", "Goal"];
        $sprit = ["00:30:58", "00:55:37", "01:48:12", "03:38:20", "04:05:08"];
        $result = array_combine($point, $sprit);
        print_r($result);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$point = [&quot;5km&quot;,&quot;10km&quot;,&quot;20km&quot;,&quot;40km&quot;,&quot;Goal&quot;];
$sprit = [&quot;00:30:58&quot;,&quot;00:55:37&quot;,&quot;01:48:12&quot;,&quot;03:38:20&quot;,&quot;04:05:08&quot;];
$result = array_combine($point,$sprit);
print_r($result);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列から重複した値を取り除く</h2>
        <div class="frame3">
          array_unique()を利用すると配列から重複した値を取り除くことが出来ます。
        </div>
        <h3>配列を連結して重複を取り除く</h3>
        <?php
        $a = ["テント", "タープ", "寝袋"];
        $b = ["焚き火台", "寝袋", "薪"];
        $c = ["テント", "椅子"];
        $all = array_merge($a, $b, $c);
        $unique = array_unique($all);
        print_r($all);
        echo "<br>";
        print_r($unique);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$a = [&quot;テント&quot;,&quot;タープ&quot;,&quot;寝袋&quot;];
$b = [&quot;焚き火台&quot;,&quot;寝袋&quot;,&quot;薪&quot;];
$c = [&quot;テント&quot;,&quot;椅子&quot;];
$all = array_merge($a,$b,$c);
$unique =array_unique($all);
print_r($all);
echo &quot;&lt;br&gt;&quot;;
print_r($unique);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列を切り出す</h2>
        <div class="frame3">
          array_spliceを利用すると、配列を切り出して新しい配列を作ることができます。
          <div class="frame2">
            <b>配列を切り出す</b><br>
            $slice = array_splice($myArray,$start,$length)
          </div>
          第1引数の$myArray配列の$start位置から$lengthの長さだけ切り出して、$sliceに代入します。$lengthを省略すると$start位置から最後までが切り出される。
        </div>
        <h3>配列を切り出す</h3>
        <?php
        $myArray = ["A", "B", "C", "D", "E", "F"];
        $slice1 = array_slice($myArray, 0, 3);
        $slice2 = array_slice($myArray, 3, 2);
        $slice3 = array_slice($myArray, -3);
        print_r($slice1);
        echo "<br>";
        print_r($slice2);
        echo "<br>";
        print_r($slice3);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$myArray = [&quot;A&quot;, &quot;B&quot;, &quot;C&quot;, &quot;D&quot;, &quot;E&quot;,&quot;F&quot;];
$slice1 = array_slice($myArray,0,3);
$slice2 = array_slice($myArray,3,2);
$slice3 = array_slice($myArray,-3);
print_r($slice1);
echo &quot;&lt;br&gt;&quot;;
print_r($slice2);
echo &quot;&lt;br&gt;&quot;;
print_r($slice3);
?&gt;
</code></pre><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php include(dirname(__FILE__) . '/../commom/footer.php'); ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>