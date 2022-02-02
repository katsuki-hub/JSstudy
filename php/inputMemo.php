<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~フォームでテキスト追記~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フォームでテキスト追記" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="inputMemo.php">テキスト追記</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>メモ入力をテキストファイルに追記する</h2>
        <form method="POST" action="writeMemo.php">
          <ul>
            <li><span>memo：</span>
              <textarea name="memo" cols="25" rows="4" maxlength="100" placeholder="メモを書く"></textarea>
            </li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <div class="br50"></div>
        <h3>ファイルのロックとアンロック</h3>
        <table border="5" class="function">
          <tr bgcolor="yellow">
            <th>指定モード</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>LOCK_SH</td>
            <td>共有ロック(読み込んでいる最中に書き込まれないようにブロックする)</td>
          </tr>
          <tr>
            <td>LOCK_EX</td>
            <td>排他ロック(書き込んでいる最中に読み書きされないようにブロックする)</td>
          </tr>
          <tr>
            <td>LOCK_UN</td>
            <td>ロックを解除する</td>
          </tr>
          <tr>
            <td>LOCK_NB</td>
            <td>ロックの解除を待たずにfalseを返す(Windowsではサポートされない)</td>
          </tr>
        </table>
        <p><small>※後からのアクセスは待ち状態となる為、読み書きが終わったら速やかにロックの解除を行う</small></p>
        <div class="br50"></div>
        <h4>ページをリダイレクト</h4>
        <p>リダイレクトはユーザーの入力を待たずにコードで他のURLへ移動する機能です。<br>URLは相対パスではなく、"https://~~~~.com"のような絶対パスのURLを指定します。<br>exit()により、残りのコードは実行せずにページ移動する</p>
        <div class="frame2">
          header("Location:" . $url);<br>
          exit();
        </div>

        <h3>フォームのソースコード</h3>
        <?php
        require_once("code.php");
        echo $memoForm;
        ?>

        <h3>書き込みページのソースコード</h3>
        <?php echo $memoWrite; ?>

        <h3>読み込みページのソースコード</h3>
        <?php echo $memoRead; ?>
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