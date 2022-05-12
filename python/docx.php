<!doctype html>
<html lang="ja">

<head>
  <?php $title = "phython編~Word自動化~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "Word自動化" ?>
    <?php require_once "../common/header_python.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="docx.php">Word</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>契約書や送付状をテンプレで自動化</h2>
        <p>Word操作を自動化するためには、<b>python-docxモジュール</b>を利用するのでコマンドラインでインストールしておく。</p>
        <button type="button">コマンドライン</button>
        <div class="frame2">
          pip install python-docx
        </div>
        <h3>python-docxの基本的な使い方</h3>
        <?php
        require_once("pyCode.php");
        echo $word;
        ?>
        <div class="br50"></div>
        <h3>顧客ごとの契約書類など</h3>
        <p>
          「契約書template.docx」等のテンプレファイルを用意して「■今日の日時」等変更箇所のルール決めをしておけば顧客ごとのデータが複数の書類に渡って一瞬で作成可能になる。同じ入力を何度もしなくて良いし、誤入力も防げる！
        </p>
        <?php echo $keiyaku; ?>
        <h4>書式の設定</h4>
        <p>上記のプログラム実行では書式が削除されてしまいます。必要な個所は書式設定しておきましょう。</p>
        <table border="5">
          <tr>
            <th>要素</th>
            <th>説明</th>
            <th>利用例</th>
          </tr>
          <tr>
            <td>font</td>
            <td>フォントプロパティアクセス</td>
            <td>font = p.runs[0].font</td>
          </tr>
          <tr>
            <td>bold</td>
            <td>太字</td>
            <td>font.bold = True</td>
          </tr>
          <tr>
            <td>italic</td>
            <td>斜体</td>
            <td>font.italic = True</td>
          </tr>
          <tr>
            <td>underline</td>
            <td>下線</td>
            <td>font.underline = True</td>
          </tr>
          <tr>
            <td>size</td>
            <td>文字サイズ</td>
            <td>font.sizu = docx.shared.Pt(20)</td>
          </tr>
          <tr>
            <td>color.rgb</td>
            <td>文字色</td>
            <td>font.color.rgb = docx.shared.RGBColor(255,0,0)</td>
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