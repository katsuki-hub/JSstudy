<?php
if (empty($_POST["memo"])) {
  //POSTされた値がないとき入力ページへリダイレクト
  $url = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  header("HTTP/1.1 303 See Other");
  header("Location:" . $url . "/topMemo.php");
  exit();
}

date_default_timezone_set('Asia/Tokyo');
$memo = $_POST["memo"];
$date = date("Y/n/j G:i:s", time());
$newdata = $date . "　　" . $memo;
try {
  $workingfileObj = new SplFileObject("../data/working.tmp", "wb");
  //メモをワークファイルへ
  $workingfileObj->flock(LOCK_EX);
  $workingfileObj->fwrite($newdata);
  $workingfileObj->flock(LOCK_UN);
} catch (Exception $e) {
  echo '<span class="error">エラーがありました</span><br>';
  echo $e->getMessage();
  exit();
}

//元ファイル
$filename = "../data/topMemo.txt";
if (file_exists($filename)) { //元ファイルがあるか確認
  $fileObj = new SplFileObject($filename, "rb");
  //元データ読み込み
  $fileObj->flock(LOCK_SH);
  $olddata = $fileObj->fread($fileObj->getSize());
  $fileObj->flock(LOCK_UN);

  //古いデータを作業ファイルに追記
  $olddata = "\n" . $olddata;
  $workingfileObj->flock(LOCK_EX);
  $workingfileObj->fwrite($olddata);
  $workingfileObj->fwrite(LOCK_UN);

  $fileObj = NUll; //元ファイル閉じる
  unlink($filename); //元ファイル削除
}

$workingfileObj = NULL; //作業ファイルクローズ
rename("../data/working.tmp", $filename); //作業ファイルをリネーム

//メモを読むページへリダイレクト
$url = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
header("HTTP/1.1 303 See Other");
header("Location:" . $url . "/topRead.php");
exit();
