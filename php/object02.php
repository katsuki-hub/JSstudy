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
  <title>PHP編”オブジェクトのクラスの継承”</title>
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
      <h1>オブジェクト指向~クラスの継承~</h1>
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
          <li><a href="arraysearch.php">配列の比較・検索</a></li>
          <li><a href="arrayfunction.php">配列の要素に関数</a></li>
          <li><a href="object.php">オブジェクト指向</a></li>
          <li><a href="object01.php">OOP~クラス定義</a></li>
          <li><a href="object02.php">OOP~クラス継承</a></li>
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
      <li><a href="object02.php">OOPクラス継承</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向~クラスの継承~</h2>
        <div class="frame3">
          クラスの継承とは、既存のクラスを拡張するように自身のクラスを定義する方法です。<br>クラスAを基にクラスBを作りたいとき、クラスAを継承して追加変更したい機能だけをクラスBで定義します。<br>クラスの継承にはextendsキーワードを使います。
          <div class="frame2">
            <b>クラスの継承</b><br>
            class 子クラス extends 親クラス {<br>
            }
          </div>
        </div>

        <h3>親クラスClimber.php</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
class Climber
{
  public $name;
  public $score;

  function __construct($name = &#039;名無し&#039;,$score = 0) //引数が省略された場合のコンストラクタ初期値
  {
    $this-&gt;name = $name;
    $this-&gt;score = $score;
  }

  public function __toString() //ストリングにキャストされたとき返す文字列
  {
    return $this-&gt;name;
    return $this-&gt;score;
  }

  public function who()//インスタンスメソッド
  {
    echo &quot;{$this-&gt;name}です。&quot;, &quot;\n&quot;;
  }
}
</code></pre>

        <h3>子クラスResult.php</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Climber.php&quot;); //親クラス読み込み

class Result extends Climber
{
    public function yosen()
    {
        echo "{$this->name}の予選リザルトは{$this->score}点です。", "\n";
    }
}
</code></pre>

        <h3>子クラスのインスタンスを使う</h3>
        <pre class="re"><?php
                        require_once("Result.php");
                        ?>

<?php
$climber1 = new Climber("ともあ", 56.00);
$climber1->who();
$climber1->yosen();
?>

<?php
$climber2 = new Climber("みほう");
echo "{$climber2}", "\n"; //__toString()で文字列にキャスト
$climber2->who();
?>
</pre>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Result.php&quot;);
?&gt;

&lt;?php
$climber1 = new Climber(&quot;ともあ&quot;, 56.00);
$climber1-&gt;who();
$climber1-&gt;yosen();
?&gt;

&lt;?php
$climber2 = new Climber(&quot;みほう&quot;);
echo &quot;{$climber2}&quot;, &quot;\n&quot;; //__toString()で文字列にキャスト
$climber2-&gt;who();
?&gt;
</code></pre>
        <div class="blank"></div>




      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>