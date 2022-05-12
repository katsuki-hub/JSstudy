<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクト指向インターフェース~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "オブジェクト指向~インターフェース~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
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

        <p>インターフェースの指示はnewGame()の、持ち点の$pointで新しいゲームの開始、play()でゲームの実行、isAlive()でゲーム結果が分かるようにtrue/falceで返す3つです。</p>
        <br><br>


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

        <p>
          Gameインターフェースの指定に基づいて、newGame()、play()、isAlive()の3つのメソッドを実装しています。<br>内容は0~50の乱数$numを作り、偶数なら$hitPointに加算、奇数なら減算しています。そして、isAlive()で現在のポイントの$hitPointが0より多ければtrue、0以下はfalceを返す
        </p><br><br>


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
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>