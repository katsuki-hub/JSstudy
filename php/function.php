<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~関数~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "関数の使い方" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="function.php">関数</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>よく利用される数学関数</h2>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>関数</th>
            <th>戻り値</th>
          </tr>
          <tr>
            <td>abs(数値)</td>
            <td>数値の絶対値</td>
          </tr>
          <tr>
            <td>ceil(数値)</td>
            <td>端数を切り上げた数字</td>
          </tr>
          <tr>
            <td>floor(数値)</td>
            <td>端数を切り捨てた数値</td>
          </tr>
          <tr>
            <td>round(数値)</td>
            <td>端数を四捨五入した数値</td>
          </tr>
          <tr>
            <td>max(値,値,...)</td>
            <td>値の中の最大値(string 同士ならアルファベット順)</td>
          </tr>
          <tr>
            <td>min(値,値,...)</td>
            <td>値の中の最小値(string 同士ならアルファベット順)</td>
          </tr>
          <tr>
            <td>sqrt(数値)</td>
            <td>数値の平方根</td>
          </tr>
          <tr>
            <td>pow(a,b)</td>
            <td>aのb乗(a**bと同じ)</td>
          </tr>
          <tr>
            <td>mt_rand(最小値,最大値)</td>
            <td>最小値から最大値の乱数</td>
          </tr>
          <tr>
            <td>pi()</td>
            <td>円周率</td>
          </tr>
          <tr>
            <td>sin(β)</td>
            <td>βラジアンの正弦</td>
          </tr>
          <tr>
            <td>cos(β)</td>
            <td>βラジアンの余弦</td>
          </tr>
          <tr>
            <td>tan(β)</td>
            <td>βラジアンの正接</td>
          </tr>
          <tr>
            <td>is_nan(値)</td>
            <td>値が数値の時 true,数値でないとき false</td>
          </tr>
        </table>
      </section>
      <div class="blank"></div>

      <section>
        <h2>関数を使ってみる</h2>
        <h3>1～10の乱数を10個作る</h3>
        <?php
        for ($i = 1; $i <= 10; $i++) {
          $num = mt_rand(1, 10);
          echo "{$num},";
        }
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
for ($i = 1; $i &lt;= 10; $i++) {
  $num = mt_rand(1, 10);
  echo &quot;{$num},&quot;;
}
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>距離と角度から高さを求める</h3>
        <div class="frame1">
          距離20ｍと角度32度から気の高さを計算！！<br>tan()の角度は、度数*pi()/180ラジアンに変換し、計算結果を10倍して四捨五入で値を算出 </div>
        <?php
        $kyori = 20;
        $kakudo = 32;
        $takasa = $kyori * tan($kakudo);
        $takasa = round($takasa * 10);

        echo "木の高さは{$takasa}mです。"
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$kyori = 20;
$kakudo = 32;
$takasa = $kyori * tan($kakudo);
$takasa = round($takasa * 10);

echo &quot;木の高さは{$takasa}mです。&quot;
?&gt;</code></pre>
        <div class="blank"></div>

        <h3>ユーザー定義関数</h3>
        <div class="frame1">
          5,000円未満では送料250円を加算する料金<br>2,400円を2個購入した時の料金と1,200円を5個購入した時の料金
        </div>
        <?php
        function price($tanka, $kosu)
        {
          $souryo = 250;
          $ryoukin = $tanka * $kosu;
          // 5,000円未満は送料250円
          if ($ryoukin < 5000) {
            $ryoukin += $souryo;
          }
          return $ryoukin;
        }

        $kingaku1 = price(2400, 2);
        $kingaku2 = price(1200, 5);
        echo "2,400円を2個購入した時の金額は{$kingaku1}円" . "<br>";
        echo "1,200円を5個購入した時の金額は{$kingaku2}円";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function price($tanka, $kosu)
{
  $souryo = 250;
  $ryoukin = $tanka * $kosu;
  // 5,000円未満は送料250円
  if ($ryoukin &lt; 5000) {
    $ryoukin += $souryo;
  }
  return $ryoukin;
}

$kingaku1 = price(2400, 2);
$kingaku2 = price(1200, 5);
echo &quot;2,400円を2個購入した時の金額は{$kingaku1}円&quot; . &quot;&lt;br&gt;&quot;;
echo &quot;1,200円を5個購入した時の金額は{$kingaku2}円&quot;;
?&gt;</code></pre>
        <div class="blank"></div>

        <h2>変数のスコープ</h2>
        <h4>グローバル変数</h4>
        <div class="frame2">
          global $変数名;
        </div>
        関数の外で定義してある変数は「グローバル変数」を使う
        <h4>スタティック変数</h4>
        <div class="frame2">
          static $変数名 = 初期値;
        </div>
        変数を初期化して使うローカルスコープ
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>