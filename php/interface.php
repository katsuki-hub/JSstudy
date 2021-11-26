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
  <title>PHP編”オブジェクト指向~インターフェース~”</title>
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
      <h1>オブジェクト指向~インターフェース~</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="interface.php">OOPインターフェース</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向~インターフェース~</h2>
        <p>インターフェースはクラスで実装すべきメソッドを規格として定めるものです。<br>インターフェースでは定められているメソッドを必ず実装しなければなりません。</p><br>
        <div class="frame3">
          <p><b>インターフェースを定義する</b><br>
            インターフェースではメソッドと定数を定義できます。<br>メソッドは名前と引数の形式だけを定義し、機能の実装は行いません。<br>アクセス権はpublicのみが設定可能です。<br>※指定を省略すると初期値のpublicが適用されるので指定する必要はありません。
          </p>
          <div class="frame2">
            <b>インターフェースの定義</b><br>
            interface インターフェース名 {<br>
            　const 定数 = 値 ;<br>
            　function 関数名(引数,引数,...);<br>
            }
          </div>
          <div class="frame2">
            <b>他のインターフェースを継承したインターフェース</b><br>
            interface 子インターフェース名 extends 親インターフェース名 {<br>
            　const 定数 = 値 ;<br>
            　function 関数名(引数,引数,...);<br>
            }
          </div>
        </div>
        <br><br>
        <div class="frame3">
          <p><b>インターフェースを採用する</b><br>
            インターフェースを採用するクラスでは、implementsでインターネットを指定します。継承と違って複数のインターフェースを採用出来ます。</p>
          <div class="frame2">
            <b>インターフェースを採用するクラス</b><br>
            class クラス名 implements インターフェース名,インターフェース名,...{<br>
            　//クラスのコード<br>
            }
          </div>
          <div class="frame2">
            <b>インターフェースを採用するクラスに親クラスがある場合</b><br>
            class クラス名 extends 親クラス名 implements インターフェース名,インターフェース名,...{<br>
            　//クラスのコード<br>
            }
          </div>
        </div>
        <div class="blank"></div>

        <h2>Gameインターフェースの作成</h2>
        <h3>Gameのインターフェース</h3>
        <button type="button">Game.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
interface Game
{
  function newGame($point); //引数が1個ある
  function play();
  function isAlive(): bool;
}
//論理値（bool、boolean）とは、真か偽かを表す変数の型のことです。真の場合は「true」、偽の場合は「false」の値をそれぞれ持ちます
</code></pre>

        <p>インターフェースの指示はnewGame()の、持ち点の$pointで新しいゲームの開始、play()でゲームの実行、isAlive()でゲーム結果が分かるようにtrue/falceで返す3つです。</p><br><br>


        <h3>Gameインターフェースを採用したHpGameクラス</h3>
        <button type="button">HpGame.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Game.php&quot;);

class HpGame implements Game
{
  public $hitPoint;

  function __construct($point = 50)
  {
    $this-&gt;newGame($point); //インスタンスの作成と同時にゲーム開始
  }


  /*インターフェース指定メソッド*/

  public function newGame($point = 50) //ニューゲーム
  {
    $this-&gt;hitPoint = $point;
  }

  public function play() //ゲーム開始
  {
    $num = random_int(0, 50);
    if ($num % 2 == 0) { //割り切れる偶数値
      echo &quot;{$num}ポイント回復した&quot;, &quot;\n&quot;;
      $this-&gt;hitPoint += $num;
    } else {
      echo &quot;{$num}ポイント消費した！！！&quot;, &quot;\n&quot;;
      $this-&gt;hitPoint -= $num;
    }
    echo &quot;&lt;b&gt;&quot;;
    echo &quot;現在のHP{$this-&gt;hitPoint}ポイント&quot;, &quot;\n&quot;;
    echo &quot;&lt;/b&gt;&quot;;
  }

  public function isAlive(): bool //勝敗のチェック
  {
    return ($this-&gt;hitPoint &gt; 0);
  }
}
</code></pre>

        <p>Gameインターフェースの指定に基づいて、newGame()、play()、isAlive()の3つのメソッドを実装しています。<br>内容は0~50の乱数$numを作り、偶数なら$hitPointに加算、奇数なら減算しています。そして、isAlive()で現在のポイントの$hitPointが0より多ければtrue、0以下はfalceを返す</p><br><br>


        <h3>ゲームの実行結果</h3>
        <pre class="re"><?php
                        require_once("HpGame.php");

                        $player = new HpGame();
                        for ($i = 0; $i < 10; $i++) { //10回プレイ
                          $player->play();
                          if (!$player->isAlive()) { //falseになったらbreakする
                            break;
                          }
                        }
                        echo "ゲーム終了", "\n";
                        ?></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;HpGame.php&quot;);

$player = new HpGame();
for ($i = 0; $i &lt; 10; $i++) { //10回プレイ
  $player-&gt;play();
  if (!$player-&gt;isAlive()) { //falseになったらbreakする
    break;
  }
}
echo &quot;ゲーム終了&quot;, &quot;\n&quot;;
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