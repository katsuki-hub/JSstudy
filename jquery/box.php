<!doctype html>
<html lang="ja">

<head>
  <?php $title = "jQuery編~ボックス開閉アニメーション~"; ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  #boxmenu2 {
    display: none;
    margin: 0 auto 0 auto;
    max-width: 960px;
    background-color: rgb(255, 242, 206);
  }

  #boxmenu2 ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  #boxmenu2 li {
    padding: 8px 0 8px 15px;
    border-bottom: 1px solid #ffffff;
  }

  .header-contents {
    position: relative;
  }

  #box_btn2 {
    position: absolute;
    top: 40px;
    right: 5px;
    border-radius: 20px;
    padding: 6px 20px 6px 20px;
    background-color: #fff;
    cursor: pointer;
  }
  </style>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="boxmenu2">
    <ul>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="jquerymethod.php">よく使うjQueryメソッド</a></li>
      <li><a href="trigger.php">jQueryが動くきっかけの記述</a></li>
      <li><a href="menu.php">目次やサブメニューを開閉させる</a></li>
      <li><a href="box.php">ボックス開閉アニメーション</a></li>
      <li><a href="ajax.php">ajaxとJson</a></li>
    </ul>
  </div>
  <header>
    <div class="header-contents">
      <h1>jQuery編”ボックスを開く・たたむ</h1>
      <h2>アニメーション機能のjQuery</h2>
      <div id="box_btn2">MENU</div>
    </div><!-- /.header-contents -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="box.html">アニメーション</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>メニュータブをクリック！アニメーションしながら開くよ</h2>
        まずは開いた状態をHTML・CSSで作成後、さらにCSSでボックスが畳まれた状態にしておく！<br>そこからjQueryでプログラムを書きます。

        <h3>CSSのソースコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint"> #boxmenu {
  margin: 0 auto 0 auto;
  display: none;
  max-width: 960px;
}

#boxmenu ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#boxmenu li {
  padding: 8px 0 8px 15px;
  border-bottom: 1px solid #ffffff;
}

.header-contents {
  position: relative;
}

#box_btn {
  position: absolute;
  top: 40px;
  right: 5px;
  border-radius: 20px;
  padding: 6px 20px 6px 20px;
  background-color: #fff;
  cursor: pointer;
}</code></pre>
        <!-- /ソースコード -->

        <h3>JavaScriptのソースコードと概要</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;script src=&quot;https://code.jquery.com/jquery-3.6.0.min.js&quot;
  integrity=&quot;sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;
&lt;script&gt;
  $(document).ready(function () {
    $(&quot;#box_btn&quot;).on(&quot;click&quot;, function () {
      $(&quot;#boxmenu&quot;).slideToggle();
    });
  });
&lt;/script&gt;</code></pre>
        <!-- /ソースコード -->

        <h4>クリックイベント設定</h4>
        <div class="frame2">
          $("#box_btn").on("click", function () {
        </div>
        クリックイベント発生後に実行されるファンクションに、今回のアニメーションを書く<br><br>
        <div class="frame2">
          $("#boxmenu").slideToggle();
        </div>
        slideToggleはjQueryのメソッドで、取得している要素のボックスが閉じているときは開き、開いているときは閉じます。その際に縦方向にアニメーションします。<br><br>
        <div class="frame1">
          $()で取得した要素.slideToggle(スピード)
        </div><br><br>
        <div
          style="padding: 10px; margin-bottom: 10px; border: 3px solid #333333; font-size: 13px; border-radius: 20px; background-color: wheat;">
          javaScriptが搭載されていないブラウザやjavaScriptをオフにしていると非表示コンテンツを閲覧させる術がなくなります。<br>
          対処法として<b>noscript</b>で囲んでjavaScriptが動作しない環境では表示された状態にしておき、どんな環境でも閲覧できるようにしておきます。このことを『アクセシビリティ』といいます。<br>
          display: none;　⇒　display: block;へ
        </div>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script>
  $(document).ready(function() {
    $("#box_btn2").on("click", function() {
      $("#boxmenu2").slideToggle();
    });
  });
  </script>
</body>

</html>