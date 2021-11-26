<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~フォーム入力の値で計算~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォーム~入力計算結果~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formInput.php">フォーム~入力処理~</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <?php
        $no = $_GET["no"];
        $nolist = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20];

        if (in_array($no, $nolist)) {
          echo "{$no}はあります。";
        } else {
          echo "{$no}は見つかりませんでした。";
        }
        ?>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>