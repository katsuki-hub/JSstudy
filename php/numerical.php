<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~数値チェック~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "数値をチェックする" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="numerical.php">数値チェック</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>is_numeric関数</h2>
        <div class="frame1">
          数字または数値形式の文字列かをチェックする！<br>文字列型か小数点でも数値ならばtrueを返します。
        </div>
        <table border="3">
          <tr bgcolor="pink">
            <th>関数</th>
            <th>文字列型(string)</th>
            <th>整数型(int)</th>
            <th>浮動小数点(float)</th>
          </tr>
          <tr>
            <td>is_numeric</td>
            <td>TRUE</td>
            <td>TRUE</td>
            <td>TRUE</td>
          </tr>
        </table><br><br>

        <h2>is_int関数</h2>
        <div class="frame1">
          整数型(int)かをチェックします！<br>数値でも文字型ならばfalseを返します。
        </div>
        <table border="3">
          <tr bgcolor="pink">
            <th>関数</th>
            <th>文字列型(string)</th>
            <th>整数型(int)</th>
            <th>浮動小数点(float)</th>
          </tr>
          <tr>
            <td>is_int</td>
            <td>FALSE</td>
            <td>TRUE</td>
            <td>FALSE</td>
          </tr>
        </table><br><br>

        <h2>preg_match関数</h2>
        <div class="frame1">
          正規表現で数値をチェックします！
        </div>
        <table border="3">
          <tr bgcolor="pink">
            <th>関数</th>
            <th>文字列型(string)</th>
            <th>整数型(int)</th>
            <th>浮動小数点(float)</th>
          </tr>
          <tr>
            <td>preg_match</td>
            <td>TRUE</td>
            <td>TRUE</td>
            <td>FALSE</td>
          </tr>
        </table><br><br>

        <h2>ctype_digit関数</h2>
        <div class="frame1">
          文字列が数字かどうかをチェックする！<br>文字列のみを指定すること！int型だとfalseになることもある。
        </div>
        <table border="3">
          <tr bgcolor="pink">
            <th>関数</th>
            <th>文字列型(string)</th>
            <th>整数型(int)</th>
            <th>浮動小数点(float)</th>
          </tr>
          <tr>
            <td>ctype_digit</td>
            <td>TRUE</td>
            <td>FALSE</td>
            <td>FALSE</td>
          </tr>
        </table><br><br>

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