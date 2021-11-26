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
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="extends.php">OOPクラス継承</a></li>
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

        <h3>親クラスproduct.php</h3>
        <button type="button">product.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
class Product
{
  private $name;

  public function getName()
  {
    return $this-&gt;name;
  }

  public function setName($name)
  {
    $this-&gt;name = $name;
  }
}
</code></pre>

        <h3>子クラスのインスタンスを使う</h3>
        <pre class="re"><?php
                        require_once("product.php");

                        class DeskProduct extends Product
                        {
                          private $price;

                          public function getPrice()
                          {
                            return $this->price;
                          }

                          public function setPrice($price)
                          {
                            $this->price = $price;
                          }
                        }

                        $desk = new DeskProduct();
                        $desk->setName("ボールペン");
                        $desk->setPrice(500);

                        echo $desk->getName() . "の金額は" . $desk->getPrice() . "円です";
                        ?></pre>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;product.php&quot;);

class DeskProduct extends Product
{
  private $price;

  public function getPrice()
  {
    return $this-&gt;price;
  }

  public function setPrice($price)
  {
    $this-&gt;price = $price;
  }
}

$desk = new DeskProduct();
$desk-&gt;setName(&quot;ボールペン&quot;);
$desk-&gt;setPrice(500);

echo $desk-&gt;getName() . &quot;の金額は&quot; . $desk-&gt;getPrice() . &quot;円です&quot;;
</code></pre>
        <div class="blank"></div>

        <h4>子クラスのコンストラクタから親クラスのコンストラクタを呼び出す</h4>
        <div class="frame3">
          子クラスのコンストラクタから親のコンストラクタを<b>parent::__construct($name)</b>のように呼び出して値を渡す。これで親クラスの初期値が設定されて、子クラスも初期化できる。
        </div>

        <h4>親クラスのメソッドをオーバーライドして書き替える</h4>
        <div class="frame3">
          親クラスのメソッドをそのまま使わず、子クラスで同じ名前のメソッドを定義することで、親クラスの同名のメソッドを上書きすることができる。この手法をオーバーライドと呼びます。
        </div><br>

        <div style="border: 3px double #333333;">
        <b>　継承の禁止、オーバーライドの禁止</b><br>
        final class~のようにクラス定義にfinalキーワードを付けることで継承されないように制限できます。<br>同様にfinal function~のようにメソッド定義にfinalキーワードを付けると、子クラスからオーバーライドを禁止できます。 
        </div><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php include(dirname(__FILE__) . '/../commom/footer.php'); ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>