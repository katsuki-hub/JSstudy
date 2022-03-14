<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~ウォッチャ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "ウォッチャ" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="watch.php">ウォッチャ</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>データの変更を監視する</h2>
        <p>ウォッチャはデータの変更を監視してくれる機能です。<br>監視したいデータとデータが変更されたときに実行したいハンドラを予め登録しておくと、データの変更をVueが検知してハンドラを呼び出します。</p>
        <div class="frame2">
          watch: {監視したいプロパティ名: 関数オブジェクト}
        </div>
        <h3>ウォッチャ登録</h3>
        <div id="app">
          <template v-if="stock >= 1">
            <span class="num">在庫はあと{{stock}}個</span>
            <button class="btn" v-on:click="onDeleteItem">削除ボタン</button>
          </template>
          {{message}}
        </div>
        <h3>HTML</h3>
        <?php
        require_once("vueCode.php");
        echo $watch;
        ?>
        <h3>JavaScript</h3>
        <?php echo $watch_jav; ?>
        <div class="frame1">
          <b>算出プロパティとウォッチャの使い分け</b>
          <hr>
          クリックイベントの時と表示は同じですが、在庫が0の時messageの内容が自動的に更新されるのでテンプレート欄にmessageを表示するかの条件分岐を記述する必要がなくなり、HTMLがスッキリする。
        </div>
        <div class="br50"></div>
        <h3>ウォッチャで算出プロパティを監視する</h3>
        <div id="app2">
          <template v-if="stock >= 1">
            <span class="num">在庫はあと{{stock}}個</span>
            <button class="btn" v-on:click="onDeleteItem">削除ボタン</button>
          </template>
          {{statusMesseage}}
        </div>
        <h3>HTML</h3>
        <?php echo $c_watch; ?>
        <h3>JavaScript</h3>
        <?php echo $c_watch_js; ?>
        <div class="frame1">
          dataプロパティだけでなくcomputedの算出プロパティを監視することも可能です。<br>
          ウォッチャが役立つ場面は<br>
          ・データが更新されたとき、サーバー間の通信など重い処理が発生する場面<br>
          ・ユーザーの操作によって、高い頻度で処理が発生する場面
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
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        message: '',
        stock: 9
      },
      methods: {
        onDeleteItem: function() {
          this.stock--;
        }
      },
      watch: {
        stock: function(newStock, oldStock) {
          if (newStock == 0) {
            this.message = '売り切れ！！';
          }
        }
      }
    });
  </script>
  <script>
    var app2 = new Vue({
      el: '#app2',
      data: {
        message: '',
        stock: 10
      },
      methods: {
        onDeleteItem: function() {
          this.stock--;
        }
      },
      computed: {
        statusMesseage: function() {
          if (this.stock == 0) {
            return '売り切れです';
          }
          return '';
        }
      },
      watch: {
        statusMesseage: function() {
          console.log('商品のステータスが変化しました。');
        }
      }
    });
  </script>
</body>

</html>