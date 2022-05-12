<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~キーボードの自動化~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "キーボードの自動化" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="memo.php">PyAutoGUI</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>キーボード操作の自動化</h2>
        <p><b>PyAutoGUI</b>モジュールを使うとマウス操作やキーボードの操作を自動化することが出来ます。</p>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install pyautogui<br>
          pip install opencv_python
        </div>
        <h3>メモ帳を起動して文字入力(Windows)</h3>
        <?php
        require_once("pyCode.php");
        echo $memo;
        ?>
        <p>プログラムを実行するとメモ帳が起動し「Hello, let&#039;s do our best today」と文字が入力される。</p><br>

        <h4>キー入力を自動化する関数</h4>
        <table border="5">
          <tr>
            <th>関数の書式</th>
            <th>機能</th>
          </tr>
          <tr>
            <td>pyautogui.write(文字列)</td>
            <td>文字列を入力させる</td>
          </tr>
          <tr>
            <td>pyautogui.press(キー)</td>
            <td>'enter'などのキーを押す</td>
          </tr>
          <tr>
            <td>pyautogui.keyDown(キー)</td>
            <td>キーを押した状態にする</td>
          </tr>
          <tr></tr>
          <td>pyautogui.keyUp(キー)</td>
          <td>keyDownしたキーを離す</td>
          </tr>
          <tr>
            <td>pyautogui.hotkey(キー1, キー2, ..)</td>
            <td>一度にキーの組み合わせを押す</td>
          </tr>
        </table>
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