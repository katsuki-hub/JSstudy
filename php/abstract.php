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
  <title>PHP編”オブジェクト指向~抽象クラス~”</title>
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
      <h1>オブジェクト指向~抽象クラス~</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="abstract.php">OOP抽象クラス</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向~抽象クラス~</h2>
        <div class="frame3">
          <b>抽象クラスを定義する</b><br>
          <p>抽象クラスは機能的にインターフェースと似ているが、抽象メソッドの宣言だけで機能を実装していないメソッドで、抽象クラスを継承した子クラスで必ずオーバーライドして機能を実装しなければなりません。<br>抽象メソッドにはpubloc、protected、priveteのアクセス権を指定することができます。</p>
          <div class="frame2">
            <b>抽象クラス</b><br>
            abstract class 抽象クラス名 {<br>
            　abstract function 抽象メソッド名(引数,引数,...);<br>
            　//抽象クラスの実装<br>
            }
          </div>
        </div><br>

        <div class="frame3">
          <b>抽象クラスを継承して抽象メソッドを実装する</b><br>
          <p>抽象クラスのインスタンスをつくることは出来ません。必ず継承して使います。<br>そして、継承した子クラスでは抽象メソッドを必ずオーバーライドして機能を実装しなければなりません。<br>アクセス権が設定されている場合は、子クラスでオーバライドの際に同じかそれより緩いアクセス権の設定が必要です。</p>
          <div class="frame2">
            <b>抽象クラスを継承して、抽象メソッド実装</b><br>
            class クラス名 entends 抽象クラス名 {<br>
            　function 抽象メソッド名() {<br>
            //メソッドをオーバーライドして機能を定義する<br>
            }<br>
            　//子クラスの機能の実装<br>
            }
          </div>
        </div>

        <h3>抽象メソッドthanks()をもった抽象クラス</h3>
        <!-- ソースコード -->
        <button type="button">Shop.php</button>
        <pre><code class="prettyprint">&lt;?php
abstract class Shop
{
  abstract function thanks(); //抽象メソッド

  protected $sales = 0;
  protected function sell($price){
    if(is_numeric($price)) { //引数が数値型の変数として有効な値である場合にTRUEを返す
      echo &quot;{$price}円です。&quot;;
      $this-&gt;sales += $price;
    }
    $this-&gt;thanks(); //子クラスで実装されるメソッドを呼び出す
  }
}
</code></pre>
        <div class="blank"></div>

        <h3>抽象クラスを継承して抽象メソッドを実装する</h3>
        <!-- ソースコード -->
        <button type="button">MyShop.php</button>
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Shop.php&quot;);

class MyShop extends Shop
{
  public function thanks() //抽象クラスで指定されているメソッド
  {
    echo &quot;ありがとうございました。&quot;, &quot;\n&quot;;
  }

  public function selling($tanka, $kosu) //販売する⇒抽象クラスから継承しているメソッドを実行
  {
    $price = $tanka * $kosu;
    $this-&gt;sell($price);
  }

  public function getSelling() //売上合計を出す
  {
    echo &quot;売上合計は、{$this-&gt;sales}円です。&quot;;
  }
}
</code></pre>
        <div class="blank"></div>

        <h3>MyShopクラスのインスタンスを作って試す</h3>
        <pre class="re"><?php
                        require_once("MyShop.php");

                        $goods = new MyShop(); //インスタンスを作って試す
                        $goods->selling(3300, 3);
                        $goods->selling(600, 5);
                        $goods->getSelling();
                        ?></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;MyShop.php&quot;);

$goods = new MyShop(); //インスタンスを作って試す
$goods-&gt;selling(3300, 3);
$goods-&gt;selling(600, 5);
$goods-&gt;getSelling();
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