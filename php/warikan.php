<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~割り勘~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "割り勘フォーム" ?>
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
    $errors = []; //エラーメッセージを入れる配列の初期化
    ?>

    <?php
    //合計金額チェック
    if (isset($_POST['goukei'])) {
      $goukei = $_POST['goukei'];
      if (!ctype_digit($goukei)) { //関数の引数に指定された文字列に数字だけが含まれているかどうか
        $errors[] = "整数で金額を入力してください！";
      }
    } else { //未設定のエラー
      $errors[] = "合計の金額を設定してください！\(-.-)/";
    }

    //人数チェック
    if (isset($_POST['ninzu'])) {
      $ninzu = $_POST['ninzu'];
      if (!ctype_digit($ninzu)) {
        $errors[] = "人数を入力してください！";
      } else if ($ninzu == 0) {
        $errors[] = "0人では割り勘できません。";
      }
    } else { //未設定のエラー
      $errors[] = "人数が設定されていません！\(-.-)/";
    }
    ?>

    <?php
    if (count($errors) > 0) { //配列$errorsの値が1個でもある場合
      echo '<ol class = "error">';
      foreach ($errors as $value) { //エラー内容をリスト表示
        echo "<li>", $value, "</li>";
      }
      echo "</ol>";
    ?>

    <!-- 戻るボタン -->
    <form method="POST" action="formDetaCheck.php#warikan">
      <ul class="nolist">
        <li><input type="submit" value="戻る"></li>
      </ul>
    </form>

    <?php
    } else { //エラーがなかった時の処理
      $amari = $goukei % $ninzu;
      $price = ($goukei - $amari) / $ninzu;

      $goukei_fm = number_format($goukei); //3桁区切り
      $price_fm = number_format($price);

      echo "{$goukei_fm}円を{$ninzu}人で割り勘します。", "<br>";
      echo "1人当たり{$price_fm}円のお支払いで、不足分は{$amari}円です。";
    }
    ?>

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