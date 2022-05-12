<!doctype html>
<html lang="ja">

<head>
  <?php $title = "jQueryでよく使うメソッド"; ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>jQuery</h1>
      <h2>よく使うメソッド</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_jquery.php"); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="jquerymethod.html">jQueryメソッド</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>よく使うjQueryメソッド</h2>
        <table border="1" class="method">
          <tr bgcolor="pink">
            <th>メソッド</th>
            <th>概要</th>
          </tr>
          <tr>
            <td>$(&#039;セレクタ&#039;)</td>
            <td>セレクタにマッチする要素を全て取得する</td>
          </tr>
          <tr>
            <td>$(配列またはオブジェクト)</td>
            <td>配列のデータやオブジェクトのプロパティをすべて取得する</td>
          </tr>
          <tr>
            <td>$.ajax()</td>
            <td>非同期通信をする</td>
          </tr>
          <tr>
            <td>.next</td>
            <td>すぐ次の弟要素を取得する</td>
          </tr>
          <tr>
            <td>.find</td>
            <td>子孫要素のうちセレクタにマッチする要素をすべて取得する</td>
          </tr>
          <tr>
            <td>.children(&#039;セレクタ&#039;)</td>
            <td>子要素をすべて取得する。パラメーターにセレクタが含まれている場合、子要素のうちそのセレクタにマッチするときだけ取得する</td>
          </tr>
          <tr>
            <td>.each(function(){...})</td>
            <td>取得したすべての要素や配列のデータなどに｛...｝を実行する</td>
          </tr>
          <tr>
            <td>.parent(&#039;セレクタ&#039;)</td>
            <td>親要素を取得する。パラメーターにセレクタが含まれている場合、親要素がそのセレクタにマッチするときだけ取得する</td>
          </tr>
          <tr>
            <td>.siblings()</td>
            <td>兄弟要素をすべて取得する</td>
          </tr>
          <tr>
            <td>.prev()</td>
            <td>すぐ前の兄要素を取得する</td>
          </tr>
          <tr>
            <td>.addClass(&#039;クラス&#039;)</td>
            <td>クラスを追加する</td>
          </tr>
          <tr>
            <td>.removeClass(&#039;クラス&#039;)</td>
            <td>クラスを削除する</td>
          </tr>
          <tr>
            <td>.toggleClass(&#039;クラス&#039;)</td>
            <td>取得した要素にクラスがあれば削除、なければ追加する</td>
          </tr>
          <tr>
            <td>.text(&#039;テキスト&#039;)</td>
            <td>テキストコンテンツを追加する（書き換える）</td>
          </tr>
          <tr>
            <td>.text</td>
            <td>テキストコンテンツを読み取る</td>
          </tr>
          <tr>
            <td>.hasClass(&#039;クラス&#039;)</td>
            <td>取得した要素にクラスがあるかどうかを調べる</td>
          </tr>
          <tr>
            <td>.prepend(要素)</td>
            <td>取得した要素に子要素を挿入する。すでに子要素がある場合はそれよりも前に挿入する</td>
          </tr>
          <tr>
            <td>.append(要素)</td>
            <td>>取得した要素に子要素を挿入する。すでに子要素がある場合はそれよりも後に挿入する</td>
          </tr>
          <tr>
            <td>.attr(&#039;属性名&#039;,&#039;値&#039;)</td>
            <td>要素の属性に値を設定する</td>
          </tr>
          <tr>
            <td>.attr(&#039;属性名&#039;)</td>
            <td>要素の属性の値を読み取る</td>
          </tr>
          <tr>
            <td>.remove()</td>
            <td>要素を削除する</td>
          </tr>
          <tr>
            <td>.slideDown(スピード)</td>
            <td>取得した要素を表示する</td>
          </tr>
          <tr>
            <td>.slideUp(スピード)</td>
            <td>取得した要素を非表示にする</td>
          </tr>
          <tr>
            <td>.slideToggle(スピード)</td>
            <td>取得した要素が表示されていれば非表示に、表示されていなければ表示させる</td>
          </tr>
          <tr>
            <td>.on((&#039;イベント&#039;).function(){...})</td>
            <td>イベントを設定する</td>
          </tr>
          <tr>
            <td>event.preventDefault()</td>
            <td>イベントの基本動作をキャンセルする</td>
          </tr>
        </table>


      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>JavaScript Samples</footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>