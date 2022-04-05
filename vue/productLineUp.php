<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~商品一覧をコンポーネント化~" ?>
  <?php require_once "../common/head.php"; ?>
  <link href="components/product-header.css" rel="stylesheet">
  <link href="components/product.css" rel="stylesheet">
  <link href="components/product-list.css" rel="stylesheet">
  <style>
    .mainProduct {
      background: #000;
      color: #fff;
    }

    header {
      height: 150px;
    }
  </style>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="mainProduct">
    <div id="app">
      <product-list v-bind:products="products"></product-list>
    </div>
  </div>

  <div class="main-wrapper">
    <h4>各コンポーネントに保持するデータ</h4>
    <table border="5">
      <tr>
        <th>コンポーネント</th>
        <th>データ</th>
        <th>定義場所</th>
        <th>備考</th>
      </tr>
      <tr>
        <td>ルート(lineUp.js)</td>
        <td>商品データ</td>
        <td>dataオプション</td>
        <td>実際のアプリケーションでは外部から受けとる</td>
      </tr>
      <tr>
        <td rowspan="2">商品一覧(product-list.js)</td>
        <td>商品データ</td>
        <td>propsオプション</td>
        <td>親コンポーネント(lineUp.js)から受け取る</td>
      </tr>
      <tr>
        <td>検索条件</td>
        <td>dataオプション</td>
        <td>子コンポーネント(product-header.js)に渡す</td>
      </tr>
      <tr>
        <td rowspan="2">ヘッダー(product-header.js)</td>
        <td>検索条件</td>
        <td>propsオプション</td>
        <td>親コンポーネント(product-list.js)から受け取る</td>
      </tr>
      <tr>
        <td>表示件数</td>
        <td>propsオプション</td>
        <td>親コンポーネント(product-list.js)から受け取る</td>
      </tr>
      <tr>
        <td>商品(product.js)</td>
        <td>商品データ</td>
        <td>propsオプション</td>
        <td>親コンポーネント(product-list.js)から受け取る</td>
      </tr>
    </table>
    <small>※子は親のテンプレート内で使われるので、親より先に読み込まないとVue.jsが解析失敗してエラーになります。</small>

    <h3>ルートコンポネントのテンプレート</h3>
    <?php
    require_once("vueCode.php");
    echo $tempEC;
    ?>

    <h3>ルートコンポネントのスクリプト</h3>
    <button type="button">lineUp.js</button>
    <?php echo $lineup ?>

    <h3>フィルターのスクリプト</h3>
    <button type="button">filter.js</button>
    <?php echo $filteryen ?>

    <h3>商品のコンポーネント</h3>
    <button type="button">product.js</button>
    <?php echo $product_js ?>

    <h3>ヘッダーのコンポーネント</h3>
    <button type="button">product-header.js</button>
    <?php echo $header ?>

    <h3>商品一覧コンポーネント</h3>
    <button type="button">product-list.js</button>
    <?php echo $list ?>

  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script src="../scripts/vue2.6.14.js"></script>
  <script src="../common/filter.js"></script>
  <script src="components/product-header.js"></script>
  <script src="components/product.js"></script>
  <script src="components/product-list.js"></script>
  <script src="../scripts/lineUp.js"></script>
</body>

</html>