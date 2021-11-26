<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクトのクラスの継承~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "オブジェクト指向~クラスの継承~" ?>
    <?php require_once "../common/header.php"; ?>
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
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>