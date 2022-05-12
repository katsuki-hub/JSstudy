<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~スクレイピング~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "スクレイピング" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="scraping.php">スクレイピング</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>スクレイピング</h2>
        <p>Web上のデータを集めたり、ダウンロードするにはスクレイピングが便利。ライブラリの「BeautifulSoup」を利用します。
        </p>
        <h5>モジュールのインストール</h5>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          <span class="mark">Requestsのインストール</span><br>
          pip install requests<br>
          <span class="mark">Beautiful Soup4のインストール</span><br>
          pip install beautifulsoup4<br>
          <span class="mark">HTML5対応のパーサーのインストール</span><br>
          pip install html5lib
        </div>
        <h3>Beautiful Soupの仕様例</h3>
        <?php
        require_once("pyCode.php");
        echo $soup;
        ?>
        <div class="br50"></div>
        <h4>Beautiful Soupでのプロパティやメソッドの参照例</h4>
        <p>※e = soup.find(&#039;head&#039;)を実行した利用例</p>
        <table border="5">
          <tr>
            <th>名前</th>
            <th>説明</th>
            <th>利用例</th>
            <th>結果</th>
          </tr>
          <tr>
            <td>e.parent</td>
            <td>親要素</td>
            <td>e.parent.name</td>
            <td>html</td>
          </tr>
          <tr>
            <td>e.children</td>
            <td>子要素の一覧</td>
            <td>list（e.children）[1].name</td>
            <td>meta</td>
          </tr>
          <tr>
            <td>e.(要素名)</td>
            <td>子要素の(要素名)を表す</td>
            <td>e.title.name</td>
            <td>title</td>
          </tr>
          <tr>
            <td>e.previous_sibling</td>
            <td>1つ前の兄弟要素</td>
            <td>e.title.previous_sibling</td>
            <td>'\n'</td>
          </tr>
          <tr>
            <td>e.next_sibling</td>
            <td>1つ後の兄弟要素</td>
            <td>e.title.next_sibling</td>
            <td>'\n'</td>
          </tr>
          <tr>
            <td>e.next_siblings</td>
            <td>前にある兄弟要素一覧</td>
            <td>list(e.title.previous_siblings)[1].name</td>
            <td>meta</td>
          </tr>
          <tr>
            <td>e.next_siblings</td>
            <td>後にある兄弟要素一覧</td>
            <td>list(e.title.next_siblings)[1].name</td>
            <td>link</td>
          </tr>
        </table>
        <h4>Beautiful Soupでの属性値やテキストの参照例</h4>
        <p>※e = soup.find(&#039;head&#039;)を実行した利用例</p>
        <table border="5">
          <tr>
            <th>名前</th>
            <th>説明</th>
            <th>利用例</th>
          </tr>
          <tr>
            <td>e.attrs</td>
            <td>要素の属性一覧</td>
            <td>e.link.attrs['href']</td>
          </tr>
          <tr>
            <td>e.[属性名]</td>
            <td>要素の属性を取得</td>
            <td>e.link['href']</td>
          </tr>
          <tr>
            <td>e.string</td>
            <td>要素のテキスト</td>
            <td>e.title.string</td>
          </tr>
          <tr>
            <td>e.strings</td>
            <td>子や孫要素のテキスト一覧</td>
            <td>list(e.strings)[1:3]</td>
          </tr>
          <tr>
            <td>e.text</td>
            <td>子や孫要素含めたテキストを取得</td>
            <td>e.title.text</td>
          </tr>
        </table>
        <div class="br50"></div>
        <h3>ページ解析して表示されている画像をダウンロード</h3>
        <?php echo $img_download; ?>






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