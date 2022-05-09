<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~社内で使える簡易WEBサーバー~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "社内で使える簡易WEBサーバー" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="flask.php">WEBサーバー</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>簡易WEBサーバーの活用</h2>
        <p>pythonを使って、限られたネットワーク内だけでWEBサーバーを作り、ファイルの共有等が作成できます。<br>
          まずは、WEBサーバーを作成する便利なライブラリーをインストールします。有名なライブラリーは「Flask」「Django」「Bottle」等があります。今回はFlaskを仕様</p>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install flask
        </div>
        <h3>Flaskでファイルを共有</h3>
        <p>Webサーバーを起動するプログラムと同じフォルダに「static」というフォルダを作成し、その中に共有したいファイルを配置する</p>
        <?php
        require_once("pyCode.php");
        echo $flask;
        ?>
        <div class="frame4">
          IDLEからWebサーバーを実行する方法はタスクマネージャーからPythonのプロセスを終了させる必要があり、おすすめできません。<br>
          <button type="button">コマンドライン</button>
          <div class="frame2">
            cd フォルダのパス<br>
            python3 share.py
          </div>
        </div>
        <h5>他のPCからWebサーバーにアクセスする方法</h5>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          ipconfig
        </div>
        IPv4アドレスの欄が192.168から始まるアドレスがそのPCのローカルアドレスです。<br>
        ブラウザのアドレスバーに入力する
        <div class="frame2">
          http://192.168.〇.〇〇:ポート番号（5000）
        </div>
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