<!doctype html>
<html lang="ja">

<head>
  <?php $title = "MySQL編~新規レコードの入力フォーム~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "新規レコードの入力フォーム" ?>
    <?php require_once "../common/header_mysql.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="newRecord.php">新規レコード</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>新規レコードの入力フォームを作成</h2>
        <form>
          <ul>
            <li><label>登録番号：
                <input type="number" name="number" placeholder="登録番号">
              </label></li>
            <li><label>　　名前：
                <input type="text" name="name" placeholder="名前">
              </label></li>
            <li><label>　登録期：
                <input type="number" name="reg" placeholder="登録期">
              </label></li>
            <li><label>　　支部：
                <input type="text" name="branch" placeholder="所属支部">
              </label></li>
            <li><input type="submit" value="追加のデモです"></li>
          </ul>
        </form>
        <div class="br50"></div>
        <h3>フォームのコード</h3>
        <?php
        require_once("sqlCode.php");
        echo $newForm;
        ?>

        <h3>データベース追加コード</h3>
        <button type="button">insertData.php</button>
        <?php echo $newData ?><br>

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