<?php
$pdo = '<pre><code class="prettyprint">&lt;?php
$user = &#039;****&#039;;
$passwoed = &#039;****&#039;;
$dbName = &#039;kyotei&#039;;
$host = &#039;localhost:8888&#039;;
$dsn = &quot;mysql:host={$host};dbname={$dbName};charset=utf8&quot;;

//MySQLデータベースに接続する
try {
  $pdo = new PDO($dsn, $user, $passwoed);
  //プリペアドステートメントのエミュレーションを無効にする
  $pdo-&gt;setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  //例外がスローされる設定にする
  $pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo &quot;データベース{$dbName}に接続しました。&quot;;
  //接続解除
  $pdo = NULL;
} catch (Exception $e) { //接続失敗で例外処理実行
  echo &#039;&lt;span class=&quot;error&quot;&gt;エラーがありました&lt;/span&gt;&lt;br&gt;&#039;;
  echo $e-&gt;getMessage();
  exit();
}
?&gt;
</code></pre>';

?>

