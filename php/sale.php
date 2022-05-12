<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~クーポンで割引率を出す~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "クーポンで割引率を出す" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="sale.php">フォーム~クーポンセール~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>割引率と価格を安全に渡す</h2>
        <?php
        require_once("es.php"); //フォーム~入力データのチェック~で参照してね
        if (!checkEn($_POST)) { //文字エンコードの検証
          $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
          $err = "Encoding Error! The espected encoding is" . $encoding;
          exit($err); //エラーメッセージを出してコードのキャンセルする
        }
        $_POST = es($_POST); //HTMLエスケープ(xss対策)
        ?>

        <!-- 割引率と単価の値を直接書かずに式で求める -->
        <?php
        require_once("saleData.php");
        $couponCode = "nnpp";
        $goodsID = "win11";

        //コードとIDから割引率と単価を調べる
        $discount = getCouponRate($couponCode);
        $tanka = getPrice($goodsID);

        //割引率と単価に値があるかチェック
        if (is_null($discount) || is_null($tanka)) {
          $err = '<div class = "error">不正な操作がありました。</div>';
          exit($err);
        }
        ?>

        <?php
        $off = (1 - $discount) * 100;
        if ($discount > 0) {
          echo "<b>このページでご購入で{$off}％ OFFになります！</b>";
        }
        $tanka_fm = number_format($tanka);
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="discountCoupon.php">
          <!-- 隠しフィールドにコードとIDを設定してPOSTする -->
          <input type="hidden" name="couponCode" value="<?php echo $couponCode; ?>">
          <input type="hidden" name="goodsID" value="<?php echo $goodsID; ?>">
          <ul class="nolist">
            <li><label>単価：<?php echo $tanka_fm; ?>円</label></li>
            <li><label>個数：<input type="number" name="kosu" value="<?php echo $kosu; ?>"></label></li>
            <li><input type="submit" value="購入する"></li>
          </ul>
        </form>
        <div class="blank"></div>

        <h4>値の改ざん防止</h4>
        <div class="frame3">
          割引率や商品にクーポンコードや商品IDを付けておき、サーバーとやり取りする情報は識別IDだけにしておく！<br>コードやIDを引数にして別ファイルに用意した配列やデータベースから取り出した値を使って表示したり計算をする。
        </div>

        <h3>割引率と価格の値の共有ファイル</h3>
        <!-- ソースコード -->
        <button type="button">saleData.php</button>
        <?php
        require_once("code.php");
        echo "{$saleCoupon}";
        ?>
        <button type="button">MEMO</button>
        <div class="frame1">
          array_key_exists()を使って問合せのあったクーポンコードと商品IDのキーが配列に存在するかどうかを事前にチェックしています。結果がfalseのときはNULL(未定義)を返します。
        </div><br>
        <h3>POSTされたリクエストを処理</h3>
        <!-- ソースコード -->
        <button type="button">discountCoupon.php</button>
        <?php
        require_once("code.php");
        echo "{$coupon}";
        ?><br>

        <h3>購入ページ</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$form5}";
        ?><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>