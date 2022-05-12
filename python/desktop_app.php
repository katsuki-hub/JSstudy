<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~デスクトップアプリ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "デスクトップアプリ" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="desktop_app.php">PySimpleGUI</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>簡単なアプリを作ってみよう</h2>
        <p>手軽にアプリ画面を構成するのに便利なライブラリである<b>PySimpleGUI</b>を使うと簡単にデスクトップアプリを開発出来ます。</p>
        <div class="frame2">
          pip install pysimplegui
        </div>
        <h3>デスクトップアプリを構成する様々なGUI部品</h3>
        <?php
        require_once("pyCode.php");
        echo $parts;
        ?>
        <img src="../images/py_img/parts.png" alt="部品構成" width="70%">

        <h3>インチからセンチへの計算ツール</h3>
        <?php echo $inch; ?>
        <img src="../images/py_img/inch.png" alt="インチ変換" width="70%">

        <h3>デジタル時計</h3>
        <?php echo $clock; ?>
        <img src="../images/py_img/clock.png" alt="デジタル時計" width="70%">

        <div class="br50"></div>
        <h4>Pythonを実行ファイルへ変換する</h4>
        <p><b>Pyinstaller</b>という作成したプログラムを一つの実行ファイルにまとめるツールがあります。これで配布を行えば、Pythonのインストールや各種モジュールのインストール不要で実行できます。</p>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install pyinstaller
        </div><br>

        <button type="button">コマンドライン</button>
        <div class="frame2">
          cd フォルダのパス<br>
          pyinstaller ファイル名.py --onefile --noconsole
        </div>
        <p>※生成した実行ファイル.exeはOS依存します。</p>
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