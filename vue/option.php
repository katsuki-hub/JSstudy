<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~オプションの構成と役割~" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  .ball {
    position: fixed
  }
  </style>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "オプションの構成と役割" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="option.php">オプション構成</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクトの設計図とインスタンス</h2>
        <div class="frame3">
          オブジェクトが持つプロパティやメソッドの振る舞いを定義した設計図のようなものを一つだけ作っておいて、それを複製すれば全く同じオブジェクトを幾つでも作成できるようになる。<br>この様な考え方を<b>オブジェクト指向</b>と呼び、オブジェクトの設計図となる定義を<b>クラス</b>と呼びます。<br>クラスを元に生成したオブジェクトを<b>インスタンス</b>でインスタンスを生成することを<b>インスタンス化</b>と呼ぶ。
        </div>
        <div class="frame2">
          <b>クラスのインスタンス生成</b>
          <hr>
          var obj = new クラス名(引数);<br><br>
          このようにインスタンスを生成する特別な役割を持つ関数を<b>コンストラクタ(構築する人やモノ)</b>と呼ぶ。
        </div>
        <div class="br50"></div>
        <h4>ランダムな位置に20個の☆を描画</h4>
        <h3>JavaScriptコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">//「動くモノ」クラスの定義
  var Movable = function(x, y) {
    this.pos = {
      x: x,
      y: y
    };
    this.move = function(x, y) {
      this.pos.x += x;
      this.pos.y += y;
    };
  }

  //ボールオブジェクトを格納する空の配列を用意する
  var ball = [];

  //100個分の繰り返し
  for (var i = 0; i &lt;= 20; i++) {
    //ボールプロジェクトのインスタンス生成
    ball[i] = new Movable(
      Math.floor(Math.random() * window.innerWidth),
      Math.floor(Math.random() * window.innerHeight)
    );
  }

  //ボールをブラウザに描画
  for (var i = 0; i &lt;= 20; i++) {
    document.write(&#039;&lt;div class = &quot;ball&quot; style = &quot;top: &#039; + ball[i].pos.y + &#039;px; left:&#039; + ball[i].pos.x + &#039;px;&quot;&gt;☆&lt;/div&gt;&#039;);
  }
</code></pre>
        <h3>CSSコード</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">.ball {
      position: fixed
    }
</code></pre>
        <div class="br50"></div>
        <h4>vueオプションの構成</h4>
        <div class="frame1">
          Vue.jsでは単体のオブジェクトを<b>コンポーネント</b>と呼び、1つ以上のコンポーネント組み合わせたものがアプリケーションであると考えます。<br>
          Vue.jsアプリケーションは<b>new
            Vue({...})</b>でコンポーネントを生成することで始まります。Vueはフレームワーク側で定義されているクラスでコンポーネントの中で使うデータやメソッドはあらかじめ引数として渡します。
          <div class="frame2">
            var obj = new Vue({オブジェクト});
          </div>
        </div>
        <h4>Vueのコンポーネントが持てる主なプロパティ</h4>
        <table border="5">
          <tr>
            <th>プロパティ</th>
            <th>役割</th>
          </tr>
          <tr>
            <td>el</td>
            <td>コンポーネントのインスタンスをどのHTML要素に結びつけるかを定義する</td>
          </tr>
          <tr>
            <td>data</td>
            <td>コンポーネントが保持するデータを定義する</td>
          </tr>
          <tr>
            <td>methods</td>
            <td>コンポーネントが持つメソッドを定義する</td>
          </tr>
          <tr>
            <td>filters</td>
            <td>コンポーネントが持つフィルターを定義する</td>
          </tr>
          <tr>
            <td>computed</td>
            <td>コンポーネントが持つ算出プロパティを定義する</td>
          </tr>
          <tr>
            <td>watch</td>
            <td>コンポーネントが持つウォッチャを定義する</td>
          </tr>
          <tr>
            <td>※注</td>
            <td>コンポーネントのライフルハックを定義する</td>
          </tr>
        </table>
        <div class="frame2">
          var app = new Vue({プロパティ名: 値, プロパティ名: 値,...});
        </div>
        <h4>コンポーネントのライフサイクルハック</h4>
        <table border="5">
          <tr>
            <th>ハック名</th>
            <th>発生するタイミング</th>
          </tr>
          <tr>
            <td>beforeCreate</td>
            <td>コンポーネントのインスタンスが生成された直後</td>
          </tr>
          <tr>
            <td>created</td>
            <td>コンポーネントのインスタンスが生成され、Vueがコンポーネントのリアクティブデータを監視する準備が終わったとき</td>
          </tr>
          <tr>
            <td>beforeMount</td>
            <td>コンポーネントのインスタンスがDOMと結びつく直前</td>
          </tr>
          <tr>
            <td>mounted</td>
            <td>コンポーネントのインスタンスがDOMと結びついた直後</td>
          </tr>
          <tr>
            <td>beforeUpdate</td>
            <td>コンポーネントの持つリアクティブデータが更新され、DOMに反映される直前</td>
          </tr>
          <tr>
            <td>updated</td>
            <td>コンポーネントの持つリアクティブデータが更新され、DOMに反映された直後</td>
          </tr>
          <tr>
            <td>beforeDestroy</td>
            <td>コンポーネントのインスタンスが破棄される直前</td>
          </tr>
          <tr>
            <td>destroyed</td>
            <td>コンポーネントのインスタンスが破棄された直後</td>
          </tr>
        </table>
        <div class="frame2">
          コンポーネントのデータを初期化したいとき、サーバーからデータを読み込むような複雑な処理が必要な場合にcreatedライフサイクルハックに初期化処理を記述する
        </div>
        <div class="frame1">
          ●ディレクティブ
          <hr>
          コンポーネントを結びつけたHTML要素はVueの監視下に置かれ「v-」ではじまる独自
          の属性を併用することによって、様々な機能が利用できます｡これらを<b>ディレクティブ</b>と呼びます<br><br>
          ●スコープ
          <hr>
          プログラム内で扱うデータには有効範囲があります。たとえば関数の中で宣言した変数は、
          関数の外側のプログラムからは参照できません。関数の中でのみ有効なスコープをローカルスコープ、関数の外側のどこからでも参照できるスコープをグローバルスコープと呼びます。
        </div>
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

  <script>
  //「動くモノ」クラスの定義
  var Movable = function(x, y) {
    this.pos = {
      x: x,
      y: y
    };
    this.move = function(x, y) {
      this.pos.x += x;
      this.pos.y += y;
    };
  }

  //ボールオブジェクトを格納する空の配列を用意する
  var ball = [];

  //100個分の繰り返し
  for (var i = 0; i <= 20; i++) {
    //ボールプロジェクトのインスタンス生成
    ball[i] = new Movable(
      Math.floor(Math.random() * window.innerWidth),
      Math.floor(Math.random() * window.innerHeight)
    );
  }

  //ボールをブラウザに描画
  for (var i = 0; i <= 20; i++) {
    document.write('<div class = "ball" style = "top: ' + ball[i].pos.y + 'px; left:' + ball[i].pos.x + 'px;">☆</div>');
  }
  </script>
</body>

</html>