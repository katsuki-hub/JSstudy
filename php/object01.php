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
  <title>PHP編”オブジェクトのクラス定義”</title>
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
      <h1>オブジェクト指向~クラス定義~</h1>
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
          <li><a href="arrayfunction.php">配列の要素に関数</a></li>
          <li><a href="object.php">オブジェクト指向</a></li>
          <li><a href="object01.php">OOP~クラス定義</a></li>
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
      <li><a href="object.php">OOPクラス定義</a></li>
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

          public function hello() {
            if(is_null($this->name)) {
              echo "こんにちは！！","\n";
            } else {
              echo "こんにちは、{$this->name}です！","\n";
            }
          }
        }
        ?>
        <pre><?php
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
        <h3>ソースコード</h3>
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
</code></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
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
        </div>

        <h2>コンストラクタ</h2>
        <div class="frame3">
          インスタンスを作成する際に、初期値を引数で渡せるようにします。<br>使うのはコンストラクタです。インスタンスがつくられる際に自動的に呼ばれる特殊な関数です。<br>そこで、最初に実行したいことはコンストラクタに書いておきます。<br>※引数を省略した場合の初期値は、通常の関数の引数と同じように指定できます。
          <div class="frame2">
            function __construct(引数1,引数2,...) {<br>
              　//インスタンス作成時に最初に実行したい処理<br>
            }
          </div>
        </div>


      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>