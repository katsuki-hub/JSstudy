<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~フォーム入力をセッション変数へ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フォーム入力をセッション変数へ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="sessionForm1.php">セッション変数</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>POSTされた値をセッション変数で受け継ぐ</h2>
        <form method="POST" action="confirm.php">
          <li><label>　　　　名前：
              <input type="text" name="name" placeholder="ニックネーム可" ;>
            </label></li>
          <li><label>好きな食べ物：
              <input type="text" name="food" ;>
            </label></li>
          <li><input type="submit" value="確認する"></li>
        </form>
        <div class="br50"></div>
        <h3>フォームのソースコード</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo $seForm1;
        ?>

        <h3>確認ページのソースコード</h3>
        <button type="button">confirm.php</button>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo $confirm;
        ?>

        <h3>完了ページのソースコード</h3>
        <button type="button">thanks.php</button>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo $confirm;
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