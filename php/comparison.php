<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~文字列の比較~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "文字列の比較" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
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
        <?php
        function check($a, $b)
        {
          if ($a === $b) {
            echo "{$a}と{$b}は", "同じ。\n <br>";
          } else {
            echo "{$a}と{$b}は", "違う。\n <br>";
          }
        }
        check("10cm", "10cm");
        check("10km", "10cm");
        check("10人", "10");
        check("PHP7", "7");
        check("七", "0");
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function check($a, $b)
{
  if ($a === $b) {
    echo &quot;{$a}と{$b}は&quot;, &quot;同じ。\n &lt;br&gt;&quot;;
  } else {
    echo &quot;{$a}と{$b}は&quot;, &quot;違う。\n &lt;br&gt;&quot;;
  }
}
check(&quot;10cm&quot;, &quot;10cm&quot;);
check(&quot;10km&quot;, &quot;10cm&quot;);
check(&quot;10人&quot;, &quot;10&quot;);
check(&quot;PHP7&quot;, &quot;7&quot;);
check(&quot;七&quot;, &quot;0&quot;);
?&gt;
</code></pre>

        <div class="frame1">
          <b>厳密に比較する演算子</b><br>
          比較に==演算子を===に書き換えると、厳密な比較になる。
        </div>

        <h2>その他の比較演算子</h2>
        <table border="1" class="function">
          <tr>
            <td>
              <,<=,>,>=
            </td>
            <td>文字列に対して使用できるが、大小関係はアルファベット順。大小の比較を有効に利用できるのは半角英文字の場合で1文字目が同じなら次の文字、大文字の方が前の順になる。</td>
          </tr>
          <tr>
            <td>(string)$var</td>
            <td>数値を文字列にキャストして比較する。</td>
          </tr>
          <tr>
            <td>strcmp($str1,$str2)</td>
            <td>引数が数値であっても文字列にキャストして比較する。</td>
          </tr>
          <tr>
            <td>strcasecmp()</td>
            <td>引数を文字列にキャストし、英文字の大文字と小文字を区別せずに比較します。</td>
          </tr>
          <tr>
            <td>strncmp($str1,$str2,len)</td>
            <td>前方一致で比較する。</td>
          </tr>
          <tr>
            <td>strncasecmp($str1,$str2,len)</td>
            <td>英文字の大文字と小文字を区別せず前方一致で比較します。</td>
          </tr>
        </table>
        <br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>