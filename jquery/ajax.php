<!doctype html>
<html lang="ja">

<head>
  <?php $title = "jQuery編~AjaxとJson~"; ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  .list {
    overflow: hidden;
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  .list h2 {
    margin: 0 0 2em 0;
    font-size: 13px;
    text-align: center;
  }

  .gim {
    float: left;
    margin: 10px 10px 10px 10px;
    border: 1px solid #2bc23f;
    padding: 4px;
    width: 23%;
  }

  .check {
    margin: 0;
    padding: 8px;
    font-size: 12px;
    color: wheat;
    background-color: rgb(135, 50, 205);
    text-align: center;
    cursor: pointer;
  }

  .red {
    background-color: #e66289;
  }

  .green {
    background-color: #9ac76b;
  }
  </style>
  <script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
      .then((reg) => {
        console.log('Service worker registered.', reg);
      });
  }
  </script>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <div class="header-contents">
      <h1>予約状況のチェック</h1>
      <h2>ajaxとJson</h2>
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
      <li><a href="ajax.html">ajaxとJson</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>予約状況がチェックできるよ！</h2>
        JavaScriptの非同期通信であるAjaxで外部ファイルを読み込み、HTMLを表示させます。読み込むデータはJsonという形式で書かれます。<br><br>

        <ul class="list">
          <li class="gim" id="speed">
            <h2>スピードクライミング体験会</h2>
            <p class="check">予約状況を確認</p>
          </li>
          <li class="gim" id="bouldering">
            <h2>ボルダリング体験会</h2>
            <p class="check">予約状況を確認</p>
          </li>
          <li class="gim" id="lead">
            <h2>リードクライミング体験会</h2>
            <p class="check">予約状況を確認</p>
          </li>
        </ul>

        <h3>HTMLのソースコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint"> &lt;ul class=&quot;list&quot;&gt;
  &lt;li class=&quot;gim&quot; id=&quot;speed&quot;&gt;
    &lt;h2&gt;スピードクライミング体験会&lt;/h2&gt;
    &lt;p class=&quot;check&quot;&gt;予約状況を確認&lt;/p&gt;
  &lt;/li&gt;
  &lt;li class=&quot;gim&quot; id=&quot;bouldering&quot;&gt;
    &lt;h2&gt;ボルダリング体験会&lt;/h2&gt;
    &lt;p class=&quot;check&quot;&gt;予約状況を確認&lt;/p&gt;
  &lt;/li&gt;
  &lt;li class=&quot;gim&quot; id=&quot;lead&quot;&gt;
    &lt;h2&gt;リードクライミング体験会&lt;/h2&gt;
    &lt;p class=&quot;check&quot;&gt;予約状況を確認&lt;/p&gt;
  &lt;/li&gt;
&lt;/ul&gt;</code></pre>
        <!-- /ソースコード -->

        <h3>CSSのソースコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">.red {
  background-color: #e66289;
}
.green {
  background-color: #9ac76b;
}</code></pre>
        <!-- /ソースコード -->

        <h3>JavaScriptのソースコードと概要</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;script src=&quot;https://code.jquery.com/jquery-3.6.0.min.js&quot;
  integrity=&quot;sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;
&lt;script&gt;
  $(document).ready(function () {
    $.ajax({ url: &quot;data.json&quot;, dataType: &quot;json&quot; })
      .done(function (data) {
        $(data).each(function () {
          if (this.crowded === &quot;yes&quot;) {
            var idName = &quot;#&quot; + this.id;
            $(idName).find(&quot;.check&quot;).addClass(&quot;crowded&quot;);
          }
        });
      })
      .fail(function () {
        window.alert(&quot;読み込みエラー&quot;);
      });
    $(&quot;.check&quot;).on(&quot;click&quot;, function () {
      if ($(this).hasClass(&quot;crowded&quot;)) {
        $(this).text(&quot;残りわずか&quot;).addClass(&quot;red&quot;);
      } else {
        $(this).text(&quot;予約空いています&quot;).addClass(&quot;green&quot;);
      }
    });
  });
&lt;/script&gt;</code></pre>
        <!-- /ソースコード -->

        <h4>Ajaxによるファイルの読み込み</h4>
        ページのリンクをクリックすると、ページをWebサーバーからダウンロードしますが、Ajaxはページを切り替えることなくWebサーバーとデータの送受信をするJavaScriptの機能です。<br>これにより、画面の一部だけを書き換えることが出来るようになります。<br><br>

        <h4>Ajaxの基本形</h4>
        <div class="frame1">
          $.ajax({ url: &quot;data.json&quot;, dataType: &quot;json&quot; })<br>
          .done(function (data) {<br>
          　　データがダウンロードできた時の処理<br>
          })<br>
          .fail(function () {<br>
          　　データがダウンロードできなかった時の処理<br>
          });
        </div>
        AjaxはjQeryを使った方が簡単に記述できます。<br>
        今回設定しているのは「url」と「datatype」の2種類<br>
        ダウンロードしたいデータの形式や通信するWebサーバーによってこの設定内容は変わります。<br><br>

        <h4>JSON</h4>
        <div class="frame2">
          [<br>
          {&quot;id&quot;:&quot;speed&quot;,&quot;crowded&quot;:&quot;yes&quot;},
          {&quot;id&quot;:&quot;bouldering&quot;,&quot;crowded&quot;:&quot;no&quot;},
          {&quot;id&quot;:&quot;lead&quot;,&quot;crowded&quot;:&quot;no&quot;}<br>
          ]
        </div>
        JSONはJavaScriptの配列のオブジェクトの文法を取り入れたデータ形式です。<br><br>
        ※書式上の注意点<br>
        <ul>
          <li>値だけでなくプロパティ名もダブルクォートで書く必要がある</li>
          <li>シングルクォートではなく、ダブルクォートで囲む必要がある</li>
        </ul>
        <br>
        <h4>クリックされた後の処理</h4>
        <div class="frame1 ">
          if ($(this).hasClass(&quot;crowded&quot;)) {<br>
          $(this).text(&quot;残りわずか&quot;).addClass(&quot;red&quot;);<br>
          } else {<br>
          $(this).text(&quot;予約空いています&quot;).addClass(&quot;green&quot;);<br>
          }
        </div>
        redクラスまたはgreenクラスが追加される事により、この&lt;p&gt;にCSSが適用されます。

        <h4>Ajaxの応用</h4>
        <p>実際のWebサイトでは、このデータをサーバーサイドで生成することで、最新の情報を受け取れるようにします。<br>注意点として、データの送受信は原則として、同一のオリジン内に限られます。</p>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {
    $.ajax({
        url: "data.json",
        dataType: "json"
      })
      .done(function(data) {
        $(data).each(function() {
          if (this.crowded === "yes") {
            var idName = "#" + this.id;
            $(idName).find(".check").addClass("crowded");
          }
        });
      })
      .fail(function() {
        window.alert("読み込みエラー");
      });
    $(".check").on("click", function() {
      if ($(this).hasClass("crowded")) {
        $(this).text("残りわずか").addClass("red");
      } else {
        $(this).text("予約空いています").addClass("green");
      }
    });
  });
  </script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>