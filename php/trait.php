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
  <title>PHP編”オブジェクト指向~トレイト~”</title>
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
      <h1>オブジェクト指向~トレイト~</h1>
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
          <li><a href="extends.php">OOP~クラス継承</a></li>
          <li><a href="trait.php">OOP~トレイト</a></li>
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
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>