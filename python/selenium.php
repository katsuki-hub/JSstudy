<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~ブラウザを自動操縦~" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  .hidden {
    display: none;
  }

  ul li {
    list-style-type: circle;
    font-size: 14px;
    margin: 4px;
  }
  </style>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "ブラウザを自動操縦" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="selenium.php">selenium</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>WEBブラウザを自動操縦するSelenium</h2>
        <p>seleniumはブラウザの画面を自動でクリックしたり、パラメータを送信したりして、任意の画面を表示し、正しくアプリが実行されたかを確認したり、ページのスクリーンショットを撮ったりできます。</p>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install selenium
        </div>
        <p>自身のPCにインストールしているChromeのバージョンを確認しましょう！<span class="mark">ヘルプ>GoogleChromeについて</span><br>
          該当するバージョンのChromeDriverをダウンロードし、pythonがインストールされているフォルダに格納します。※パスの通ったフォルダにコピーでもOK！<br>
          <a href="https://chromedriver.chromium.org/">https://chromedriver.chromium.org/</a>
        </p>
        <div class="submenu">
          <button type="button">
            <h5 style="margin: 7px">Webブラウザの自動操縦で出来る事</h5>
          </button>
          <ul class="hidden">
            <li>任意のURLを開く</li>
            <li>ブラウザ履歴の操作(戻る、進む、ページ更新)</li>
            <li>フォームの自動送信</li>
            <li>任意の要素の取得、状態の確認</li>
            <li>要素のクリック、マウス操作、キーボード動作のエミユレート</li>
            <li>クッキーの取得や削除</li>
            <li>ウィンドウの位置やサイズの設定</li>
            <li>指定条件まで処理の待機</li>
            <li>任意のタイミングでJavaScriptを実行</li>
            <li>スクリーンショットの撮影</li>
          </ul>
        </div>
        <div class="br50"></div>
        <h4>drlverオブジェクトの要素の検索を行うメソッド</h4>
        <table border="5">
          <tr>
            <th>利用するメソッド名</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>find_element_by_tag_name(タグ名)</td>
            <td>タグ名を指定して検索</td>
          </tr>
          <tr>
            <td>find_element_by_id(ID名)</td>
            <td>ID属性の値を指定して検索</td>
          </tr>
          <tr>
            <td>find_element_by_class_name(クラス名)</td>
            </td>
            <td>ckass属性を指定して検索</td>
          </tr>
          <tr>
            <td>find_elements_by_css_selector(CSSセレクタ)</td>
            <td>CSSセレクタで検索</td>
          </tr>
          <tr>
            <td>find_element_by_name(name属性)</td>
            <td>フォーム等で使うname属性を指定して検索</td>
          </tr>
          <tr>
            <td>find_element_by_limk_text(テキスト)</td>
            <td>リンクテキストを指定して検索</td>
          </tr>
          <tr>
            <td>find_element_by_partial_link_text(テキスト)</td>
            <td>リンクテキストの一部を指定して検索</td>
          </tr>
          <tr>
            <td>find_element_by_xpath(XPath)</td>
            <td>XPathを指定して検索</td>
          </tr>
        </table>
        <small>※複数の要素を一気に取得したい場合には、flnd elements 〇〇のような複数形を指定します</small>




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
  <script>
  $(document).ready(function() {
    $(".submenu button").on("click", function() {
      $(this).next().slideToggle("hidden");
    });
  });
  </script>
</body>

</html>