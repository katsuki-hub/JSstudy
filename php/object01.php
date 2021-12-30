<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクトのクラス定義~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "オブジェクト指向~クラス定義~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="object01.php">OOPクラス定義</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向のクラス定義</h2>
        <div class="frame3">
          classキーワードで宣言します。基本的には定義できる内容はプロパティとメソッドです。<br>プロパティは変数と定数で定義しメソッドは関数で定義します<br>クラス名は慣例として大文字から始めます。<br>publicキーワードはアクセス権を示します。<br>publicを付けるとほかのクラスからもアクセスでき、メソッドのアクセス権は省略できます。省略するとpublicになります。
          <div class="frame2">
            class クラス名 {<br>
            　public const 定数名 = 値;<br>
            　public $変数名;<br><br>

            　public function メソッド名() {<br>
            　}<br>
            }
          </div>
          ※クラスのインスタンスはnew演算子で作ります。
        </div>

        <h3>frend クラスを定義する</h3>
        <?php
        class Frend
        {
          public $name;
          public $age;

          public function hello()
          {
            if (is_null($this->name)) {
              echo "こんにちは！！", "\n";
            } else {
              echo "こんにちは、{$this->name}です！", "\n";
            }
          }
        }
        ?>
        <pre class="re"><?php
                        $momo = new Frend(); //クラスのインスタンス
                        $ura = new Frend();

                        $momo->name = "桃太郎"; //プロパティの値を設定
                        $momo->age = 17;
                        $ura->name = "浦島太郎";
                        $ura->age = 25;

                        print_r($momo); //インスタンスを確認
                        print_r($ura);

                        $momo->hello(); //メソッドを実行
                        $ura->hello();
                        ?></pre>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
class Frend {
  public $name;
  public $age;

  public function hello() {
          if(is_null($this-&gt;name)) {
            echo &quot;こんにちは！！&quot;,&quot;\n&quot;;
          } else {
            echo &quot;こんにちは、{$this-&gt;name}です！&quot;,&quot;\n&quot;;
          }
        }
}
?&gt;

&lt;?php
$momo = new Frend(); //クラスのインスタンス
$ura = new Frend();

$momo-&gt;name = &quot;桃太郎&quot;; //プロパティの値を設定
$momo-&gt;age = 17;
$ura-&gt;name = &quot;浦島太郎&quot;;
$ura-&gt;age = 25;

print_r($momo); //インスタンスを確認
print_r($ura);

$momo-&gt;hello(); //メソッドを実行
$ura-&gt;hello();
?&gt;
</code></pre>

        <h4>インスタンス自身を指し示す $this</h4>
        <div class="frame3">
          プロパティ $name にアクセスするには、インスタンス自身を指し示す $this を使って【$this->name】のような記述が必要です。<br>ちなみに$nameには初期値が設定されていません。その値はnullです。<br>そこで、is_null()関数を使ってnullを判断し、値がnullの時は「こんにちは！！」を表示それ以外は「こんにちは、{name}です！」としています。
        </div><br>

        <h2>コンストラクタ</h2>
        <div class="frame3">
          インスタンスを作成する際に、初期値を引数で渡せるようにします。<br>使うのはコンストラクタです。インスタンスがつくられる際に自動的に呼ばれる特殊な関数です。<br>そこで、最初に実行したいことはコンストラクタに書いておきます。<br>※引数を省略した場合の初期値は、通常の関数の引数と同じように指定できます。
          <div class="frame2">
            function __construct(引数1,引数2,...) {<br>
            　//インスタンス作成時に最初に実行したい処理<br>
            }
          </div>
        </div>

        <h3>コンストラクタが定義してあるStaffクラス</h3>
        <?php
        class Staff //クラス定義
        {
          public $name;
          public $age;

          function __construct($name, $age)
          {
            $this->name = $name;
            $this->age = $age;
          }

          public function hello() //インスタンスメソッド
          {
            if (is_null($this->name)) {
              echo "こんにちは！", "\n";
            } else {
              echo "こんにちは、{$this->name}です！", "\n";
            }
          }
        }
        ?>

        <pre class="re"><?php
                        $housi = new Staff("一寸法師", 38); //クラスのインスタンスを作る
                        $hosi = new Staff("ひこ星", 19);

                        $housi->hello();
                        $hosi->hello();
                        ?></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
class Staff //クラス定義
{
  public $name;
  public $age;

  function __construct($name, $age)
  {
    $this-&gt;name = $name;
    $this-&gt;age = $age;
  }

  public function hello() //インスタンスメソッド
  {
    if (is_null($this-&gt;name)) {
      echo &quot;こんにちは！&quot;, &quot;\n&quot;;
    } else {
      echo &quot;こんにちは、{$this-&gt;name}です！&quot;, &quot;\n&quot;;
    }
  }
}
?&gt;

&lt;?php
$housi = new Staff(&quot;一寸法師&quot;, 38); //クラスのインスタンスを作る
$hosi = new Staff(&quot;ひこ星&quot;, 19);

$housi-&gt;hello();
$hosi-&gt;hello();
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>クラス定義ファイルを読み込む</h4>
        <div class="frame3">
          クラス定義ファイルを読み込んで利用するには、require_once()を使います。<br>読み込みはインスタンスを作るよりも前に読み込む必要があります。<br><br>※メソッドはinclude、include_once、require、require_onceがあります。_onceが付くものは同じファイルを繰り返し読まない仕様で、違いは読み込みエラーの対応です。<br>require_once()はfatalエラーとなり、処理が中断することから通常はこちらを使用する。
        </div><br>

        <h2>スタティックプロパティとスタティックメソッド</h2>
        <div class="frame3">
          インスタンスだけでなく、クラス自身のクラスプロパティとクラスメソッドを設定することが出来ます。<br>PHPではこれをstaticキーワードを利用して作るスタティックプロパティ（静的プロパティ）とスタティックメソッド（静的メソッド）で代替します。
          <div class="frame2">
            <b>スタティックプロパティとメソッドがあるクラス定義</b><br>
            class クラス名 {<br>
            public static const 定数名 = 値;<br>
            public static $変数名;<br><br>

            public static function メソッド名() {<br>
            　}<br>
            }
          </div>
          <b>クラスの中からクラスメンバーにアクセスする</b><br>
          クラス内で利用するには、self::を付けて「self::$変数名」あるいは「self::メソッド名()」のようにアクセスする。<br><br>
          <div class="frame1">
            <b>クラスメンバーとインスタンスメンバー</b><br>
            プロパティとメソッドを合わせてメンバーと呼ぶ。クラスとインスタンスでそれぞれ呼び方がある。
          </div>
        </div>

        <h4>アクセス修飾子</h4>
        <table border="12">
          <tr bgcolor=yellow>
            <th>修飾子</th>
            <th>アクセス権</th>
          </tr>
          <tr>
            <td>public</td>
            <td>どこからでもアクセスが可能</td>
          </tr>
          <tr>
            <td>protected</td>
            <td>定義したクラスと子クラスからアクセス可能</td>
          </tr>
          <tr>
            <td>private</td>
            <td>定義したクラス内のみでアクセスが可能</td>
          </tr>
        </table><br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>