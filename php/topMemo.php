<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~新しいメモをトップに挿入保存~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "新しいメモをトップに挿入保存" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="topMemo.php">TOPメモ</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>新しいメモから順に書き出し</h2>
        <form method="POST" action="topWrite.php">
          <ul>
            <li><label>memo:<input name="memo" class="memofield" placeholder="メモを書く"></label></li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>
        <div class="br50"></div>
        <div class="frame1">
          ファイルの書き出しは、末尾に追加するオープンモードはあるが既存のデータの先頭に挿入していくオープンモードはありません。<br>今回は作業用のテキストファイルを作って新しいデータを先に書き出してから古いデータを追加します。その後古いテキストファイルを削除➩作業用に作ったテキストファイルを削除したファイル名にリネームします。
        </div>

        <div class="br50"></div>
        <h4>行の範囲を取り出す</h4>
        <div class="frame3">
          $file->current()　現在の行を取り出し<br>
          $file->next()　次の行に進める<br>
          $file->rewind()　最初の行に巻き戻す<br>
          $file->seek($line_pos)　指定した行に移動<br>
          $file->eof()　TRUEが行末
          <div class="frame2">
            ファイルオブジェクトから行の範囲を取り出す
            <hr>
            $data = new LimitIterator($fileObj, 開始行, 行数);
          </div>
        </div>

        <div class="br50"></div>

        <h3>フォームコード</h3>
        <?php
        require_once("code.php");
        echo $top;
        ?>

        <h3>書き込みページのソースコード</h3>
        <button type="button">topWrite.php</button>
        <?php echo $topW ?>

        <h3>読み込みページのソースコード</h3>
        <button type="button">topRead.php</button>
        <?php echo $topR ?>
        <br>

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