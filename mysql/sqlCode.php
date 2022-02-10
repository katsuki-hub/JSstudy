<?php
$para = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;../common/es.php&quot;); //PHPのフォーム~入力データのチェック~で参照してね
$user = &#039;****&#039;;
$passwoed = &#039;****&#039;;
$dbName = &#039;kyotei&#039;;
$host = &#039;localhost:8888&#039;;
$dsn = &quot;mysql:host={$host};dbname={$dbName};charset=utf8&quot;;
?&gt;

&lt;!doctype html&gt;
&lt;html lang=&quot;ja&quot;&gt;
・・・・↓↓
</code></pre>';

$classic = '<pre><code class="prettyprint">&lt;?php
//MySQLデータベースに接続する
try {
  $pdo = new PDO($dsn, $user, $passwoed);
  //プリペアドステートメントのエミュレーションを無効にする
  $pdo-&gt;setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  //例外がスローされる設定にする
  $pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo &quot;データベース{$dbName}に接続しました。&quot;, &quot;&lt;br&gt;&quot;;
  $sql = &quot;SELECT * FROM classic2022&quot;; //SQL文を作る
  $stm = $pdo-&gt;prepare($sql); //プリペアドステートメントを作る
  $stm-&gt;execute(); //SQL文を実行
  $result = $stm-&gt;fetchAll(PDO::FETCH_ASSOC); //結果の取得(連想配列で受け取る)

  echo &quot;&lt;table border=1&gt;&quot;;
  echo &quot;&lt;tr&gt;&quot;;
  echo &quot;&lt;th&gt;&quot;, &quot;登録番号&quot;, &quot;&lt;/th&gt;&quot;;
  echo &quot;&lt;th&gt;&quot;, &quot;選手名&quot;, &quot;&lt;/th&gt;&quot;;
  echo &quot;&lt;th&gt;&quot;, &quot;登録期&quot;, &quot;&lt;/th&gt;&quot;;
  echo &quot;&lt;th&gt;&quot;, &quot;支部&quot;, &quot;&lt;/th&gt;&quot;;
  echo &quot;&lt;/tr&gt;&quot;;

  foreach ($result as $row) {
    echo &quot;&lt;tr&gt;&quot;;
    echo &quot;&lt;td&gt;&quot;, es($row[&#039;number&#039;]), &quot;&lt;/td&gt;&quot;;
    echo &quot;&lt;td&gt;&quot;, es($row[&#039;name&#039;]), &quot;&lt;/td&gt;&quot;;
    echo &quot;&lt;td&gt;&quot;, es($row[&#039;reg&#039;]), &quot;&lt;/td&gt;&quot;;
    echo &quot;&lt;td&gt;&quot;, es($row[&#039;branch&#039;]), &quot;&lt;/td&gt;&quot;;
    echo &quot;&lt;/tr&gt;&quot;;
  }
  echo &quot;&lt;/table&gt;&quot;;
} catch (Exception $e) { //接続失敗で例外処理実行
  echo &#039;&lt;span class=&quot;error&quot;&gt;エラーがありました&lt;/span&gt;&lt;br&gt;&#039;;
  echo $e-&gt;getMessage();
  exit();
}
?&gt;
</code></pre>';

$bra = '<pre><code class="prettyprint">$sql = &quot;SELECT * FROM classic2022 WHERE number &gt;= 3800 AND branch = &#039;愛知&#039;&quot;; //SQL文を作る
$stm = $pdo-&gt;prepare($sql); //プリペアドステートメントを作る
$stm-&gt;execute(); //SQL文を実行
</code></pre>';

$between = '<pre><code class="prettyprint">$sql = &quot;SELECT * FROM classic2022 WHERE number BETWEEN 3000 AND 4000 ORDER BY number&quot;; //SQL文を作る
</code></pre>';

$like = '<pre><code class="prettyprint">$sql = &quot;SELECT * FROM classic2022 WHERE name LIKE &#039;%田%&#039;&quot;; //SQL文を作る
</code></pre>';

$up = '<pre><code class="prettyprint">$sql = &quot;UPDATE classic2022 set name = &#039;変更後の名前&#039; WHERE number = 〇&quot;;
</code></pre>';

$purasu = '<pre><code class="prettyprint">$sql = &quot;UPDATE classic2022 set number = number + 1&quot;;
</code></pre>';

$insert = '<pre><code class="prettyprint">$sql = &quot;INSERT classic2022 (number, name, reg, branch) VALUES
(9999, &#039;ていちゃん&#039;, 10, &#039;オフィシャル&#039;),
(8888, &#039;ペラ坊&#039;, 11, &#039;福岡&#039;),
(7777, &#039;アシ夢&#039;, 12, &#039;福岡&#039;),&quot;;
$stm = $pdo-&gt;prepare($sql); //プリペアドステートメントを作る
$stm-&gt;execute(); //SQL文を実行
</code></pre>';

$del = '<pre><code class="prettyprint">$sql = &quot;DELETE FROM classic2022 WHERE reg = &#039;東京&#039;&quot;;
$stm = $pdo-&gt;prepare($sql); //プリペアドステートメントを作る
$stm-&gt;execute(); //SQL文を実行
</code></pre>';


?>

