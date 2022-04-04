<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~コンポーネントの基本~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "コンポーネントの基本" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="component.php">コンポーネント</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>コンポーネントの定義</h2>
        <p>Vue.component()メソッドを実行するとグローバルスコープを登録したことになり、以後どこからでも利用できるようになります。</p>

        <div class="frame2">
          Vue.component('コンポーネントの名前',{コンポーネントのオプション});
        </div><br>
        <span class="mark">コンポーネント登録の注意点</span>
        <div class="frame1">
          <b>コンポーネントを読み込む順番に注意</b>
          <hr>
          Vue.filter()と同様にVue.component()などのグローバルメソッドはnew Vue()よりも先に実行しなければなりません。HTMLの読み込み順番に注意しよう。<br><br>
          <b>コンポーネントのdataオプション</b>
          <hr>
          {プロパティ名:値}形式のオブジェクトを返す関数として定義しなければならない<br><br>
          <b>templateオプションの制限事項</b>
          <hr>
          ・コンポーネントのテンプレートは単一のタグで囲まなければならない<br>
          ・&lt;template&gt;タグで囲むことは不可<br><br>
          <b>テンプレートを見やすく記述</b>
          <hr>
          テンプレート全体を「``」バッククォートで囲むと、テンプレート内で改行を含めることが出来ます<br><br>
          <b>コンポーネントを登録するスコープ</b>
          <hr>
          ・グローバルスコープに登録する場合はVue.component()メソッド<br>
          ・ローカルスコープに登録する場合は親コンポーネントのcomponentsオプションを使う<br><br>
          <b>親から子へデータを渡す手順</b>
          <hr>
          親:渡したいデータを子のカスタムタグの属性に指定する<br>
          子:親から受け取りたい属性名をpropsオプションに定義する<br><br>
          <b>HTMLコンテンツの制限</b>
          <hr>
          ・HTMLの使用により、多くのHTML要素は配置できる子要素に制限がある<br>
          ・制限のためカスタムタグが配置できない場合はis属性を使う
        </div>

        <h2>データの受け渡し</h2>
        <p>子コンポーネントから親コンポーネントへデータを渡す際は、親は子からデータを受け取る為のイベントハンドラを用意し、子は親にデータを渡したいタイミングで親のイベントハンドラを呼び出す方法を採る。<br>データはイベントハンドラの引数として渡す。</p>
        <div class="frame2">
          $emit('発生させたいイベント名' , イベントハンドラに渡すデー,,,,);
        </div>
        <small>※データを渡す必要がない場合は2つ目以降の引数を省略できる</small>

        <h3>子から親のイベントハンドラ呼び出し</h3>
        <div id="app">
          <my-product v-on:child-click="priceDown" v-bind:price="price"></my-product>
        </div>
        <div class="frame3">
          子の「値下げする」ボタンをクリックするたびに親のpriceが100づつ減少します。<br>priceはv-bindでこのカスタムタグにバインドしているのでクリックするたびに子のDOMが更新されます。
        </div>
        <h3>親のテンプレート</h3>
        <?php
        require_once("vueCode.php");
        echo $temp;
        ?>
        <h3>子コンポーネント</h3>
        <?php echo $child; ?>
        <h3>親コンポーネント</h3>
        <?php echo $parent; ?>
        <h4>コンポーネントのイベントハンドリング</h4>
        <div class="frame4">
          v-onディレクティブに.native修飾子を使用すると、子コンポーネントのどこをクリックしてもイベントが発生するようになります。<br>
          その場合はカスタムイベントを実装しなくてよい。ただし、子の特定の部分だけにイベントを発生させたい場合はこの方法は使えないので、$emit()を実装する必要がある！！
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
  <script src="../scripts/vue2.6.14.js"></script>
  <script src="../scripts/my-product.js"></script>
  <script src="../scripts/component.js"></script>
</body>

</html>