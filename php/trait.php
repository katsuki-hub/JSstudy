<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクト指向トレイト~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "オブジェクト指向~トレイト~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="trait.php">OOPトレイト</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向~トレイト~</h2>
        <div class="frame3">
          <p>クラス継承では親クラスを1個しか指定できませんが、トレイトでは複数のトレイトを指定してコードを活用できる。</p>
          <div class="frame2">
            <b>トレイトの定義</b><br>
            trait トレイト名 {<br>
            　//トレイトのプロパティ<br>
            　//トレイトのメソッド<br>
            }
          </div>
          <div class="frame2">
            <b>親クラスを指定したトレイトの定義</b><br>
            trait トレイト名 extends 親クラス {<br>
            　//トレイトのプロパティ<br>
            　//トレイトのメソッド<br>
            }
          </div>
        </div>
        <h3>2つの関数があるDateトレイト</h3>
        <button type="button">Date.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
trait Date
{
  public function ymdString($date)
  { //DateTimeを年月日の書式で返す
    $dateString = $date-&gt;format(&#039;y年m月d日&#039;);
    return $dateString;
  }
  public function addymdString($date, $days)
  { //指定日数後の年月日で返す
    $date-&gt;add(new DateInterval(&quot;P{$days}D&quot;));
    return $this-&gt;ymdString($date);
  }
}
</code></pre><br>

        <h4>トレイトの使い方</h4>
        <div class="frame3">
          <p>トレイトを利用するには、useキーワードを指定します。同時に振K数のトレイトを指定して利用できます。</p>
          <div class="frame2">
            class クラス名 {<br>
            　use トレイト名 , トレイト名 , ...;<br>
            　//クラスのコード<br>
            }
          </div>
        </div>
        <h3>トレイトを利用したDeliveryDateクラス</h3>
        <button type="button">DeliveryDate.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Date.php&quot;);

class DeliveryDate
{
  use Date;
  public $theDate;
  public $limitDate;

  function __construct()
  {
    $now = new DateTime(); //今日の日付
    $this-&gt;theDate = $this-&gt;ymdString($now); //年月日の書式へ
    $this-&gt;limitDate = $this-&gt;addymdString($now, 20); //20日後の日付
  }
}
?&gt;
</code></pre><br>

        <h3>DeliveryDateクラスのインスタンスを使って2つのプロパティを出す</h3>
        <pre class="re"><?php
                        require_once("DeliveryDate.php");

                        $work = new DeliveryDate();
                        echo "受注した日：" . $work->theDate . "\n";
                        echo "納入期限日：" . $work->limitDate;
                        ?></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;DeliveryDate.php&quot;);

$work = new DeliveryDate();
echo &quot;受注した日：&quot; . $work-&gt;theDate . &quot;\n&quot;;
echo &quot;納入期限日：&quot; . $work-&gt;limitDate;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>メソッドの衝突を解決する</h2>
        <div class="frame3">
          <p>複数のトレイトを使うと同じ名前でメソッドが定義されていることがあります。<br>トレイトのメソッド指定方法を解説</p>
        </div>
        <h3>2つのトレイトの同名メソッドhello()</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
trait Momotaro
{
  public function hello()
  {
    echo &quot;こんにちは！桃太郎だよ！&quot;;
  }

  public function weekday()
  {
    $week = [&quot;日&quot;, &quot;月&quot;, &quot;火&quot;, &quot;水&quot;, &quot;木&quot;, &quot;金&quot;, &quot;土&quot;,];
    $now = new DateTime();
    $w = (int)$now-&gt;format(&quot;w&quot;);
    $weekday = $week[$w];
    echo &quot;今日は&quot; . $weekday . &quot;曜日です。&quot;;
  }
}
</code></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
trait Orihime
{
  public function hello()
  {
    echo &quot;こんにちは！織姫です。本日も1日頑張ろう！&quot;;
  }
}
</code></pre><br><br>

        <h4>insteadofキーワードとasキーワード</h4>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Momotaro.php&quot;);
require_once(&quot;Orihime.php&quot;);

class Instead
{
  use Momotaro, Orihime {
    Momotaro::hello as Momohello;
    Orihime::hello insteadof Momotaro;
  }
}
</code></pre>
        <div class="frame3">
          <p><b>insteadofキーワード</b><br>「Bの代わりにA」という用途で使用します。</p>

          <div class="frame2">
            use トレイト名 , トレイト名 ,... {<br>
            　Aトレイト::メソッド名　insteadof Bトレイト;<br>
            }
          </div>
          <p><b>asキーワード</b><br>メソッドに別名を付ける用途で使用します。</p>
          <div class="frame2">
            use トレイト名 , トレイト名 ,... {<br>
            　　トレイト名::メソッド名　as 別のメソッド名;<br>
            }
          </div>
        </div>

        <h3>helloメソッドの実行結果</h3>
        <pre class="re"><?php
                        require_once("Instead.php");

                        $myhello = new Instead();
                        $myhello->hello();
                        echo "\n";
                        $myhello->weekday();
                        ?></pre>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Instead.php&quot;);

$myhello = new Instead();
$myhello-&gt;hello();
echo &quot;\n&quot;;
$myhello-&gt;weekday();
?&gt;
</code></pre><br>

        <h3>別名呼び出しの実行結果</h3>
        <pre class="re"><?php
                        require_once("Instead.php");

                        $myhello = new Instead();
                        $myhello->hello(); //hello()を読んだとき
                        echo "\n";
                        $myhello->Momohello(); //別名付けた呼び出し
                        ?></pre>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;Instead.php&quot;);

$myhello = new Instead();
$myhello-&gt;hello(); //hello()を読んだとき
echo &quot;\n&quot;;
$myhello-&gt;Momohello(); //別名付けた呼び出し
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