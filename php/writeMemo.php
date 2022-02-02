<?php
if (empty($_POST["memo"])) {
  //POSTされた値がないとき入力ページへリダイレクト
  $url = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  header("Location:" . $url . "/inputMemo.php");
  exit();
}

date_default_timezone_set('Asia/Tokyo');
$memo = $_POST["memo"];
$date = date("Y/n/j G:i:s", time());
$writedata = "---\n" . $date . "\n" . $memo . "\n";
$filename = "../data/memo.txt";
try {
  $fileobj = new SplFileObject($filename, "a+b");
} catch (Exception $e) {
  echo '<span class="error">エラーがありました</span>';
  echo $e->getMessage();
  exit();
}

$fileobj->flock(LOCK_EX); // 排他ロック
$result = $fileobj->fwrite($writedata); //メモを追記
$fileobj->flock(LOCK_UN); //アンロック

//メモを読むページへリダイレクト
$url = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
header("Location:" . $url . "/readMemo.php");
exit();
