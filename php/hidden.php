<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~フォームの隠しフィールド~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォームの隠しフィールド" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="hidden.php">フォーム~hidden~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2 id="shop">隠しフィールドを使い入力欄にない値をPOSTする</h2>
        <!-- 戻るボタンで初期値に個数を入れる -->
        <?php
        if (isset($_POST['kosu'])) {
          $kosu = $_POST['kosu'];
        } else {
          $kosu = "";
        }
        ?>

        <?php
        $discount = 0.8;
        $off = (1 - $discount) * 100;
        if ($discount > 0) {
          echo "<b>ECサイトからのご購入は{$off}% OFFになります！</b>";
        }
        $tanka = 1250;
        $tanka_fm = number_format($tanka);
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="discount.php">
          <input type="hidden" name="discount" value="<?php echo $discount; ?>">
          <input type="hidden" name="tanka" value="<?php echo $tanka; ?>">
          <ul class="nolist">
            <li><label>単価：<?php echo $tanka_fm; ?>円</label></li>
            <li><label>個数：<input type="number" name="kosu" value="<?php echo $kosu ?>"></label></li>
            <li><input type="submit" value="計算する"></li>
          </ul>
        </form>

        <h3>入力フォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$form4}";
        ?>

        <h3>計算ボタンでPOSTで渡された値で計算する</h3>
        <button type="button">discount.php</button>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$hidden}";
        ?>
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