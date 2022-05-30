<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~プルダウンメニューでリンク設定~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>プルダウンメニューでリンク設定</h1>
      <h2>選択されている項目を切り替える</h2>
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
      <li><a href="location.php">プルダウン</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>日本語のページ</h2>

      <form id="form">
        <select name="select">
          <option value="location.php">日本語</option>
          <option value="location-en.php">English</option>
          <option value="location-zh.php">中文</option>
        </select>
      </form>

      <h3>HTMLのプルダウンソースコード</h3>
      <pre><code class="prettyprint">&lt;form id=&quot;form&quot;&gt;
  &lt;select name=&quot;select&quot;&gt;
    &lt;option value=&quot;location.html&quot;&gt;日本語&lt;/option&gt;
    &lt;option value=&quot;location-en.html&quot;&gt;English&lt;/option&gt;
    &lt;option value=&quot;location-zh.html&quot;&gt;中文&lt;/option&gt;
  &lt;/select&gt;
&lt;/form&gt;</code></pre>
      <h3>JavaScriptのソースコードと解説</h3>
      <pre><code class="prettyprint">document.getElementById(&quot;form&quot;).select.onchange = function() {
  location.href = document.getElementById(&quot;form&quot;).select.value;
}</code></pre>

      onchangeは、フォームに入力された内容が変わった際に発生し、function以降の処理が実行されます。<br>
      <br>

      プルダウンメニューの場合&lt;option&gt;のvalue属性を調べるために、親要素である&lt;select&gt;のvalueプロパティを読み取る。<br>
      <br>

      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        location.href = 新しいURL
      </div>
      locationオブジェクトはURLを調べたり、閲覧履歴を管理する機能がある。<br>
      <br>
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
        <b>selected属性</b><br>
        選択項目にあたるプルダウンやラジオボタン、チェックボックスはselected属性をつけておくと、読み込み後に初めから選択された状態となる。<br>
        <br>
        &lt;option value="index.html" <b>selected</b>&gt;日本語&lt;/option&gt;
      </div>
      ※selected属性は値のないプール属性の為、下記ソースコードにより、初めからプルダウンメニュー項目が選択された状態にします！！<br>
      ちなみにプール属性とはselectedやcheckedなどのその属性があれば有効、なければ無効となるものを言う。


      <pre><code class="prettyprint">var lang = document.querySelector(&quot;html&quot;).lang;

var opt;
  if (lang === &quot;ja&quot;) {
  opt = document.querySelector(&#039;option[value=&quot;location.html&quot;]&#039;);
} else if (lang === &quot;en&quot;) {
  opt = document.querySelector(&#039;option[value=&quot;location-en.html&quot;]&#039;);
} else if (lang === &quot;zh&quot;) {
  opt = document.querySelector(&#039;option[value=&quot;location-zh.html&quot;]&#039;);
}
opt.selected = true;</code></pre>

      <h4>document.querySelectorメソッド</h4>

      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        document.querySelector(&#039;CSSセレクター&#039;)
      </div>
      JavaScriptで要素を取得するのに、CSSセレクターが使える。<br>
      ソースコードではoptionタグのうち、value属性が”html”のパラメーターにマッチしています。<br>
      <br>
      ※CSSセレクターを使うことで、複数の要素にマッチする可能性がありますが、querySelectorメソッドは「最初にマッチした要素」1つだけを取得する。<br>
      <br>
      location.html「指定した日本語のページ」が開いているときは、変数langに"ja"が保存されている。最初のif文でtrueになり、変数optに<b>&lt;option
        value=&quot;location.html&quot;&gt;日本語&lt;/option&gt;</b>が代入される。<br>
      <br>
      そして、最後に変数optに代入されている要素にselected属性を追加する。


    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="../scripts/location.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>