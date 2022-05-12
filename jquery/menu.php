<!doctype html>
<html lang="ja">

<head>
  <?php $title = "jQuery編~目次やサブメニューを開閉させよう~"; ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  .submenu h3 {
    padding: 1rem 2rem;
    border-left: 6px double #000;
    margin: 0 0 1em 0;
    font-size: 16px;
    cursor: pointer;
    color: coral;
  }

  .submenu h3:after {
    display: none;
  }

  .submenu h3:hover {
    color: rgb(201, 162, 148);
    text-decoration: underline;
  }

  .submenu ul {
    margin: 0 0 1rem 0;
    list-style-type: none;
    font-size: 14px;
  }

  .hidden {
    display: none;
  }
  </style>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>目次やサブメニューを開閉</h1>
      <h2>クリックするとサブメニューが開く</h2>
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
      <li><a href="menu.html">サブメニュー</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>メニューをクリックしてサブメニューを開こう</h2>
        <div class="sidebar">
          <div class="submenu">
            <h3>JavaScriptの学習ページ</h3>
            <ul class="hidden">
              <li><a href="../javascript/current_time.html">現在時刻</a></li>
              <li><a href="../javascript/countdown.html">残り時間の計算</a></li>
              <li><a href="../javascript/array.html">配列</a></li>
              <li><a href="../javascript/object.html">オブジェクト</a></li>
            </ul>
          </div>
          <div class="submenu">
            <h3>jQueryの学習ページ</h3>
            <ul class="hidden">
              <li><a href="menu.html">目次やサブメニューを開閉させる</a></li>
              <li><a href="box.html">ボックス開閉アニメーション</a></li>
              <li><a href="ajax.html">ajaxとJson</a></li>
            </ul>
          </div>
        </div>

        <br><br><br>
        <h3>HTMLのソースコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;div class=&quot;sidebar&quot;&gt;
  &lt;div class=&quot;submenu&quot;&gt;
    &lt;h3&gt;JavaScriptの学習帳ページ&lt;/h3&gt;
    &lt;ul class=&quot;hidden&quot;&gt;
      &lt;li&gt;&lt;a href=&quot;current_time.html&quot;&gt;現在時刻～リアルタイム表示～&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;countdown.html&quot;&gt;残り時間の計算～カウントダウンタイマー～&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;array.html&quot;&gt;配列～項目リストの表示&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;object.html&quot;&gt;オブジェクト～複数データを1つの変数で管理～&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;div class=&quot;submenu&quot;&gt;
  &lt;h3&gt;jQueryの学習ページ&lt;/h3&gt;
    &lt;ul class=&quot;hidden&quot;&gt;
      &lt;li&gt;&lt;a href=&quot;menu.html&quot;&gt;目次やサブメニューを開閉させる&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;menu.html&quot;&gt;目次やサブメニューを開閉させる&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;menu.html&quot;&gt;目次やサブメニューを開閉させる&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
        <!-- /ソースコード -->

        <h3>JavaScriptのソースコードと概要</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;script src=&quot;https://code.jquery.com/jquery-3.6.0.min.js&quot;
          integrity=&quot;integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;
&lt;script&gt;
  $(document).ready(function () {
    $(&quot;.submenu h3&quot;).on(&quot;click&quot;, function () {
      $(this).next().toggleClass(&quot;hidden&quot;);
    });
  });
&lt;/script&gt;</code></pre>

        <h3>CSS</h3>
        <pre><code class="prettyprint">.hidden {
  display: none;
}
</code></pre>

        <!-- /ソースコード -->

        <h4>パターン化されたされたjQueryのプログラム</h4>
        ⓵ イベント設定したい要素の取得<br>
        ⓶ その要素にイベントを設定<br>
        ➂ イベントが発生した時の処理を実行<br><br>
        この順序で書かれることがほとんど！！<br>
        今回は&lt;h3&gt;がクリックされたら、&lt;ul&gt;に適用されたdisplayプロパティをblockにしたり、noneにしています。
        <h4>jQueryの読み込み</h4>
        <a href="https://code.jquery.com">https://code.jquery.com/</a><br>
        このページのオープンソースから読み取り用のscriptタグをコピーして作業中のプログラムにペーストする！

        <h4>処理の流れ</h4>
        <div class="frame1">
          $(document).ready(function () {<br>
          ……<br>
          });
        </div>
        HTMLが読み込まれたら、functionの{~}の処理をすると言う意味です。<br><br><br>
        <div class="frame2">
          $(".submenu h3")
        </div>
        $()メソッドは、jQueryを使わないJavaScriptで言えば、document.querySelectorAllメソッドと同じ動きをします。<br>
        ()内のパラメータにCSSセレクタを含めておけばマッチする全ての要素をHTMLから取得します。<br><br>

        <div class="frame2">
          $("セレクタ")
        </div>
        $()メソッドもquerySelectorAllメソッドも「全ての要素を取得する」は同じですが、その後が違います。<br><br>
        <table border="1">
          <tr>
            <th>querySelectorAll</th>
            <td>セレクタにマッチしたすべての要素が配列のような形になって取得される</td>
          </tr>
          <tr>
            <th>$()</th>
            <td>要素を「jQueryオブジェクト」という独自のオブジェクトに変換する</td>
          </tr>
        </table><br><br>

        <div class="frame2">
          $(".submenu h3").on("click", function () {
        </div>
        onは、イベントを設定するjQuery設定するのメソッドです。<br>
        onメソッドのパラメーターは2つ<br>
        <div class="frame1">
          onclickイベント ⇒ "click"<br>
          onsubmitイベント ⇒ "submit"
        </div>
        <h4>イベント設定</h4>
        <div class="frame1">
          $()で取得した要素.on("イベント名", function () {<br>
          イベントが発生した時の処理<br>
          }
        </div>
        jQueryでは、$()で取得された要素が複数ある場合、そのすべてにメソッドを実行するので、繰り返しfor文を書かなくてもよい<br><br>

        <div class="frame1">
          $(this)
        </div>
        セレクタではなくthisになっている。これは「イベントが発生した要素」を指している。<br>※thisをjQueryオブジェクトに変換<br><br>

        <div class="frame1">
          $(this)<a class="red">.next()</a>
        </div>
        イベントが発生したすぐ次の要素を取得するjQueryメソッド。<br>ここでは、&lt;h3&gt;のすぐ次にある&lt;ul&gt;が取得されます。<br><br>

        <div class="frame1">
          $(this).next()<a class="red">.toggleClass("hidden");</a>
        </div>
        toggleClassメソッドは、取得した要素に()内のパラメーターで指定されているクラス名がついていなければ追加し、ついていれば削除します。<br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {
    $(".submenu h3").on("click", function() {
      $(this).next().toggleClass("hidden");
    });
  });
  </script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>