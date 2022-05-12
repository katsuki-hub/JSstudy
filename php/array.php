<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~配列~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "配列" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="array.php">配列</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列を作る</h2>
        <div class="frame1">
          []に値だけ入っているのが、インデックス配列<br>
          キーと値がペアになっているのが連想配列
          <div class="frame3">
            <b>インデックス配列</b><br>
            $myArray = [値1,値2,値3,...]
          </div>
        </div>
        <h3>配列から値を取り出す＆値の変更＆for文を利用</h3>
        <?php
        $teamA = ["桃太郎", "金太郎", "一寸法師", "赤鬼"];
        $teamA[3] = "織姫";
        echo $teamA[0], "さん\n";
        echo $teamA[1], "さん\n";
        echo $teamA[2], "さん\n";
        echo $teamA[3], "さん\n <br>";

        for ($i = 0; $i < count($teamA); $i++) {
          echo $teamA[$i], "さん\n";
        }
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$teamA = [&quot;桃太郎&quot;, &quot;金太郎&quot;, &quot;一寸法師&quot;, &quot;赤鬼&quot;];
$teamA[3] = &quot;織姫&quot;;
echo $teamA[0], &quot;さん\n&quot;;
echo $teamA[1], &quot;さん\n&quot;;
echo $teamA[2], &quot;さん\n&quot;;
echo $teamA[3], &quot;さん\n &lt;br&gt;&quot;;

for ($i = 0; $i &lt; count($teamA); $i++) {
  echo $teamA[$i],&quot;さん\n&quot;;
}
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>array()でインデックス配列を作る</h2>
        <div class="frame3">
          <div class="frame2">
            $myArray = array(値1,値2,値3,...);
          </div>
          ※この配列で出力をするには、print_r()またはvar_dump()を使います。echo()では、配列を出力できません。print_r()で出力すると[0] => 値
          のようにインデックス番号とその値がペアで表示されます。
        </div>
        <?php
        $colors = array("赤", "黄", "青");
        print_r($colors);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$colors = array(&quot;赤&quot;,&quot;黄&quot;,&quot;青&quot;);
print_r($colors);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列に値を追加する</h2>
        <div class="frame3">
          からの配列を作ります。配列は[]かarray()で作ることが可能。値の追加は、array_push(配列,値)のように実行するか、インデックス番号を指定せずに値を代入します。
        </div>
        <h3>空の配列を追加と番号指定</h3>
        <?php
        $colors = [];

        $colors[] = "赤";
        $colors[] = "青";
        $colors[3] = "黄";
        $colors[] = "白";
        print_r($colors);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$colors = [];

$colors[] = &quot;赤&quot;;
$colors[] = &quot;青&quot;;
$colors[3] = &quot;黄&quot;;
$colors[] = &quot;白&quot;;
print_r($colors);
?&gt;
</code></pre>
        <div class="blank"></div>

        <div class="frame3">
          <b>連想配列</b>
          <div class="frame2">
            $myArray = [キー1 => 値1,キー2 => 値2,キー3 => 値3,...]
          </div>
          連想配列もインデックス配列と同様に、array()で作成可<br><br>
          インデックス配列をprint_r()で出力すると連想配列と形式が共通している。インデックス配列はキーが0,1,2...と連番がつけられた連想配列だと言える。ただし、値をソートしたり削除・挿入すると、インデックス番号は自動的に付け直されてしまいます。キーと値がペアになっていないことに注意が必要です。
        </div>
        <h3>連想配列の作成＆キーで指定した値を取り出す</h3>
        <?php
        $fhon = [
          "id" => "Pixel",
          "type" => "pro",
          "price" => "65000"
        ];
        print_r($fhon);
        echo "\n <br>";
        //キーで指定した値を取り出す
        echo "id:" . $fhon["id"] . "\n <br>";
        echo "タイプ:" . $fhon["type"] . "\n <br>";
        echo "価格:" . number_format($fhon["price"]) . "円\n <br>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$fhon = [
  &quot;id&quot; =&gt; &quot;Pixel&quot;,
  &quot;type&quot; =&gt; &quot;pro&quot;,
  &quot;price&quot; =&gt; &quot;65000&quot;
];
print_r($fhon);
//キーで指定した値を取り出す
echo &quot;id:&quot; . $fhon[&quot;id&quot;] . &quot;\n &lt;br&gt;&quot;;
echo &quot;タイプ:&quot; . $fhon[&quot;type&quot;] . &quot;\n &lt;br&gt;&quot;;
echo &quot;価格:&quot; . number_format($fhon[&quot;price&quot;]) . &quot;円\n &lt;br&gt;&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>空の連想配列に要素を追加していく</h3>
        <?php
        $user = [];
        $user["name"] = "城山桃太郎";
        $user["kana"] = "シロヤマモモタロウ";
        $user["age"] = "25";
        print_r($user);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$user = [];
$user[&quot;name&quot;] = &quot;城山桃太郎&quot;;
$user[&quot;kana&quot;] = &quot;シロヤマモモタロウ&quot;;
$user[&quot;age&quot;] = &quot;25&quot;;
print_r($user);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>文字列から配列＆配列から文字列を作る</h2>
        <div class="frame3">
          カンマや改行などで区切られた文字列から配列を作ることが出来ます。使うのはexplode()です。第1引数に区切り文字、第2引数に文字列、第3引数で最大個数を指定できる。<br>
          逆にimplode()は配列の値を連結して1つの文字列にします。
        </div>
        <h3>カンマで区切った名前リストから配列を作る</h3>
        <?php
        $data = "桃太郎,金太郎,一寸法師,赤鬼";
        $delimiter = ",";
        $nameList = explode($delimiter, $data);
        print_r($nameList);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = &quot;桃太郎,金太郎,一寸法師,赤鬼&quot;;
$delimiter = &quot;,&quot;;
$nameList = explode($delimiter, $data);
print_r($nameList);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>配列から文字列の名前リストを作る</h3>
        <?php
        $data = ["桃太郎", "金太郎", "一寸法師", "赤鬼"];
        $glue = "さん、";
        $nameList = implode($glue, $data);
        $nameList .= "さん";
        print_r($nameList);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [&quot;桃太郎&quot;, &quot;金太郎&quot;, &quot;一寸法師&quot;, &quot;赤鬼&quot;];
$glue = &quot;さん、&quot;;
$nameList = implode($glue, $data);
$nameList .= &quot;さん&quot;;
print_r($nameList);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>配列を定数にする</h3>
        <?php
        define("RANK", ["松", "竹", "梅"]);
        echo RANK[2];
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
define(&quot;RANK&quot;,[&quot;松&quot;,&quot;竹&quot;,&quot;梅&quot;]);
echo RANK[2];
?&gt;
</code></pre>
        <div class="blank"></div>


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