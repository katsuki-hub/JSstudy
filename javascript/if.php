<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~if文～条件分岐で動作を変える~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>if文～条件分岐で動作を変える～</h1>
      <h2>確認ダイアログボックスを表示する</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_js.php"); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="index.php">HOME</a></li>
      <li><a href="../if.php">if文～条件分岐</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>占いの結果を確認</h2>

        <script>
        if (window.confirm("今日の運勢を占います、よろしいですか？")) {
          document.write("夢や、人生の目標を思い出せる日<br>普段の自分の才能や個性を信じて日々生きていってください");
        } else {
          document.write("運勢なんて必要ありませんね！<br>道は己の力で切りひらいてください");
        }
        </script>

        <h3>ソースコード解説</h3>

        <pre><code class="prettyprint">if (window.confirm(&quot;今日の運勢を占います、よろしいですか？&quot;)) {
  document.write(&quot;運勢結果&quot;);
} else {
  document.write(&quot;運勢なんて必要ありませんね&quot;);
}</code></pre>

        <h4>confirmメソッド</h4>
        <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
          window.confirm(メッセージ)
        </div>
        windowオブジェクトのconfirmメソッドで確認ダイアログボックスを表示します。<br>
        confirmメソッドは表示するだけで<b>リターン</b>を返してきます。

        <h4>if文</h4>

        <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
          if(条件式) {<br>
          条件式がtrueになるときに実行する処理<br>
          } else {<br>
          条件式がfalseになるときに実行する処理<br>
          }
        </div>
        ※条件式には色々なバリエーションがある。<br>
        ※falseの時に何も実行しない時は、else以降は省略することも出来る



      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>