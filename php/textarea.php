<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~テキストエリア~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォーム~テキストエリア" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="textarea.php">様々なフォーム</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>スライダーで選択</h2>
        <?php
        require_once("es.php"); //フォーム~入力データのチェック~で参照してね
        if (!checkEn($_POST)) { //文字エンコードの検証
          $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
          $err = "Encoding Error! The espected encoding is" . $encoding;
          exit($err); //エラーメッセージを出してコードのキャンセルする
        }
        ?>

        <?php
        $error = [];
        $min = 1;
        $max = 5;
        if (isset($_POST["roasting"])) {
          $roasting = $_POST["roasting"];
          $isRoasting = ctype_digit($roasting) && ($roasting >= $min) && ($roasting <= $max);
          if (!$isRoasting) {
            $error[] = "焙煎殿値にエラーがあります。";
            $roasting = $min;
          }
        } else {
          $roasting = round(($min + $max) / 2);
          $isRoasting = true;
        }
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li><span>焙煎土：　</span>
              <input type="range" name="roasting" min="1" max="5" step="1" value="<?php echo $roasting; ?>">
            </li>
            <li><input type="submit" value="決定"></li>
          </ul>
        </form>

        <?php
        if ($isRoasting) {
          $rostList = ["ライトロースト", "ミディアムロースト", "ハイロースト", "シティロースト", "フレンチロースト"];
          echo "<HR>";
          echo "お好みの焙煎度は「{$roasting}、{$rostList[$roasting - 1]}」です。";
        }
        ?>

        <?php
        if (count($error) > 0) {
          echo "<HR>";
          echo '<span class = "error">', implode("<br>", $error), '</span>';
        }
        ?>
        <div class="blank"></div>

        <h2>テキストエリア</h2>
        <?php
        if (isset($_POST["note"])) {
          $note = $_POST["note"];
          $note = strip_tags($note); //HTML,PHPタグを削除する
          $note = mb_substr($note, 0, 150); //最大150文字だけ取り出し
          $note = es($note); //HTMLエスケープ
        } else {
          $note = ""; //POSTされた値が無いとき
        }
        ?>

        <!-- 入力フォーム -->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul class="nolist">
            <li><span>お問い合わせ：　</span>
              <textarea name="note" cols="30" rows="5" maxlength="150" placeholder="コメント入力"></textarea>
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <?php
        $length = mb_strlen($note); //テキストが入力されていれば表示
        if ($length > 0) {
          echo "<HR>";
          $note_br = nl2br($note, false); //改行コード前に<br>に挿入
          echo $note_br;
        }
        ?>

        <div class="blank"></div>
        <h3>文字エンコード検証とhtmlエスケープ</h3>
        <?php
        require_once("code.php");
        echo "{$xss}";
        ?><br>

        <h3>焙煎度を示すスライダー</h3>
        <?php
        require_once("code.php");
        echo $slider;
        ?><br>

        <h3>テキストエリアを作る</h3>
        <?php
        require_once("code.php");
        echo $text;
        ?><br>

        <h4>POSTされた値を処理する順番</h4>
        <div class="frame1">
          ※文字エンコード検証とhtmlエスケープに入っている、es($_POST)でのHTMLエスケープは行わずにcheckEn($_POST)だけしておく！<br><br>テキストからHTMLタグを削除し、文字数制限を行う為です。<br>テキストデータの処理は実施する順番が大事！！
          <ol>
            <li>文字エンコードが正しいかどうか検証する</li>
            <li>HTMLタグ、PHPタグを削除する</li>
            <li>文字数制限内のテキストだけを取り出す</li>
            <li>HTMLエスケープを行う</li>
          </ol>
        </div><br>

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