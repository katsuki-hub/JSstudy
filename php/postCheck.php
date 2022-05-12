<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~郵便番号入力チェック~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "郵便番号入力チェック" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formDetaCheck.php">フォーム~データチェック~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <?php
    require_once("es.php");
    if (!checkEn($_POST)) {
      $encoding = mb_internal_encoding();
      $err = "Encoding Error! The espected encoding is" . $encoding;
      exit($err); //エラーメッセージを出してコードのキャンセルする
    }
    $_POST = es($_POST); //HTMLエスケープ(xss対策)
    ?>

    <?php
    $errors = [];
    if (isset($_POST['postno'])) {
      $postno = trim($_POST['postno']);
      $pattern = "/^[0-9]{3}-[0-9]{4}$/";
      if (!preg_match($pattern, $postno)) { //郵便番号の形式じゃない
        $errors[] = "郵便番号を正しく入力してください。";
      }
    } else { //未設定エラー
      $errors[] = "郵便番号の入力をお願いします。";
    }
    ?>

    <?php
    if (count($errors) > 0) { //エラーがあったら
      echo '<ol class = "error">';
      foreach ($errors as $value) {
        echo "<li>", $value, "</li>";
      }
      echo "</ol>";
    } else { //エラーがないとき
      echo "郵便番号は{$postno}です。";
    }
    ?>

    <!-- 戻るボタン -->
    <form method="POST" action="formDetaCheck.php#postNo">
      <ul class="nolist">
        <li><input type="submit" value="戻る"></li>
      </ul>
    </form>

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