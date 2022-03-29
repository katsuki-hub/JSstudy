<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~自動見積もりフォーム~" ?>
  <?php require_once "../common/head.php"; ?>
  <link href="../css/bootsrtap.css" rel="stylesheet" type="text/css">
  <style>
    [v-cloak] {
      opacity: 0;
    }
  </style>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "自動見積もりフォーム" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="quote.php">自動見積</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <div id="app" v-cloak>
      <div class="container bg-dark text-white p-5">
        <h2 class="text-center border-bottom pb-3 mb-5">自動見積もりフォーム</h2>
        <form>
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0">希望する動画制作
              <span class="badge badge-danger">必須</span>
            </label>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="movie_type" id="type1" value="余興ムービー" v-model="movieType">
                    <label class="form-check-label" for="type1">余興ムービー</label>
                  </div>
                </div><!-- col-md-5 -->
                <div class="col-md-5">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="movie_type" id="type2" value="広告用ムービー" v-model="movieType">
                    <label class="form-check-label" for="type2">広告用ムービー</label>
                  </div>
                </div><!-- col-md-5 -->
                <div class="col-md-5">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="movie_type" id="type3" value="プレゼン動画" v-model="movieType">
                    <label class="form-check-label" for="type3">プレゼン動画</label>
                  </div>
                </div><!-- col-md-5 -->
                <div class="col-md-5">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="movie_type" id="type4" value="会社紹介動画" v-model="movieType">
                    <label class="form-check-label" for="type4">会社紹介動画</label>
                  </div>
                </div><!-- col-md-5 -->
              </div>
            </div>
          </div>
          <!-- 発表日 -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0" for="announcement_date">発表日
              <span class="badge badge-danger">必須</span>
            </label>
            <div class="col-md-9">
              <input class="form-control" type="date" id="announcement_date" placeholder="日付を選びください" v-model="announcement_date">
              <small class="form-text">動画発表の日にちを選択してください</small>
            </div>
          </div>
          <!-- DVD仕上がり予定日 -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0" for="delivery_date">DVD納品予定日
              <span class="badge badge-danger">必須</span>
            </label>
            <div class="col-md-9">
              <input class="form-control" type="date" id="delivery_date" v-bind:min="tommorow" placeholder="日付を選びください" v-model="delivery_date">
              <small class="form-text">仕上がり予定日を発表日の1週間前に設定しております</small>
            </div>
          </div>
          <!-- 基本料金 -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0">基本料金(税込)</label>
            <div class="col-md-9">
              <div class="input-group">
                <input type="text" class="form-control text-right" id="sum_base" v-bind:value="taxedBasePrice | number_format" readonly>
                <div class="input-group-append">
                  <label class="input-group-text">円</label>
                </div>
              </div>
            </div>
          </div>
          <!-- オプションメニュー -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0">オプション(税込)
              <span class="badge badge-info">任意</span>
            </label>
            <div class="col-md-9">
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="opt1" v-model="opt1_use">
                <label class="form-check-label" for="opt1">BGM制作 ＋{{taxedopt1 | number_format}}円</label>
                <small class="form-text">オリジナル楽曲を依頼される場合は1曲{{taxedopt1 | number_format}}円かかります</small>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="opt2" v-model="opt2_use">
                <label class="form-check-label" for="opt2">メイキング動画 ＋{{taxedopt2 | number_format}}円</label>
                <small class="form-text">メイキングムービーを依頼される場合の料金です</small>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="opt3" v-model="opt3_use">
                <label class="form-check-label" for="opt3">DVD盤面印刷 ＋{{taxedopt3 | number_format}}円</label>
                <small class="form-text">盤面デザインを希望される場合は{{taxedopt3 | number_format}}円(税込)がかかります</small>
              </div>
              <div class="form-row mb-3 align-items-center">
                <div class="col-auto">
                  <label class="form-check-label" for="opt4">写真スキャニング ＋{{taxedopt4 | number_format}}円</label>
                </div>
                <div class="col-auto">
                  <div class="input-group">
                    <input class="form-control" type="number" id="opt4" v-model.number="opt4_num" min="0" max="30">
                    <div class="input-group-append">
                      <label class="input-group-text" for="opt4">枚</label>
                    </div>
                  </div>
                </div>
                <small class="form-text">プリントアウトした写真のスキャニング希望の方は1枚当たり{{taxedopt4 | number_format}}円にて承ります</small>
              </div>
            </div>
          </div>
          <!-- 小計 -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0">オプション料金(税込)</label>
            <div class="col-md-9">
              <div class="input-group">
                <input type="text" class="form-control text-right" id="sum_opt" v-bind:value="taxedOptPrice | number_format" readonly>
                <div class="input-group-append">
                  <label class="input-group-text">円</label>
                </div>
              </div>
            </div>
          </div>
          <!-- 合計 -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label pt-0">合計(税込)</label>
            <div class="col-md-9">
              <div class="input-group">
                <input type="text" class="fo-m-control text-right" id="sum_total" v-bind:value="taxedTotalPrice | number_format" readonly>
                <div class="input-group-append">
                  <label class="input-group-text">円</label>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /#app -->
    <div class="br50"></div>
    <h4>データの持たせ方</h4>
    <table border="5">
      <tr>
        <th>No</th>
        <th>変数名</th>
        <th>データ型</th>
        <th>説明</th>
      </tr>
      <tr>
        <td>1</td>
        <td>taxRate</td>
        <td>数値</td>
        <td>消費税率</td>
      </tr>
      <tr>
        <td>2</td>
        <td>movieType</td>
        <td>文字列</td>
        <td>制作したいムービーの種類</td>
      </tr>
      <tr>
        <td>3</td>
        <td>basePrice</td>
        <td>数値</td>
        <td>基本料金(税込)</td>
      </tr>
      <tr>
        <td>4</td>
        <td>addPrice1</td>
        <td>数値</td>
        <td>納期が1カ月未満の割増料金</td>
      </tr>
      <tr>
        <td>5</td>
        <td>addPrice2</td>
        <td>数値</td>
        <td>納期が3週間未満の割増料金</td>
      </tr>
      <tr>
        <td>6</td>
        <td>addPrice3</td>
        <td>数値</td>
        <td>納期が2週間未満の割増料金</td>
      </tr>
      <tr>
        <td>7</td>
        <td>addPrice4</td>
        <td>数値</td>
        <td>納期が1週間未満の割増料金</td>
      </tr>
      <tr>
        <td>8</td>
        <td>addPrice5</td>
        <td>数値</td>
        <td>納期が3日後の割増料金</td>
      </tr>
      <tr>
        <td>9</td>
        <td>addPrice6</td>
        <td>数値</td>
        <td>納期が2日後の割増料金</td>
      </tr>
      <tr>
        <td>10</td>
        <td>addPrice7</td>
        <td>数値</td>
        <td>納期が翌日の割増料金</td>
      </tr>
      <tr>
        <td>11</td>
        <td>optPrice/td>
        <td>数値</td>
        <td>オプション料金の合計(税込)</td>
      </tr>
      <tr>
        <td>12</td>
        <td>totalPrice</td>
        <td>数値</td>
        <td>合計金額(税込)</td>
      </tr>
      <tr>
        <td>13</td>
        <td>announcement_date</td>
        <td>文字列</td>
        <td>発表日(書式:YYYY-MM-DD)</td>
      </tr>
      <tr>
        <td>14</td>
        <td>delivery_date</td>
        <td>文字列</td>
        <td>DVD仕上がり予定日(書式:YYYY-MM-DD)</td>
      </tr>
      <tr>
        <td>15</td>
        <td>opt1_use</td>
        <td>真偽値</td>
        <td>BGM制作依頼のありなし</td>
      </tr>
      <tr>
        <td>16</td>
        <td>opt1_price</td>
        <td>数値</td>
        <td>BGM制作の税込料金</td>
      </tr>
      <tr>
        <td>17</td>
        <td>opt2_use</td>
        <td>真偽値</td>
        <td>メイキング撮影のありなし</td>
      </tr>
      <tr>
        <td>18</td>
        <td>opt2_price</td>
        <td>数値</td>
        <td>メイキング撮影の税込料金</td>
      </tr>
      <tr>
        <td>19</td>
        <td>opt3_use</td>
        <td>真偽値</td>
        <td>DVD盤面印刷のありなし</td>
      </tr>
      <tr>
        <td>20</td>
        <td>opt3_price</td>
        <td>数値</td>
        <td>DVD盤面印刷の税込料金</td>
      </tr>
      <tr>
        <td>21</td>
        <td>opt4_num</td>
        <td>数値</td>
        <td>スキャニング写真の利用枚数</td>
      </tr>
      <tr>
        <td>22</td>
        <td>opt4_price</td>
        <td>数値</td>
        <td>スキャニング写真の税込料金</td>
      </tr>
    </table>
    <div class="br50"></div>
    <div class="frame4">
      日付の差を求めるgetDateDiff()関数は、methodsオプションにメソッドとして定義します。<br>
      dataオプションのプロパティや、算出プロパティ、メソッドなどは同じコンポーネント内ならthisで参照できます。<br><br>
      通貨書式のフィルターは汎用的なのでグローバルスコープに登録。グローバルに登録するフィルターの定義はコンポーネントよりも先に記述する必要がある。
    </div>

    <h3>HTML</h3>
    <?php
    require_once("vueCode.php");
    echo $quote;
    ?>
    <h3>JavaScript</h3>
    <?php echo $quote_js; ?>

  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script src="../scripts/vue2.6.14.js"></script>
  <script src="../scripts/quote.js"></script>
</body>

</html>