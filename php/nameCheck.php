<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~フォーム入力チェック~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォーム入力チェック" ?>
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
    if (!checkEn($_POST)) { //文字エンコードの検証
      $encoding = mb_internal_encoding();
      $err = "Encoding Error! The espected encoding is" . $encoding;
      exit($err); //エラーメッセージを出してコードのキャンセルする
    }
    $_POST = es($_POST); //HTMLエスケープ(xss対策)
    ?>

    <?php
    $isError = false; //エラーフラグ
    if (isset($_POST['name'])) { //名前を取り出す
      $name = trim($_POST['name']);
      if ($name === "") { //空白のときエラー
        $isError = true;
      }
    } else { //未設定のときエラー
      $isError = true;
    }
    ?>

    <?php if ($isError) : ?>
      <!-- エラーがあったとき -->
      <span class="error">名前を入力してください。</span>
      <form method="POST" action="formDetaCheck.php">
        <input type="submit" value="戻る">
      </form>
    <?php else : ?>
      <!-- エラーがなかったとき -->
      <span>こんにちは、<?php echo $name; ?>さん。</span>
    <?php endif; ?>


  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>