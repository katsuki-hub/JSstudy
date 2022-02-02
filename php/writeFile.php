<?php
date_default_timezone_set('Asia/Tokyo');
$date = date("Y/n/j G:i:s", time());
$writedata = <<< "EOD"
ヒアドキュメントです！！
途中で改行しても
変数を使った文章の作成が可能です！！
更新日：$date
EOD;
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~ファイル書き出し~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "ファイル書き出し" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="writeFile.php">ファイル</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>データをテキストファイルに読み書きする</h2>
        <?php
        $filename = "../data/mytext.txt"; //保存するファイル名
        try { //ファイルオブジェクトの作成
          $fileobj = new SplFileObject($filename, "wb");
        } catch (Exception $e) {
          echo '<span class="error">エラーがありました</span>';
          echo $e->getMessage();
          exit();
        }
        //ファイルに書き込む
        $written = $fileobj->fwrite($writedata);
        if ($written === false) {
          echo '<span class="error">ファイルに保存できませんでした</span>';
        } else {
          echo "SplFileobjectのfwriteを使って、<br>{$filename}に{$written}バイトを書き出しました。", "<HR>";
          echo '<a href="readFile.php">ファイルを読む</a>';
        }
        ?>

        <div class="br50"></div>
        <h3>オープンモードの種類</h3>
        <div class="frame3">"b"はバイナリーモードを指し、通常どのモードでも"b"を付加して指定します。ファイルポインタはファイル上の読み書きする位置のことです。</div>
        <table border="5" class="function">
          <tr bgcolor="yellow">
            <th>オープンモード</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>rb</td>
            <td>読み書き専用　ファイルポインターは先頭</td>
          </tr>
          <tr>
            <td>r+b</td>
            <td>読み書き可能　ファイルポインターは先頭</td>
          </tr>
          <tr>
            <td>wb</td>
            <td>書き込み専用　内容を消して新規に書き込む。ファイルがなければ新規作成</td>
          </tr>
          <tr>
            <td>w+b</td>
            <td>読み書き可能　それ以外wbと同じ</td>
          </tr>
          <tr>
            <td>ab</td>
            <td>書き込み専用　追記のみ。ファイルがなければ新規作成</td>
          </tr>
          <tr>
            <td>a+b</td>
            <td>読み書き可能　読み込み位置はseek()で移動できるが、書き込みは追記のみ</td>
          </tr>
          <tr>
            <td>xb</td>
            <td>書き込み専用　ファイルを新規作成する。既にファイルがあるとエラー</td>
          </tr>
          <tr>
            <td>x+b</td>
            <td>読み書き可能　それ以外はxbと同じ</td>
          </tr>
          <tr>
            <td>cb</td>
            <td>書き込み専用　既存の内容を消さず先頭から書く。ファイルがなければ新規作成</td>
          </tr>
          <tr>
            <td>c+b</td>
            <td>読み書き可能　それ以外はcbと同じ</td>
          </tr>
        </table>
        <h4>例外処理</h4>
        <div class="frame2">
          try {<br>
          　例外処理が組み込まれているメソッドを実行する<br>
          } catch(Exception $e) {<br>
          　エラー処理を行うコード<br>
          } finaly {<br>
          　エラーがあってもなくても実行するコード<br>
          }<br>
          ※finalyはオプションなので省略可
        </div>
        <div class="br50"></div>
        <h3>ファイル書き出しのソースコード</h3>
        <?php
        require_once("code.php");
        echo $write;
        ?><br>

        <h3>ファイル読み込みのソースコード</h3>
        <input type="button" value="readFile.php">
        <?php
        require_once("code.php");
        echo $read;
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