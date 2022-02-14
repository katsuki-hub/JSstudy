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

$bra = '<pre><code class="prettyprint">$sql = &quot;SELECT * FROM classic2022 WHERE number &gt;= 3500 AND branch = &#039;福岡&#039;&quot;; //SQL文を作る
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

$formS = '<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;search.php&quot;&gt;
&lt;ul&gt;
  &lt;li&gt;
    &lt;label&gt;支部を検索：&lt;br&gt;
      &lt;input type=&quot;text&quot; name=&quot;branch&quot; placeholder=&quot;支部名を入力&quot;&gt;
    &lt;/label&gt;
  &lt;/li&gt;
  &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;検索する&quot;&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$search = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;../common/es.php&quot;); //PHPのフォーム~入力データのチェック~で参照してね
$backURL = &quot;searchForm.php&quot;;

if (!checkEn($_POST)) { //エンコードチェック
  header(&quot;Location:{$backURL}&quot;);
  exit();
}

if (empty($_POST)) { //空の時エラー
  header(&quot;Location:{$backURL}&quot;);
  exit();
} else if (!isset($_POST[&quot;branch&quot;]) || ($_POST[&quot;branch&quot;] === &quot;&quot;)) {
  header(&quot;Location:{$backURL}&quot;);
  exit();
}

//接続パラメーター
$user = &#039;****&#039;;
$passwoed = &#039;****&#039;;
$dbName = &#039;kyotei&#039;;
$host = &#039;localhost:8888&#039;;
$dsn = &quot;mysql:host={$host};dbname={$dbName};charset=utf8&quot;;
?&gt;

&lt;!doctype html&gt;
&lt;html lang=&quot;ja&quot;&gt;
・・・・↓↓

&lt;?php
$branch = $_POST[&quot;branch&quot;];
try {
  $pdo = new PDO($dsn, $user, $passwoed);
  $pdo-&gt;setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = &quot;SELECT*FROM classic2022 WHERE branch LIKE(:branch)&quot;; //SQL文
  $stm = $pdo-&gt;prepare($sql); //プリペアドステートメント作成
  $stm-&gt;bindValue(&#039;:branch&#039;, &quot;%{$branch}%&quot;, PDO::PARAM_STR);
  $stm-&gt;execute(); //SQL文の実行
  $result = $stm-&gt;fetchAll(PDO::FETCH_ASSOC);
  if (count($result) &gt; 0) {
    echo &quot;{$branch}支部の出場選手&quot;;
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
  } else {
    echo &quot;{$branch}支部の選手は見つかりませんでした。&quot;;
  }
} catch (Exception $e) {
  echo &#039;&lt;span class=&quot;error&quot;&gt;エラーがありました&lt;/span&gt;&lt;br&gt;&#039;;
  echo $e-&gt;getMessage();
}
?&gt;
&lt;HR&gt;
&lt;p&gt;&lt;a href=&quot;&lt;?php echo $backURL ?&gt;&quot;&gt;戻る&lt;/a&gt;&lt;/p&gt;
</code></pre>';

$newForm = '<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;insertData.php&quot;&gt;
&lt;ul&gt;
  &lt;li&gt;&lt;label&gt;登録番号：
      &lt;input type=&quot;number&quot; name=&quot;number&quot; placeholder=&quot;登録番号&quot;&gt;
    &lt;/label&gt;&lt;/li&gt;
  &lt;li&gt;&lt;label&gt;　　名前：
      &lt;input type=&quot;text&quot; name=&quot;name&quot; placeholder=&quot;名前&quot;&gt;
    &lt;/label&gt;&lt;/li&gt;
  &lt;li&gt;&lt;label&gt;　登録期：
      &lt;input type=&quot;number&quot; name=&quot;reg&quot; placeholder=&quot;登録期&quot;&gt;
    &lt;/label&gt;&lt;/li&gt;
  &lt;li&gt;&lt;label&gt;　　支部：
      &lt;input type=&quot;text&quot; name=&quot;branch&quot; placeholder=&quot;所属支部&quot;&gt;
    &lt;/label&gt;&lt;/li&gt;
  &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;追加する&quot;&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/form&gt;
</code></pre>
';

$newData = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;../common/es.php&quot;);
$backURL = &quot;classicForm.php&quot;;

if (!checkEn($_POST)) { //エンコードチェック
  header(&quot;Location:{$backURL}&quot;);
  exit();
}

//簡単なエラー処理
$errors = [];
if (!isset($_POST[&#039;number&#039;]) || (!ctype_digit($_POST[&quot;number&quot;]))) {
  $errors[] = &quot;登録番号には数値を入れてください&quot;;
}
if (!isset($_POST[&#039;name&#039;]) || ($_POST[&#039;name&#039;] === &quot;&quot;)) {
  $errors[] = &quot;名前が空です&quot;;
}
if (!isset($_POST[&#039;reg&#039;]) || (!ctype_digit($_POST[&quot;reg&quot;]))) {
  $errors[] = &quot;登録期には数値を入れてください&quot;;
}
if (!isset($_POST[&#039;branch&#039;]) || ($_POST[&#039;branch&#039;] === &quot;&quot;)) {
  $errors[] = &quot;所属支部が空です&quot;;
}

//エラーがあったとき
if (count($errors) &gt; 0) {
  echo &#039;&lt;ol class=&quot;error&quot;&gt;&#039;;
  foreach ($errors as $value) {
    echo &quot;&lt;li&gt;&quot;, $value, &quot;&lt;/li&gt;&quot;;
  }
  echo &quot;&lt;/ol&gt;&quot;;
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;&lt;a href=&quot;, $backURL, &quot;&gt;戻る&lt;/a&gt;&quot;;
  exit();
}

//データベース
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

&lt;?php
$number = $_POST[&quot;number&quot;];
$name = $_POST[&quot;name&quot;];
$reg = $_POST[&quot;reg&quot;];
$branch = $_POST[&quot;branch&quot;];

try {
  $pdo = new PDO($dsn, $user, $passwoed);
  $pdo-&gt;setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = &quot;INSERT INTO classic2022 (number, name, reg, branch) VALUES (:number, :name, :reg, :branch)&quot;;
  $stm = $pdo-&gt;prepare($sql);
  $stm-&gt;bindValue(&#039;:number&#039;, $number, PDO::PARAM_INT);
  $stm-&gt;bindValue(&#039;:name&#039;, $name, PDO::PARAM_STR);
  $stm-&gt;bindValue(&#039;:reg&#039;, $reg, PDO::PARAM_INT);
  $stm-&gt;bindValue(&#039;:branch&#039;, $branch, PDO::PARAM_STR);

  if ($stm-&gt;execute()) {
    //レコードの表示
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
  } else {
    echo &#039;&lt;span class=&quot;error&quot;&gt;追加エラーがありました&lt;/span&gt;&lt;br&gt;&#039;;
  };
} catch (Exception $e) {
  echo &#039;&lt;span class=&quot;error&quot;&gt;エラーがありました&lt;/span&gt;&lt;br&gt;&#039;;
  echo $e-&gt;getMessage();
}
?&gt;
&lt;HR&gt;
&lt;p&gt;&lt;a href=&quot;&lt;?php echo $backURL ?&gt;&quot;&gt;戻る&lt;/a&gt;&lt;/p&gt;
</code></pre>
';

?>

