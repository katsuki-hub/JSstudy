<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~フィルター~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フィルター" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="filter.php">フィルター</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>グローバルスコープにフィルター登録</h2>
        <p>Vue.filter()メソッドを使ってグローバルスコープに登録すると、全てのコンポーネントから共通で利用できるようになります。</p>
        <div class="frame2">
          Vue.filter(フィルター名,関数オブジェクト);<br><br>
          テキストバインドの適用<br>
          {{プロパティ名 | フィルター名}}<br><br>
          属性バインドの適用<br>
          &lt;要素名 v-bind:属性名=&quot;プロパティ名 | フィルター名&quot;&gt;
        </div>
        <h3>フィルター適用</h3>
        <div id="app">
          {{price | number_format}}
        </div>
        <h3>テキストバインド</h3>
        <?php
        require_once("vueCode.php");
        echo $bind_fil;
        ?>
        <h3>グローバルフィルター登録</h3>
        <?php echo $Filter_g ?>
        <div class="br50"></div>
        <h2>ローカルスコープにフィルター登録</h2>
        <p>filtersオプションを使ってコンポーネントの中に登録したフィルターは、その中だけで使えるローカルスコープとなり、他のコンポーネントから隠れる。特定のコンポーネントの中だけで使うフィルターは、なるべくローカルスコープに登録したほうが独立性を保てます。</p>

        <div class="frame2">
          filters: {フィルター名: 関数オブジェクト}
        </div>
        <h3>ローカルフィルター登録</h3>
        <?php echo $filter_l ?>
        <div class="br50"></div>

        <h2>複数のフィルターを連結</h2>
        <p>2つ以上のフィルター名を「|」でつなぐと、 フィルターが連鎖的に適用されます</p>
        <div class="frame2">
          テキストに複数バインド<br>
          {{プロパティ名 | フィルター名 | フィルター名}}<br><br>
          属性にに複数バインド<br>
          &lt;要素名 v-bind:属性名=&quot;プロパティ名 | フィルター名 | フィルター名&quot;&gt;
        </div>

        <h3>フィルターの組み合わせ</h3>
        <div id="app2">
          {{price | unit}} {{price | number_format | unit}}
        </div>
        <h3>複数バインド</h3>
        <?php echo $bind_w ?>
        <h3>複数フィルター</h3>
        <?php echo $filter_w ?>

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
    Vue.filter('number_format', function(val) {
      return val.toLocaleString();
    });

    var app = new Vue({
      el: '#app',
      data: {
        price: 4500
      }
    });
  </script>
  <script>
    var app2 = new Vue({
      el: '#app2',
      data: {
        price: 12500
      },
      filters: {
        number_format: function(val) {
          return val.toLocaleString();
        },
        unit: function(val) {
          return val + '円';
        }
      }
    });
  </script>
</body>

</html>