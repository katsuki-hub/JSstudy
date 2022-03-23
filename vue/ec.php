<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~商品一覧~" ?>
  <?php require_once "../common/head.php"; ?>
  <link href="../css/ec.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "商品一覧" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="ec.php">商品一覧</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <div id="app">
      <div class="container">
        <h1 class="pageTitle">商品一覧</h1>
        <!--検索欄-->
        <div class="search">
          <div class="result">
            検索結果<span class="count">{{count}}件</span>
          </div>
          <div class="condition">
            <div class="terget">
              <label><input type="checkbox" v-model="showSaleItem">セール商品</label>
              <label><input type="checkbox" v-model="showDelvFree">送料無料</label>
            </div>
            <div class="sort">
              <!--文字列型になる数値を.number修飾子で数値型へ-->
              <label for="sort">並び替え</label>
              <select id="sort" class="sorting" v-model.number="sortOrder">
                <option value="1">標準</option>
                <option value="2">価格が安い順</option>
              </select>
            </div>
          </div>
        </div>
        <!--商品一覧-->
        <div class="list">
          <div class="item" v-for="product in filteredList" v-bind:key="products.id">
            <figure class="image">
              <template v-if="product.isSale">
                <div class="status">SALE</div>
              </template>
              <img v-bind:src="product.image" alt="">
              <!-- <figcaption>{{product.name}}</figcaption> -->
              <figcaption v-html="product.name"></figcaption>
            </figure>
            <div class="detail">
              <div class="price"><span>{{product.price | number_format}}</span>円(税込)</div>
              <template v-if="product.delv == 0">
                <div class="shipping-fee none">送料無料</div>
              </template>
              <template v-else>
                <div class="shipping-fee none">+送料{{product.delv | number_format}}円</div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div><!-- app -->
    <div class="frame1">
      <b>データオプションにデータを定義していく</b>
      <hr>
      HTMLの中からユーザーの操作や商品の登録内容によって表示が変わる部分は全てデータ化する必要がある。<br>
      そこで、データ型(数値、文字列、真偽値、配列、オブジェクト)や変数名を考えてdataオプションに記述する。
    </div>
    <h4>データの持たせ方</h4>
    <table border="5">
      <tr>
        <th>No.</th>
        <th>変数名</th>
        <th>データ型</th>
        <th>説明</th>
      </tr>
      <tr>
        <td>1</td>
        <td>count</td>
        <td>数値</td>
        <td>表示中の商品数</td>
      </tr>
      <tr>
        <td>2</td>
        <td>showSaleitem</td>
        <td>真偽値</td>
        <td>セール対象・対象外の商品表示</td>
      </tr>
      <tr>
        <td>3</td>
        <td>showDelvFree</td>
        <td>真偽値</td>
        <td>送料無料・有料含むの商品表示</td>
      </tr>
      <tr>
        <td>4</td>
        <td>sortOrder</td>
        <td>数値</td>
        <td>初期表示・価格が安い順の表示</td>
      </tr>
      <tr>
        <td>5</td>
        <td>products</td>
        <td>配列</td>
        <td>商品リスト</td>
      </tr>
      <tr>
        <td>6</td>
        <td>name</td>
        <td>文字列</td>
        <td>商品名</td>
      </tr>
      <tr>
        <td>7</td>
        <td>price</td>
        <td>数値</td>
        <td>商品価格(税込)</td>
      </tr>
      <tr>
        <td>8</td>
        <td>image</td>
        <td>文字列</td>
        <td>商品画像のパス</td>
      </tr>
      <tr>
        <td>9</td>
        <td>delv</td>
        <td>数値</td>
        <td>送料</td>
      </tr>
      <tr>
        <td>10</td>
        <td>isSale</td>
        <td>真偽値</td>
        <td>セール対象・対象外</td>
      </tr>
    </table>
    <small>※countは0に設定します。実際のアプリケーションではサーバーから商品データを動的に読み込むので、ページを表示するまでは商品数は確定しません。結果的に不要なのでオプションから削除</small>
    <div class="frame1">
      <b>絞り込み機能の実装</b>
      <hr>
      ●v-onディレクティブを使ってchangeイベントをハンドリングしてもよいが、データ更新検知のウォッチャを使えばテンプレート側にv-onを割り当てなくてもいいのでウォッチャを使う。➩productsから表示対象外のオブジェクトを削除すれば良さそうだが、再びチェック状態が変わってしまうと復元できなくなってしまう。<br><br>
      ●配列要素を削除せずに算出プロパティで絞り込んだ結果を格納するための新しい配列を作成して、元の配列のproductsをループしながら1つ1つに条件を満たすか調べます。そして、テンプレートにバインドするプロパティをproductsからfilteredListに変更する。<br><br>
      ●結果的にウォッチャは不要になる。理由は算出プロパティはリアクティブデータが更新されない限り、一度返した値はVue.jsによってキャッシュされ、2回目以降はキャッシュが参照される。よってチェック状態を切り替える度にキャッシュを破棄してfilteredListを再評価しfunction実行するので、ウォッチャがなくてもページの表示と連動します。
    </div>
    <div class="frame1">
      <b>並び替え機能を実装する</b>
      <hr>
      filteredListの算出処理の中で、セレクトボックスにバインドしたsortOrderの値を読み取り、並び替えた結果を返すようにしていきます。<br>この方法ならfilteredListは常に絞り込みと並び替えの両方を反映した配列を返すことになります。
    </div>
    <div class="frame1">
      <b>商品にkeyを指定する</b><br>
      表示を切り替える要素にはvue.jsが一つ一つの要素を区別できるようにkey属性を指定します。商品番号やIDなどの重複の無い値を設定する。
    </div>
    <div class="frame3">
      「this」はクラスのインスタンスが生成されたときに、そのインスタンスを指すキーワードです。記述場所のスコープによって何を指すかが変わってきます。
    </div>
    <h3>HTML</h3>
    <?php
    require_once("vueCode.php");
    echo $ec;
    ?>
    <h3>JavaScript</h3>
    <?php echo $ec_js; ?>

  </div><!-- main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script src="../scripts/vue2.6.14.js"></script>
  <script src="../scripts/sortBy.js"></script>
</body>

</html>