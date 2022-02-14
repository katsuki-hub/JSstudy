<!doctype html>
<html lang="ja">

<head>
  <?php $title = "MySQL編~フォーム入力からデータベースを検索する~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フォーム入力からデータベースを検索する" ?>
    <?php require_once "../common/header_mysql.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="searchForm.php">検索</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>支部を検索する</h2>
        <form method="POST" action="search.php">
          <ul>
            <li>
              <label>支部を検索：<br>
                <input type="text" name="branch" placeholder="支部名を入力">
              </label>
            </li>
            <li><input type="submit" value="検索する"></li>
          </ul>
        </form>

        <div class="blank"></div>
        <div class="frame2">
          <b>プレースホルダーに値をバインドする</b>
          <hr>
          bindValue(プレースホルダー,値,値の型)<br><br>
          プリペアドステートメントを作った後から、プレースホルダに値をバインドします。変数に値を代入するようなもの！
        </div><br>
        <table border="5">
          <tr>
            <th>定数</th>
            <th>PHPでのデータ型</th>
            <th>MySQLでのデータ型</th>
          </tr>
          <tr>
            <td>PDO::PARAM_STR</td>
            <td>string</td>
            <td>VARCHAR,TEXTなどの文字列型</td>
          </tr>
          <tr>
            <td>PDO::PARAM_INT</td>
            <td>int,floatなどの数値</td>
            <td>INT,FLOATなどの数値型</td>
          </tr>
          <tr>
            <td>PDO::PARAM_BOOL</td>
            <td>boolean(論理値)</td>
            <td>論理値</td>
          </tr>
          <tr>
            <td>PDO::PARAM_LOB</td>
            <td>string</td>
            <td>BLOBなどのラージオブジェクト型</td>
          </tr>
          <tr>
            <td>PDO::PARAM_NULL</td>
            <td>null</td>
            <td>NULL</td>
          </tr>
        </table><br>

        <div class="frame3">
          <b>セキュリティ対策</b><br><br>
          フォーム入力から悪意のあるSQL文を送信し、データベースをハッキングするSQLインジェクションに対策するためには、プレースホルダを使ってSQL文を記述してプリペアドステートメントを作ります。プレースホルダの値をbindValue()を使ってバインドすることで、SQLエスケープも同時に行われSQLインジェクション対策として有効な手段になります。
        </div>

        <div class="br50"></div>
        <h3>フォーム</h3>
        <?php
        require_once("sqlCode.php");
        echo $formS;
        ?>

        <h3>データベース検索コード</h3>
        <button type="button">search.php</button>
        <?php echo $search ?><br>

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