<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~クッキーを使ってフォームの送信を1度だけにする~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>アンケート送信　１度しか送信できません！</h1>
      <h2>クッキーの読み・書き・削除</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_js.php"); ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="cookie.php">クッキー</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>アンケートを送信してください</h2>
      <h3>『かつまるアウトドア部Log』を見てくれましたか？</h3>
      <form id="form" action="thanks.html">
        <input type="radio" name="answer">興味がない<br>
        <input type="radio" name="answer">これから見る予定<br>
        <input type="radio" name="answer">たまに見ている<br>
        <input type="radio" name="answer">とても気に入って見ている<br>
        <input type="submit" name="送信する" id="submit"><br>
      </form>
      <br>
      <button id="remove">クッキー削除</button>
      <br><br>
      <h3>HTMLのソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;form id=&quot;form&quot; action=&quot;thanks.html&quot;&gt;
  &lt;input type=&quot;radio&quot; name=&quot;answer&quot;&gt;興味がない&lt;br&gt;
  &lt;input type=&quot;radio&quot; name=&quot;answer&quot;&gt;これから見る予定&lt;br&gt;
  &lt;input type=&quot;radio&quot; name=&quot;answer&quot;&gt;たまに見ている&lt;br&gt;
  &lt;input type=&quot;radio&quot; name=&quot;answer&quot;&gt;とても気に入って見ている&lt;br&gt;
  &lt;input type=&quot;submit&quot; name=&quot;送信する&quot; id=&quot;submit&quot;&gt;&lt;br&gt;
&lt;/form&gt;
&lt;br&gt;
&lt;button id=&quot;remove&quot;&gt;クッキー削除&lt;/button&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">document.getElementById(&quot;form&quot;).onsubmit = function () {
  if (Cookies.get(&quot;answered&quot;) === &quot;yes&quot;) {
    window.alert(&quot;回答済みです。アンケートの回答は1回だけです。&quot;);
    return false;
  } else {
    Cookies.set(&quot;answered&quot;, &quot;yes&quot;, { expires: 3 });
  }
};

//クッキー削除プログラム
document.getElementById(&quot;remove&quot;).onclick = function () {
  Cookies.remove(&quot;answered&quot;);
};</code></pre>
      <!-- /ソースコード -->

      <h4>ライブラリーから読み取り</h4>
      今回はクッキーを操作するので、オープンソースでも提供されているjs-cookieライブラリーを利用しています。<br>クッキーの操作もそうですが、定型的でよく使用される処理はライブラリーから読み取ることで、複雑なコードを書く必要がなくなり、メソッド1つで実行してくれます。
      <h4>JavaScriptの中身</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        document.getElementById("form").onsubmit = function () {<br>
        　送信ボタンがクリックされると実行<br>
        };
      </div>
      Cookies.getメソッドは、読み込んだjs-cookieライブラリーが提供している機能で()内に指定されたクッキーの値を読み取ります。<br><br>
      if文のtrue実行後、return falseで基本動作をキャンセルし、thanksページへ移行しないようにしています。
      <h4>クッキーに変数をセット</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        Cookies.set("クッキー名", "値", { expires: 有効期限 });
      </div>
      これもjs-cookieライブラリーが提供するメソッドです。<br>
      クッキーのデータには有効期限があり、今回は3日に設定しています。それ以降はクッキーデータが消えてしまいます。<br>
      ※設定をしないとブラウザを閉じた瞬間に消える！<br>


    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="../scripts/js.cookie.js"></script>
  <script>
  document.getElementById("form").onsubmit = function() {
    if (Cookies.get("answered") === "yes") {
      window.alert("回答済みです。アンケートの回答は1回だけです。");
      return false;
    } else {
      Cookies.set("answered", "yes", {
        expires: 3
      });
    }
  };

  document.getElementById("remove").onclick = function() {
    Cookies.remove("answered");
  };
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>