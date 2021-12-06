<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~購入ページ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "購入ページ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="discountCoupon.php">フォーム~sale~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <?php
    require_once("es.php"); //フォーム~入力データのチェック~で参照してね
    if (!checkEn($_POST)) { //文字エンコードの検証
      $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
      $err = "Encoding Error! The espected encoding is" . $encoding;
      exit($err); //エラーメッセージを出してコードのキャンセルする
    }
    $_POST = es($_POST); //HTMLエスケープ(xss対策)
    ?>

    <?php
    $errors = [];
    if (isset($_POST['couponCode'])) {
      $couponCode = $_POST['couponCode'];
    } else {
      $couponCode = ""; //未設定
    }

    if (isset($_POST['goodsID'])) {
      $goodsID = $_POST['goodsID'];
    } else {
      $goodsID = ""; //未設定
    }
    ?>

    <?php
    require_once("saleData.php");
    $discount = getCouponRate($couponCode); //割引率
    $tanka = getPrice($goodsID); //単価
    if (is_null($discount) || is_null($tanka)) {
      $err = '<div class = "error">不正な操作がありました。</div>';
      exit($err);
    }
    ?>

    <?php
    if (isset($_POST['kosu'])) {
      $kosu = $_POST['kosu'];
      if (!ctype_digit($kosu)) {
        $errors[] = "個数は整数で入力してください。";
      }
    } else {
      $errors[] = "個数が未設定";
    }
    ?>

    <?php
    if (count($errors) > 0) {
      echo '<ol class = "error">';
      foreach ($errors as $value) {
        echo "<li>", $value, "</li>";
      }
      echo "</ol>";
    } else {
      $price = $tanka * $kosu;
      $discount_price = floor($price * $discount);
      $off_price = $price - $discount_price;
      $off_per = (1 - $discount) * 100;
      $tanka_fm = number_format($tanka);
      $discount_price_fm = number_format($discount_price);
      $off_price_fm = number_format($off_price);

      echo "単価：{$tanka_fm}円、", "個数：{$kosu}個", "<br><br>";
      echo "金額：{$discount_price_fm}円", "<br>";
      echo "(割引：-{$off_price_fm}円、", "{$off_per}％ OFF)", "<br>";
    }
    ?>

    <!-- 戻りボタン -->
    <form method="POST" action="sale.php">
      <ul class="nolist">
        <li><input type="submit" value="戻る"></li>
      </ul>
    </form>


  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>