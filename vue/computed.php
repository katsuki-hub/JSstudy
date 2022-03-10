<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~算出プロパティ~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "算出プロパティ" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="computed.php">算出プロパティ</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>再利用可能な加工済みデータ</h2>
        <p>算出プロパティはアプリケーションのデータに基づいて加工を行った結果を返すプロパティです。</p>
        <div class="frame2">
          computed: {算出プロパティ名: 関数オブジェクト}
        </div>
        <h3>うるう年の判定</h3>
        <div id="app">
          調べたい年：<input type="text" v-model="year"><br>
          {{year}}年は{{isUrudoshi ? 'うるう年です' : 'うるう年ではありません'}}
        </div><br><br>
        <div class="frame2">
          <button type="button">一口メモ</button><br>
          メソッドは再読み込みの度に実行されるが、算出プロパティはキャッシュされます。<br>
          リアクティブデータが更新されると、Vueはキャッシュを捨てて算出プロパティを再度実行します
        </div>
        <h3>HTML</h3>
        <?php
        require_once("vueCode.php");
        echo $ur;
        ?>
        <h3>JavaScript</h3>
        <?php echo $comp_ur; ?>
        <div class="br50"></div>
        <h4>算出プロパティが適した場面</h4>
        <div class="frame3">
          ECサイトの商品一覧ページ等で、ユーザーが検索条件を指定して絞り込んだ結果に対してレビュー順に並び替える場面などで、加工したデータをテンプレート内で頻繁に利用する場面では、 メソッドで毎回加工するよりも算出プロパティで加工してバインドしたほうが、パフォーマンスが良くなります。
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
        year: (new Date()).getFullYear()
      },
      computed: {
        isUrudoshi: function() {
          //「4で割り切れて100で割り切れない」または「400で割り切れる」場合
          if ((this.year % 4 == 0) && (this.year % 100 != 0) || (this.year % 400 == 0)) {
            return true;
          } else {
            return false;
          }
        }
      }
    });
  </script>
</body>

</html>