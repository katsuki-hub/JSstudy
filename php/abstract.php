<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクト指向の抽象クラス~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "オブジェクト指向~抽象クラス~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
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
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>