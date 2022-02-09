<?php
require_once("es.php");
//クッキーの値を取り出す
date_default_timezone_set('Asia/Tokyo');
if (isset($_COOKIE["visitedLog"])) {
  $logdata = $_COOKIE["visitedLog"];
  $counter = $logdata["counter"];
  $time = $logdata["time"];
  $lasttime = date("Y年n月j日Ag時i分", $time);
} else {
  $counter = 0;
  $lasttime = "直近で初めての訪問";
}
//訪問ログをクッキーに保存(30日有効)
$result1 = setcookie('visitedLog[counter]', ++$counter, time() + 60 * 60 * 24 * 30);
$result2 = setcookie('visitedLog[time]', time(), time() + 60 * 60 * 24 * 30);
$result = ($result1 && $result2);
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~訪問カウンター~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "訪問回数と日時を配列でクッキーに保存する" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="visitedLog.php">訪問カウンター</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>訪問回数と日時</h2>
        <?php
        if ($result) {
          echo "ページ訪問は", es($counter), "回目です", "<br>";
          echo "前回の訪問：", es($lasttime), "<HR>";
          echo '(<a href="resetLog.php">リセットする</a>)';
        } else {
          echo '<span class="error">クッキーが利用できませんでした</span>';
        }
        ?>
        <div class="br50"></div>
        <h3>訪問カウンターのソースコード</h3>
        <?php
        require_once("code.php");
        echo $visit;
        ?><br>

        <h3>リセットページ</h3>
        <input type="button" value="reset.php">
        <?php
        echo $reset;
        ?><br>



      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>