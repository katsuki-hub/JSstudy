<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~配列の比較・検索~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "配列の比較・検索" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="arraysearch.php">配列の比較と検索</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列の値を検索する</h2>
        <div class="frame3">
          配列の検索で簡単なのは in_array()を使った検索です。配列に探している値があるかチェックし、見つかればtrue、見つからなければfalceを返します。
          <div class="frame2">
            <b>配列に値があるかどうかをチェック</b><br>
            $isIn = in_array($value,$array);
          </div>
          配列$arrayに$valueが見つかれば、$isInにtrueが代入されます。インデックス配列、連想配列のどちらの値でも検索可能
        </div>
        <h3>値を自然順位並べて検索して表示</h3>
        <?php
        $numlist = [4108, 4350, 4488, 4691];
        $numbers = [4426, 4350, 4444, 4488, 4424];

        function checkNumber($no)
        {
          global $numbers;
          if (in_array($no, $numbers)) {
            echo "{$no}番は合格です";
          } else {
            echo "{$no}は見つかりません";
          }
        }
        echo "<ol>\n";
        foreach ($numlist as $value) {
          echo "<li>", checkNumber($value), "</li>\n";
        }
        echo "</ol>\n";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$numlist = [4108, 4350, 4488, 4691];
$numbers = [4426, 4350, 4444, 4488, 4424];

function checkNumber($no) {
  global $numbers;
  if(in_array($no,$numbers)) {
    echo &quot;{$no}番は合格です&quot;;
  } else {
    echo &quot;{$no}は見つかりません&quot;;
  }
}
echo &quot;&lt;ol&gt;\n&quot;;
foreach ($numlist as $value) {
  echo &quot;&lt;li&gt;&quot;,checkNumber($value),&quot;&lt;/li&gt;\n&quot;;
}
echo &quot;&lt;/ol&gt;\n&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h3>文字列の配列を検索（完全一致検索）</h3>
        <?php
        $nameList = ["桃太郎", "浦島太郎", "一寸法師"];

        function namecheck($name)
        {
          global $nameList;
          if (in_array($name, $nameList)) {
            echo "{$name}は仲間です";
          } else {
            echo "{$name}は仲間ではありません";
          }
        }

        echo namecheck("桃太郎"), "\n <br>";
        echo namecheck("赤鬼"), "\n <br>";
        echo namecheck("浦島太郎"), "\n <br>";
        echo namecheck("一寸法師"), "\n <br>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$nameList = [&quot;桃太郎&quot;,&quot;浦島太郎&quot;,&quot;一寸法師&quot;];

function namecheck ($name) {
  global $nameList;
  if (in_array($name,$nameList)) {
    echo &quot;{$name}は仲間です&quot;;
  } else {
    echo &quot;{$name}は仲間ではありません&quot;;
  }
}

echo namecheck(&quot;桃太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;赤鬼&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;浦島太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo namecheck(&quot;一寸法師&quot;),&quot;\n &lt;br&gt;&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>新規の値だけを追加する</h4>
        <div class="frame3">
          新規の値だけを配列に追加する関数 array_addUnique()をin_array()を利用して作成。第1引数で元の配列、第2引数で追加する値を渡します。<br>追加する値がin_array()でチェックし存在するならfalceを渡し、存在しなければ値を追加してtrueを返します。第1引数には&をつけて&$arrayとして参照渡しをしているので、引数で渡した配列を直接操作しています。
        </div>

        <h3>配列に新規の値だけを追加</h3>
        <?php
        function array_addUnique(&$array, $value)
        {
          if (in_array($value, $array)) {
            return false;
          } else {
            $array[] = $value; //値が含まれていなかった時に値を追加
            return true;
          }
        }

        $myList = ["キビ団子", "剣",];
        array_addUnique($myList, "金棒");
        array_addUnique($myList, "草履");
        array_addUnique($myList, "盾");
        print_r($myList);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function array_addUnique(&amp;$array, $value)
{
  if (in_array($value, $array)) {
    return false;
  } else {
    $array[] = $value; //値が含まれていなかった時に値を追加
    return true;
  }
}

$myList = [&quot;キビ団子&quot;, &quot;剣&quot;,];
array_addUnique($myList, &quot;金棒&quot;);
array_addUnique($myList, &quot;草履&quot;);
array_addUnique($myList, &quot;盾&quot;);
print_r($myList);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>値が見つかった位置、キーを返す</h2>
        <div class="frame3">
          array_search()は見つかった値のキーを返します。<br>インデックス配列の場合は値のインデックス番号がキーとして戻ります。複数の値が一致する場合は一番最初に見つかった値のキーを返します。見つからない場合はfalseが返る。
        </div>

        <h3>見つかったキーで別の配列から値を取り出す</h3>
        <?php
        $nameList = ["m01" => "桃太郎", "m02" => "浦島太郎", "w01" => "織姫", "w02" => "月姫"];
        $ageList = ["m01" => 16, "m02" => 55, "w01" => 20, "w02" => 25];

        function getAge($name)
        {
          global $nameList;
          global $ageList;
          $key = array_search($name, $nameList);
          if ($key !== false) { // !== 値または型が等しくない
            $age = $ageList[$key];
            echo "{$name}さんは{$age}歳です。";
          } else {
            echo "「{$name}」はメンバーではない。";
          }
        }
        echo getAge("桃太郎"), "\n <br>";
        echo getAge("浦島太郎"), "\n <br>";
        echo getAge("織姫"), "\n <br>";
        echo getAge("赤鬼"), "\n <br>";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$nameList = [&quot;m01&quot; =&gt; &quot;桃太郎&quot;, &quot;m02&quot; =&gt; &quot;浦島太郎&quot;, &quot;w01&quot; =&gt; &quot;織姫&quot;, &quot;w02&quot; =&gt; &quot;月姫&quot;];
$ageList = [&quot;m01&quot; =&gt; 16, &quot;m02&quot; =&gt; 55, &quot;w01&quot; =&gt; 20, &quot;w02&quot; =&gt; 25];

function getAge($name)
{
  global $nameList;
  global $ageList;
  $key = array_search($name, $nameList);
  if ($key !== false) { // !== 値または型が等しくない
    $age = $ageList[$key];
    echo &quot;{$name}さんは{$age}歳です。&quot;;
  } else {
    echo &quot;「{$name}」はメンバーではない。&quot;;
  }
}
echo getAge(&quot;桃太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo getAge(&quot;浦島太郎&quot;),&quot;\n &lt;br&gt;&quot;;
echo getAge(&quot;織姫&quot;),&quot;\n &lt;br&gt;&quot;;
echo getAge(&quot;赤鬼&quot;),&quot;\n &lt;br&gt;&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列を比較して一致しない値を見つける</h2>
        <div class="frame3">
          array_diff()を使うことで、配列Aと配列Bを比較して配列Aの中から配列Bにはない値を見つけ出すことができます。
        </div>
        <h3>aとｂのどちらにもない値を取り出す</h3>
        <?php
        $checkID = ["a11", "b22", "c33", "d44"];
        $aList = ["b22", "c15", "a12", "d55"];
        $bList = ["a8", "c22", "c55", "d44"];

        $diffID = array_diff($checkID, $aList, $bList);
        foreach ($diffID as $value) {
          echo "{$value}は新規です。\n <br>";
        }
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$checkID = [&quot;a11&quot;, &quot;b22&quot;, &quot;c33&quot;, &quot;d44&quot;];
$aList = [&quot;b22&quot;, &quot;c15&quot;, &quot;a12&quot;, &quot;d55&quot;];
$bList = [&quot;a8&quot;, &quot;c22&quot;, &quot;c55&quot;, &quot;d44&quot;];

$diffID = array_diff($checkID, $aList, $bList);
foreach ($diffID as $value) {
  echo &quot;{$value}は新規です。\n &lt;br&gt;&quot;;
}
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列の値を検索置換する</h2>
        <div class="frame3">
          <a href="search.php">「文字列の検索」</a>でstr_replace(),str_ireplace()を使って文字列を置換したが、配列の検索置換も行えます。検索できるのはインデックス配列の値のみで、連想配列の値を検索したい場合はpreg_replace()を使う。
        </div>
        <h3>配列の値を検索置換して表示する</h3>
        <?php
        $data = ["ミネラルウォーター", "SSD250G", "HDD500G"];
        $seach = ["ミネラル", "SSD", "HDD"];
        $replacement = ["飲み水", "ソリッド・ステート・ドライブ", "ハード・ディスク・ドライブ"];
        $result = str_replace($seach, $replacement, $data);
        echo "社内備品：\n <br>";
        echo $result[0], "、", $result[1], "、", $result[2];
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [&quot;ミネラルウォーター&quot;, &quot;SSD250G&quot;, &quot;HDD500G&quot;];
$seach = [&quot;ミネラル&quot;, &quot;SSD&quot;, &quot;HDD&quot;];
$replacement = [&quot;飲み水&quot;, &quot;ソリッド・ステート・ドライブ&quot;, &quot;ハード・ディスク・ドライブ&quot;];
$result = str_replace($seach, $replacement, $data);
echo &quot;社内備品：\n &lt;br&gt;&quot;;
echo $result[0], &quot;、&quot;, $result[1], &quot;、&quot;, $result[2];
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>正規表現を使って配列を検索する(部分一致検索)</h2>
        <div class="frame3">
          preg_grep()は正規表現を使って配列を検索しましたが、配列の検索も可能です。文字列の部分一致、大文字小文字を区別せずに検索、マッチした複数の値を取り出すといったことが可能になる。<br>preg_grep()の第3引数にPREG_GREP_INVERTを指定すると、マッチしなかった値を配列として取り出すことができます。
        </div>
        <h3>配列から「太郎」の付く名前を取り出す</h3>
        <?php
        $nameList = ["桃太郎", "一寸法師", "浦島太郎", "赤鬼", "金太郎"];
        $pattern = "/太郎/";
        $result = preg_grep($pattern, $nameList);
        $noresult = preg_grep($pattern, $nameList, PREG_GREP_INVERT);
        echo "<b>該当者</b>" . count($result) . "件\n <br>";
        foreach ($result as $value) {
          echo $value, "\n <br>";
        }
        echo "<b>該当しない</b>" . count($noresult) . "件\n <br>";
        foreach ($noresult as $value) {
          echo $value, "\n <br>";
        }
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$nameList = [&quot;桃太郎&quot;, &quot;一寸法師&quot;, &quot;浦島太郎&quot;, &quot;赤鬼&quot;, &quot;金太郎&quot;];
$pattern = &quot;/太郎/&quot;;
$result = preg_grep($pattern, $nameList);
$noresult = preg_grep($pattern, $nameList, PREG_GREP_INVERT);
echo &quot;&lt;b&gt;該当者&lt;/b&gt;&quot; . count($result) . &quot;件\n &lt;br&gt;&quot;;
foreach ($result as $value) {
  echo $value, &quot;\n &lt;br&gt;&quot;;
}
echo &quot;&lt;b&gt;該当しない&lt;/b&gt;&quot; . count($noresult) . &quot;件\n &lt;br&gt;&quot;;
foreach ($noresult as $value) {
  echo $value, &quot;\n &lt;br&gt;&quot;;
}
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>配列の値を正規表現で検索置換する</h2>
        <div class="frame3">
          preg_replace()も配列の値を正規表現で置換可能。<br>※配列の値は書き換えではなく新しい配列を返す！！<br>先程のstr_replace()と違って、連想配列の値を検索できます。
        </div>
        <h3>電話番号の末尾4桁を伏字にして表示する</h3>
        <?php
        $data = [];
        $data[] = ["name" => "桃太郎", "age" => 18, "phone" => "080-8888-8888"];
        $data[] = ["name" => "一寸法師", "age" => 32, "phone" => "090-1919-1919"];
        $data[] = ["name" => "浦島太郎", "age" => 40, "phone" => "092-333-4444"];
        $data[] = ["name" => "赤鬼", "age" => 55, "phone" => "0120-888-8888"];
        $pattern = "/(-)\d{4}$/";
        $replacement = "$1****";
        foreach ($data as $user) {
          $result = preg_replace($pattern, $replacement, $user); //番号末尾4桁伏せ字
          foreach ($result as $key => $value) {
            echo "{$key}：", $value, "\n <br>";
          }
        }
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [];
$data[] = [&quot;name&quot; =&gt; &quot;桃太郎&quot;, &quot;age&quot; =&gt; 18, &quot;phone&quot; =&gt; &quot;080-8888-8888&quot;];
$data[] = [&quot;name&quot; =&gt; &quot;一寸法師&quot;, &quot;age&quot; =&gt; 32, &quot;phone&quot; =&gt; &quot;090-1919-1919&quot;];
$data[] = [&quot;name&quot; =&gt; &quot;浦島太郎&quot;, &quot;age&quot; =&gt; 40, &quot;phone&quot; =&gt; &quot;092-333-4444&quot;];
$data[] = [&quot;name&quot; =&gt; &quot;赤鬼&quot;, &quot;age&quot; =&gt; 55, &quot;phone&quot; =&gt; &quot;0120-888-8888&quot;];
$pattern = &quot;/(-)\d{4}$/&quot;;
$replacement = &quot;$1****&quot;;
foreach ($data as $user) {
  $result = preg_replace($pattern, $replacement, $user); //番号末尾4桁伏せ字
  foreach ($result as $key =&gt; $value) {
    echo &quot;{$key}：&quot;, $value, &quot;\n &lt;br&gt;&quot;;
  }
}
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