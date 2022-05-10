<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~ダイアログの活用~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "ダイアログの活用" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="dialog.php">ダイアログ</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>ダイアログで動作を変えて実行する</h2>
        <p>プログラムを作った際に、操作対象のファイルを選べたり、一時的にプログラムを止めて情報を表示したりするとより便利になります。</p>
        <small>※tkinterはpythonの標準モジュールです</small>
        <h3>ダイアログが簡単に使えるモジュール</h3>
        <?php
        require_once("pyCode.php");
        echo $dialog;
        ?>
        <div class="frame3">
          モジュールを使う際はメインプログラムと同じフォルダにコピーして、import記述で呼び出す！
        </div>
        <div class="br50"></div>
        <h4>ダイアログのバリエーション</h4>
        <table border="5">
          <tr>
            <th>情報ダイアログ</th>
            <th>ダイアログの種類</th>
          </tr>
          <tr>
            <td>messagebox.showinfo(title, message)</td>
            <td>情報ボックス</td>
          </tr>
          <tr>
            <td>messagebox.showwarning(title, message)</td>
            <td>警告ボックス</td>
          </tr>
          <tr>
            <td>messagebox.showerror(title, message)</td>
            <td>エラーボックス</td>
          </tr>
        </table><br>

        <table border="5">
          <tr>
            <th>2択ダイアログ</th>
            <th>ダイアログの種類</th>
          </tr>
          <tr>
            <td>messagebox.askyesno(title, message)</td>
            <td>はい・いいえ</td>
          </tr>
          <tr>
            <td>messagebox.askokcancel(title, message)</td>
            <td>OK・キャンセル</td>
          </tr>
          <tr>
            <td>messagebox.askretrycancel(title, message)</td>
            <td>再試行・キャンセル</td>
          </tr>
          <tr>
            <td>messagebox.askyesnocancel(title, message)</td>
            <td>はい・いいえ・キャンセル</td>
          </tr>
        </table><br>

        <table border="5">
          <tr>
            <th>一行入力</th>
            <th>ダイアログの種類</th>
          </tr>
          <tr>
            <td>simpledialog.askfloat(title, message)</td>
            <td>実数の入力</td>
          </tr>
          <tr>
          <tr>
            <td>simpledialog.askinteger(title, message)</td>
            <td>整数の入力</td>
          </tr>
          <td>simpledialog.askstring(title, message)</td>
          <td>文字列の入力</td>
          </tr>
        </table><br>

        <table border="5">
          <tr>
            <th>ファイル選択</th>
            <th>ダイアログの種類</th>
          </tr>
          <tr>
            <td>filedialog.askopenfilename()</td>
            <td>ファイルの読み込みダイアログ</td>
          </tr>
          <tr>
            <td>filedialog.askopenfilenames()</td>
            <td>複数ファイルの読み込みダイアログ</td>
          </tr>
          <tr>
            <td>filedialog.asksavefilename()</td>
            <td>ファイルの保存ダイアログ</td>
          </tr>
          <tr>
            <td>filedialog.askdirectory()</td>
            <td>フォルダの選択ダイアログ</td>
          </tr>
        </table>
        <div class="frame3">
          ファイル選択の関数に指定できる引数
          <ul>
            <li>title ➩ ウィンドウのタイトル</li>
            <li>initialdir ➩ 初期フォルダ</li>
            <li>initialfile ➩ 初期選択ファイル</li>
            <li>filetypes ➩ ファイルタイプの指定</li>
            <li>defaltextension ➩ 初期ファイル拡張子(保存ダイアログで)</li>
            <li>mustexist ➩ (フォルダ選択ダイアログで)存在するフォルダが必要</li>
          </ul>
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