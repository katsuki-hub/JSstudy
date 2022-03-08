<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~バインド~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "バインドする" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="bind.php">バインド</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h4>テキストにバインド</h4>
        <div class="frame3">
          HTMLのテキスト部分にマスタッシュで{{プロパティ名}}を記述すると、アプリケーションのdataオプションに定義したプロパテイの値が、その場所に置き換わって出力される
          <div class="frame2">
            <b>三項演算子</b>
            <hr>
            条件式 ? 条件式が成立した場合に実行する式 : 条件式が不成立の場合に実行する式
          </div>
          三項演算子はif~else文と等価の条件分岐です。
        </div>

        <h4>属性にバインド</h4>
        <div class="frame3">
          バインドしたいデータのプロパティ名を属性の値に記述し、属性名の前に「v-bind:」を付ける
          <div class="frame2">
            &lt;要素名 v-bind:属性名=&quot;プロパティ名&quot;&gt;
          </div>
          ※{{...}}マスタッシュ構文は要素内容にバインドする場合にだけ使用できます。その為、属性にバインドしたいときは{{...}}で囲まないこと！
        </div>

        <h4>style属性にバインド</h4>
        <div class="frame3">
          要素に直接スタイルシートを指定する場合､style="CSSプロパティ名:値:"と記述しますが、Vue.jsのデータをバインドするときは、 CSSプロパティ名をキャメルケースに置き換え、値にはバインドしたいアプリケーションのプロパティ名を記述する。
          <div class="frame2">
            &lt;要素名 v-bind:style="{cssのプロパティ名: アプリケーションのプロパティ名}"&gt;
          </div>
          <b>CSSのプロパティ名はキャメルケースで記述</b>
          <hr>
          ハイフンを使わずに2つ目以降の単語だけ先頭大文字にして連結する方法を<b>キャメルケース</b>と呼ぶ。CSSのプロパティ名はこの記述にしなければならない！<br>またスタイルをまとめて指定する際はカンマ区切りです。この構文はJavaScriptのオブジェクト表記です。
        </div>

        <h4>class属性にバインド</h4>
        <div class="frame3">
          style属性にバインドする場合との違いは、オブジェクトの値が「そのclass名を出力するための条件を表す」という点です。
          <div class="frame2">
            &lt;要素名 v-bind:class="{class名: class名を出力する条件式}"&gt;
          </div>
        </div>

        <h4>リストデータをバインド</h4>
        <div class="frame3">
          リストとは複数のデータを1つにまとめて扱いやすくしたもので、 JavaScriptでは配列を使って表します。v-forを使うと、要素に配列データをバインドできます。
          <div class="frame2">
            ｃ要素名 v-for="配列要素を代入する変数名 in 配列の変数名"&gt;...&lt;/要素名&gt;
          </div>
          v-forの一つ目の変数は何でもいいが、一般的には、 itemやelement、 eleのように、それが配列要素であることがわかる抽象的な変数名が使われることが多いようです。
        </div>

        <h4>条件付きで描画</h4>
        <h5>〇条件式が成立するときだけ要素を出力</h5>
        <div class="frame3">
          v-ifを記述した要素は、指定した条件式が成立する場合だけDOMに出力され、条件式が成立しない場合はDOMに出力されない。
          <div class="frame2">
            &lt;要素名 v-if="条件式"&gt;条件式が成立する場合の出力内容&lt;/要素名&gt;
          </div>
        </div>
        <h5>〇複数の条件式を指定</h5>
        <div class="frame3">
          2つ以上の条件式に応じて出力内容を分岐させたい場合は v-else-if および v-else を使う
          <div class="frame2">
            &lt;要素名 v-if="条件式"&gt;条件式が成立する出力内容&lt;/要素名&gt;<br>
            &lt;要素名 v-else&gt;条件式が不成立の出力内容&lt;/要素名&gt;
          </div>
          <div class="frame2">
            &lt;要素名 v-if="条件式1"&gt;条件式1が成立する出力内容&lt;/要素名&gt;<br>
            &lt;要素名 v-else-if="条件式2"&gt;条件式2が成立する出力内容&lt;/要素名&gt;<br>
            &lt;要素名 v-else&gt;条件式1も条件式2も不成立の出力内容&lt;/要素名&gt;
          </div>
        </div>
        <h5>〇条件式が成立する場合だけ要素を表示</h5>
        <div class="frame3">
          v-showを記述した要素は、折定した条件式が成立する場合だけ表示され、不成立の場合は表示されません。
          <div class="frame2">
            &lt;要素名 v-show="条件式"&gt;条件式が成立する出力内容&lt;/要素名&gt;
          </div>
          ・要素はDOMに出力される (CSSのdisplay:none;で非表示になるだけ)<br>
          ・v-else-ifやv-elseと組み合わせることはできない<br>
          ・&lt;template v-show=&quot;...&quot;&gt;&lt;/template&gt;と記述することはできない
        </div>
        <div class="frame1">
          <b>v-ifとv-show</b>
          <hr>
          DOMの更新はブラウザにとって負担が大きい為、タブで表示内容を切り替えるような場面で v-if を使うと、タブを切り替えるたびにノードの追加と削除が発生してしまうので、 v-show を使ったほうが商速な描画が期待できます。
        </div>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>