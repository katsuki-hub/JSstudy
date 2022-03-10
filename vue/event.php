<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~イベントハンドリング~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "イベントハンドリング" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="event.php">イベントハンドリング</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>ユーザーの操作を検知する</h2>
        <p>ブラウザの中で発生する出来事を<b>イベント</b>と呼び、イベントの発生をプログラムで検知して処理を行うことを<b>イベントハンドラー</b>と呼びます。</p>
        <h4>よく使われるイベント</h4>
        <table border="5">
          <tr>
            <th>イベント名</th>
            <th>発生タイミング</th>
          </tr>
          <tr>
            <td>blur</td>
            <td>フォーム要素からフォーカスが外れたとき</td>
          </tr>
          <tr>
            <td>focus</td>
            <td>フォーム要素にフォーカスが当たったとき</td>
          </tr>
          <tr>
            <td>select</td>
            <td>フォーム要素内のテキストが選択されたとき</td>
          </tr>
          <tr>
            <td>change</td>
            <td>フォーム要素の選択肢や入力内容が変更されたとき</td>
          </tr>
          <tr>
            <td>submit</td>
            <td>フォームを送信しようとしたとき</td>
          </tr>
          <tr>
            <td>reset</td>
            <td>フォームがリセットされたとき</td>
          </tr>
          <tr>
            <td>load</td>
            <td>画像やスクリプトなどのリソースの読み込みが完了したとき</td>
          </tr>
          <tr>
            <td>scroll</td>
            <td>要素の内容がスクロールしたとき</td>
          </tr>
          <tr>
            <td>resize</td>
            <td>ウィンドウのサイズが変更されたとき</td>
          </tr>
          <tr>
            <td>click</td>
            <td>要素をクリックしたとき</td>
          </tr>
          <tr>
            <td>keydown</td>
            <td>キーを押したとき</td>
          </tr>
          <tr>
            <td>keyup</td>
            <td>キーを放したとき</td>
          </tr>
          <tr>
            <td>keypress</td>
            <td>押していたキーを放したとき(keyupよりも先に発生)</td>
          </tr>
          <tr>
            <td>mousemove</td>
            <td>マウスカーソルが要素内で動いたとき</td>
          </tr>
          <tr>
            <td>mouseover</td>
            <td>マウスカーソルが要素内に入ったとき</td>
          </tr>
          <tr>
            <td>mousedown</td>
            <td>要素をマウスでクロックしたとき</td>
          </tr>
          <tr>
            <td>mouseout</td>
            <td>マウスカーソルが要素の外に出たとき</td>
          </tr>
          <tr>
            <td>mouseup</td>
            <td>要素内でマウスのボタンを放したとき</td>
          </tr>
          <tr>
            <td>touchstart</td>
            <td>要素を指でタッチしたとき</td>
          </tr>
          <tr>
            <td>touchmove</td>
            <td>要素をタッチした指でドラッグしたとき</td>
          </tr>
          <tr>
            <td>touchend</td>
            <td>ようそをタッチした指を放したとき</td>
          </tr>
        </table>
        <div class="br50"></div>
        <h4>イベントハンドラの登録(v-onディレクティブ)</h4>
        <div class="frame2">
          &lt;要素 v-on: イベント名=&quot;ハンドラ名&quot;&gt;<br><br>
          methods: {ハンドラ名: 関数オブジェクト}
        </div>
        <h3>クリックイベント</h3>
        <div id="app">
          <template v-if="stock >= 1">
            <span class="num">在庫はあと{{stock}}個</span>
            <button class="btn" v-on:click="onDeleteItem">削除ボタン</button>
          </template>
          <template v-else>在庫切れです</template>
        </div>
        <h3>HTML</h3>
        <?php
        require_once("vueCode.php");
        echo $click;
        ?>
        <h3>JavaScript</h3>
        <?php echo $clickDel; ?>
        <div class="br50"></div>
        <h2>コンポーネントの外側のイベントハンドリング</h2>
        <div class="frame3">
          v-onディレクティブでイベントハンドラを登録できるのは、elオプションに指定したコンポーネントのスコープ内にある要素に限られます。<br>
          &lt;div id=&quot;app&quot;&gt;&lt;/div&gt;の外側にある要素やウィンドウ自体に発生するイベントはv-onで検知できません。<br>
          これらは、Vueに頼らずにaddEventListener関数を使ってイベントハンドラを登録します。<br>
          ただし、Vueを介さずに登録したイベントハンドラは、不要になったタイミングでremoveEventListener関数を呼び出して解除しなければなりません。
        </div>
        <h3>resizeイベントのハンドリング</h3>
        <div id="app2">
          ウィンドウの横幅：{{width}}<br>
          ウィンドウの高さ：{{height}}
        </div>
        <h3>HTML</h3>
        <?php echo $resize; ?>
        <h3>JavaScript</h3>
        <?php echo $resizeWin; ?>
        <h4>イベントハンドラが受け取る引数</h4>
        <div class="frame3">
          イベントが発生したとき、ブラウザはイベントオブジェクトという特別なオブジェクトを生成してイベントハンドラの引数で渡してくれます。<br>
          Vueでは$eventという変数名でイベントオブジェクトを受け取ります。<br>
          先程のtargetにはwindowオブジェクトが代入されています。そのため、windowオブジェクトが持っているinnerWidthやinnerHeightといったプロパティをtargetから引き出すことができます。
        </div>
        <div class="br50"></div>
        <h3>マウスでクリックした場所の座標値</h3>
        <div id="app3">
          <p>マウスカーソルの位置：{{point.x}},{{point.y}}</p>
        </div>
        <h3>HTML</h3>
        <?php echo $point; ?>
        <h3>JavaScript</h3>
        <?php echo $pointWin; ?>
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
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        stock: 7
      },
      methods: {
        onDeleteItem: function() {
          this.stock--;
        }
      }
    });
  </script>
  <script>
    var app2 = new Vue({
      el: '#app2',
      data: {
        width: window.innerWidth,
        height: window.innerHeight
      },
      created: function() {
        //イベントハンドラを登録
        addEventListener('resize', this.resizeHandler);
      },
      beforeDestroy: function() {
        //イベントハンドラを解除
        removeEventListener('resize', this.resizeHandler);
      },
      methods: {
        //イベントハンドラ
        resizeHandler: function($event) {
          this.width = $event.target.innerWidth;
          this.height = $event.target.innerHeight;
        }
      }
    });
  </script>
  <script>
    var app3 = new Vue({
      el: '#app3',
      data: {
        point: {
          x: 0,
          y: 0
        }
      },
      created: function() {
        //イベントハンドラを登録
        addEventListener('mousemove', this.mousemoveHandler);
      },
      beforeDestroy: function() {
        //イベントハンドラを解除
        removeEventListener('mousemove', this.mousemoveHandler);
      },
      methods: {
        mousemoveHandler: function($event) {
          this.point.x = $event.clientX;
          this.point.y = $event.clientY;
        }
      }
    });
  </script>
</body>

</html>