<?php
$bind_fil = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
{{price | number_format}}
&lt;/div&gt;
</code></pre>';

$Filter_g = '<pre><code class="prettyprint">Vue.filter(&#039;number_format&#039;, function(val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    price: 4500
  }
});
</code></pre>';

$filter_l = '<pre><code class="prettyprint">var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    price: 4500
  },
  filters: {
    number_format: function(val) {
      return val.toLocaleString();
    }
  }
});
</code></pre>';

$bind_w = '<pre><code class="prettyprint">&lt;div id=&quot;app2&quot;&gt;
  {{price | unit}} {{price | number_format | unit}}
&lt;/div&gt;
</code></pre>';

$filter_w = '<pre><code class="prettyprint">var app2 = new Vue({
  el: &#039;#app2&#039;,
  data: {
    price: 12500
  },
  filters: {
    number_format: function(val) {
      return val.toLocaleString();
    },
    unit: function(val) {
      return val + &#039;円&#039;;
    }
  }
});
</code></pre>';

$ur = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
調べたい年：&lt;input type=&quot;text&quot; v-model=&quot;year&quot;&gt;&lt;br&gt;
{{year}}年は{{isUrudoshi ? &#039;うるう年です&#039; : &#039;うるう年ではありません&#039;}}
&lt;/div&gt;
</code></pre>';

$comp_ur = '<pre><code class="prettyprint">var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    year: (new Date()).getFullYear()
  },
  computed: {
    isUrudoshi: function() {
      //「4で割り切れて100で割り切れない」または「400で割り切れる」場合
      if ((this.year % 4 == 0) &amp;&amp; (this.year % 100 != 0) || (this.year % 400 == 0)) {
        return true;
      } else {
        return false;
      }
    }
  }
});
</code></pre>';

$click = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
&lt;template v-if=&quot;stock &gt;= 1&quot;&gt;
  &lt;span class=&quot;num&quot;&gt;在庫はあと{{stock}}個&lt;/span&gt;
  &lt;button class=&quot;btn&quot; v-on:click=&quot;onDeleteItem&quot;&gt;削除ボタン&lt;/button&gt;
&lt;/template&gt;
&lt;template v-else&gt;在庫切れです&lt;/template&gt;
&lt;/div&gt;
</code></pre>';

$clickDel = '<pre><code class="prettyprint">var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    stock: 7
  },
  methods: {
    onDeleteItem: function() {
      this.stock--;
    }
  }
});
</code></pre>';

$resize = '<pre><code class="prettyprint">&lt;div id=&quot;app2&quot;&gt;
ウィンドウの横幅：{{width}}&lt;br&gt;
ウィンドウの高さ：{{height}}
&lt;/div&gt;
</code></pre>';

$resizeWin = '<pre><code class="prettyprint">var app2 = new Vue({
  el: &#039;#app2&#039;,
  data: {
    width: window.innerWidth,
    height: window.innerHeight
  },
  created: function () {
    //イベントハンドラを登録
    addEventListener(&#039;resize&#039;, this.resizeHandler);
  },
  beforeDestroy: function () {
    //イベントハンドラを解除
    removeEventListener(&#039;resize&#039;, this.resizeHandler);
  },
  methods: {
    //イベントハンドラ
    resizeHandler: function ($event) {
      this.width = $event.target.innerWidth;
      this.height = $event.target.innerHeight;
    }
  }
});
</code></pre>';

$point = '<pre><code class="prettyprint">&lt;div id=&quot;app3&quot;&gt;
  &lt;p&gt;マウスカーソルの位置：{{point.x}},{{point.y}}&lt;/p&gt;
&lt;/div&gt;
</code></pre>';

$pointWin = '<pre><code class="prettyprint">var app3 = new Vue({
  el: &#039;#app3&#039;,
  data: {
    point: {
      x: 0,
      y: 0
    }
  },
  created: function () {
    //イベントハンドラを登録
    addEventListener(&#039;mousemove&#039;, this.mousemoveHandler);
  },
  beforeDestroy: function () {
    //イベントハンドラを解除
    removeEventListener(&#039;mousemove&#039;, this.mousemoveHandler);
  },
  methods: {
    mousemoveHandler: function ($event) {
      this.point.x = $event.clientX;
      this.point.y = $event.clientY;
    }
  }
});
</code></pre>';

$watch = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
&lt;template v-if=&quot;stock &gt;= 1&quot;&gt;
  &lt;span class=&quot;num&quot;&gt;在庫はあと{{stock}}個&lt;/span&gt;
  &lt;button class=&quot;btn&quot; v-on:click=&quot;onDeleteItem&quot;&gt;削除ボタン&lt;/button&gt;
&lt;/template&gt;
{{message}}
&lt;/div&gt;
</code></pre>';

$watch_jav = '<pre><code class="prettyprint">var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    message: &#039;&#039;,
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
        this.message = &#039;売り切れ！！&#039;;
      }
    }
  }
});
</code></pre>';

$c_watch = '<pre><code class="prettyprint">&lt;div id=&quot;app2&quot;&gt;
&lt;template v-if=&quot;stock &gt;= 1&quot;&gt;
  &lt;span class=&quot;num&quot;&gt;在庫はあと{{stock}}個&lt;/span&gt;
  &lt;button class=&quot;btn&quot; v-on:click=&quot;onDeleteItem&quot;&gt;削除ボタン&lt;/button&gt;
&lt;/template&gt;
{{statusMesseage}}
&lt;/div&gt;
</code></pre>';

$c_watch_js = '<pre><code class="prettyprint">var app2 = new Vue({
  el: &#039;#app2&#039;,
  data: {
    message: &#039;&#039;,
    stock: 10
  },
  methods: {
    onDeleteItem: function () {
      this.stock--;
    }
  },
  computed: {
    statusMesseage: function () {
      if (this.stock == 0) {
        return &#039;売り切れです&#039;;
      }
      return &#039;&#039;;
    }
  },
  watch: {
    statusMesseage: function () {
      console.log(&#039;商品のステータスが変化しました。&#039;);
    }
  }
});
</code></pre>';

$check = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
&lt;p&gt;休日の過ごし方：{{selection}}&lt;/p&gt;
&lt;label&gt;
  &lt;input type=&quot;checkbox&quot; v-model=&quot;answer&quot; value=&quot;読書&quot;&gt;読書
&lt;/label&gt;
&lt;label&gt;
  &lt;input type=&quot;checkbox&quot; v-model=&quot;answer&quot; value=&quot;ボルダリング&quot;&gt;ボルダリング
&lt;/label&gt;
&lt;label&gt;
  &lt;input type=&quot;checkbox&quot; v-model=&quot;answer&quot; value=&quot;キャンプ&quot;&gt;キャンプ
&lt;/label&gt;
&lt;/div&gt;
</code></pre>';

$check_js = '<pre><code class="prettyprint">var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    answer: []
  },
  computed: {
    //チェック内容を連結した文字列を返す算出プロパティ
    selection: function () {
      return this.answer.join();
    }
  }
});
</code></pre>';

$date = '<pre><code class="prettyprint">&lt;div id=&quot;app2&quot;&gt;
&lt;p&gt;ご希望日：{{request_date}}&lt;/p&gt;
&lt;input type=&quot;date&quot; v-model=&quot;request_date&quot; v-bind:min=&quot;min_date&quot;&gt;
&lt;/div&gt;
</code></pre>';

$date_js = '<pre><code class="prettyprint">var app2 = new Vue({
  el: &#039;#app2&#039;,
  data: {
    request_date: null,
    min_date: null
  },
  created: function() {
    //初期値設定を翌日へ
    var dt = new Date();
    dt.setDate(dt.getDate() + 1);
    this.request_date = this.formatDate(dt);
    //翌日の日付を最小値へ
    this.min_date = this.request_date;
  },
  methods: {
    //日付をYYYY-MM-DDに整形するメソッド
    formatDate: function(dt) {
      var y = dt.getFullYear();
      var m = (&#039;00&#039; + (dt.getMonth() + 1)).slice(-2);
      var d = (&#039;00&#039; + dt.getDate()).slice(-2);
      var result = y + &#039;-&#039; + m + &#039;-&#039; + d;
      return result;
    }
  }
});
</code></pre>';

$color = '<pre><code class="prettyprint">&lt;div id=&quot;app3&quot;&gt;
&lt;fieldset&gt;
  &lt;legend&gt;色の選択&lt;/legend&gt;
  &lt;input type=&quot;color&quot; v-model=&quot;color&quot;&gt;{{color}}&lt;br&gt;
  赤：&lt;input type=&quot;range&quot; v-model.number=&quot;red&quot; min=&quot;0&quot; max=&quot;255&quot;&gt;{{red}}&lt;br&gt;
  緑：&lt;input type=&quot;range&quot; v-model.number=&quot;green&quot; min=&quot;0&quot; max=&quot;255&quot;&gt;{{green}}&lt;br&gt;
  青：&lt;input type=&quot;range&quot; v-model.number=&quot;blue&quot; min=&quot;0&quot; max=&quot;255&quot;&gt;{{blue}}&lt;br&gt;
&lt;/fieldset&gt;
&lt;/div&gt;
</code></pre>';

$color_js = '<pre><code class="prettyprint">var app3 = new Vue({
  el: &#039;#app3&#039;,
  data: {
    color: &#039;#000000&#039;,
    red: 0,
    blue: 0,
    green: 0
  },
  computed: {
    //赤・緑・青を配列で返す算出プロパティ
    colorElement: function() {
      return [this.red, this.green, this.blue];
    }
  },
  watch: {
    //赤・緑・青のいずれかの変更を監視する
    colorElement: function(newRGB, oldRGB) {
      //赤・緑・青を2桁の16進数表記に変換する
      var r = (&#039;00&#039; + newRGB[0].toString(16).toUpperCase()).slice(-2);
      var g = (&#039;00&#039; + newRGB[1].toString(16).toUpperCase()).slice(-2);
      var b = (&#039;00&#039; + newRGB[2].toString(16).toUpperCase()).slice(-2);
      //#RRGGBB形式の文字列で更新する
      this.color = &#039;#&#039; + r + g + b;
    },
    //カラーパレットの選択変更を監視する
    color: function(newColor, oldColor) {
      this.red = parseInt(newColor, substr(1, 2), 16);
      this.green = parseInt(newColor, substr(3, 2), 16);
      this.blue = parseInt(newColor, substr(5, 2), 16);
    }
  }
});
</code></pre>';

$fade = '<pre><code class="prettyprint">&lt;div id=&quot;fade&quot;&gt;
&lt;button v-on:click=&quot;show = !show&quot;&gt;表示の切り替え&lt;/button&gt;
&lt;transition&gt;
  &lt;p v-if=&quot;show&quot;&gt;
    1. ユーザーに焦点を絞れば、他のものはみな後からついてくる&lt;br&gt;
    2. 1つのことをとことん極めてうまくやるのが一番&lt;br&gt;
    3. 遅いより速いほうがいい&lt;br&gt;
    4. ウェブ上の民主主義は機能する&lt;br&gt;
    5. 情報を探したくなるのはパソコンの前にいるときだけではない&lt;br&gt;
    6. 悪事を働かなくてもお金は稼げる&lt;br&gt;
    7. 世の中にはまだまだ情報があふれている&lt;br&gt;
    8. 情報のニーズはすべての国境を越える&lt;br&gt;
    9. スーツがなくても真剣に仕事はできる&lt;br&gt;
    10.「すばらしい」では足りない
  &lt;/p&gt;
&lt;/transition&gt;
&lt;/div&gt;
</code></pre>';

$fade_js = '<pre><code class="prettyprint">var fade = new Vue({
  el: &#039;#fade&#039;,
  data: {
    show: false
  }
});
</code></pre>';

$fade_css = '<pre><code class="prettyprint">.v-enter, .v-leave-to {
  opacity: 0;
}

.v-enter-to, .v-leave {
  opacity: 1;
}

.v-enter-active, .v-leave-active {
  transition: opacity 0.8s;
}
</code></pre>';

$animated = '<pre><code class="prettyprint">&lt;transition name=zoom enter-active-class=&quot;animated zoomIn&quot; leave-active-class=&quot;animated zoomOut&quot;&gt;
&lt;/transition&gt;
</code></pre>';

$ec = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot;&gt;
&lt;div class=&quot;container&quot;&gt;
  &lt;h1 class=&quot;pageTitle&quot;&gt;商品一覧&lt;/h1&gt;
  &lt;!--検索欄--&gt;
  &lt;div class=&quot;search&quot;&gt;
    &lt;div class=&quot;result&quot;&gt;
      検索結果&lt;span class=&quot;count&quot;&gt;{{count}}件&lt;/span&gt;
    &lt;/div&gt;
    &lt;div class=&quot;condition&quot;&gt;
      &lt;div class=&quot;terget&quot;&gt;
        &lt;label&gt;&lt;input type=&quot;checkbox&quot; v-model=&quot;showSaleItem&quot;&gt;セール商品&lt;/label&gt;
        &lt;label&gt;&lt;input type=&quot;checkbox&quot; v-model=&quot;showDelvFree&quot;&gt;送料無料&lt;/label&gt;
      &lt;/div&gt;
      &lt;div class=&quot;sort&quot;&gt;
        &lt;!--文字列型になる数値を.number修飾子で数値型へ--&gt;
        &lt;label for=&quot;sort&quot;&gt;並び替え&lt;/label&gt;
        &lt;select id=&quot;sort&quot; class=&quot;sorting&quot; v-model.number=&quot;sortOrder&quot;&gt;
          &lt;option value=&quot;1&quot;&gt;標準&lt;/option&gt;
          &lt;option value=&quot;2&quot;&gt;価格が安い順&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;!--商品一覧--&gt;
  &lt;div class=&quot;list&quot;&gt;
    &lt;div class=&quot;item&quot; v-for=&quot;product in filteredList&quot; v-bind:key=&quot;products.id&quot;&gt;
      &lt;figure class=&quot;image&quot;&gt;
        &lt;template v-if=&quot;product.isSale&quot;&gt;
          &lt;div class=&quot;status&quot;&gt;SALE&lt;/div&gt;
        &lt;/template&gt;
        &lt;img v-bind:src=&quot;product.image&quot; alt=&quot;&quot;&gt;
        &lt;!-- &lt;figcaption&gt;{{product.name}}&lt;/figcaption&gt; --&gt;
        &lt;figcaption v-html=&quot;product.name&quot;&gt;&lt;/figcaption&gt;
      &lt;/figure&gt;
      &lt;div class=&quot;detail&quot;&gt;
        &lt;div class=&quot;price&quot;&gt;&lt;span&gt;{{product.price | number_format}}&lt;/span&gt;円(税込)&lt;/div&gt;
        &lt;template v-if=&quot;product.delv == 0&quot;&gt;
          &lt;div class=&quot;shipping-fee none&quot;&gt;送料無料&lt;/div&gt;
        &lt;/template&gt;
        &lt;template v-else&gt;
          &lt;div class=&quot;shipping-fee none&quot;&gt;+送料{{product.delv | number_format}}円&lt;/div&gt;
        &lt;/template&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;&lt;!-- app --&gt;
</code></pre>';

$ec_js = '<pre><code class="prettyprint">Vue.filter(&#039;number_format&#039;, function (val) {
  return val.toLocaleString();
});

//商品一覧コンポーネント
var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    showSaleItem: false, //SALE商品のチェック状態Vue.filter
    showDelvFree: false, //送料無料のチェック状態
    sortOrder: 1, //並び替えの選択値(1:標準 2:価格が安い順)
    products: [ //商品リスト
      { id: 1, name: &#039;ジム&lt;br&gt;クライミング体験会&#039;, price: 1550, image: &#039;../images/clim.jpg&#039;, delv: 0, isSale: true },
      { id: 2, name: &#039;ジム&lt;br&gt;クライミング観戦チケット&#039;, price: 1280, image: &#039;../images/clim.jpg&#039;, delv: 0, isSale: true },
      { id: 3, name: &#039;福岡会場&lt;br&gt;公式戦観戦チケット&#039;, price: 1680, image: &#039;../images/clim.jpg&#039;, delv: 190, isSale: true },
      { id: 4, name: &#039;外岩講習会&lt;br&gt;外岩クライミング体験チケット&#039;, price: 500, image: &#039;../images/clim.jpg&#039;, delv: 0, isSale: true },
      { id: 5, name: &#039;リード&lt;br&gt;リードクライミング講習&#039;, price: 890, image: &#039;../images/clim.jpg&#039;, delv: 0, isSale: false },
      { id: 6, name: &#039;ロープの使い方&lt;br&gt;クライミング座談会&#039;, price: 990, image: &#039;../images/clim.jpg&#039;, delv: 0, isSale: false }
    ]
  },
  computed: {
    //絞り込み後の商品リストを返す算出プロパティ
    filteredList: function () {
      var newList = [];
      for (var i = 0; i &lt; this.products.length; i++) {
        var isShow = true;
        //i番目の商品が表示対象かどうかを判定する
        if (this.showSaleItem &amp;&amp; !this.products[i].isSale) {
          isShow = false;
        }
        if (this.showDelvFree &amp;&amp; this.products[i].delv &gt; 0) {
          isShow = false;
        }
        if (isShow) {
          newList.push(this.products[i]);
        }
      }
      //新しい配列を並び替える
      if (this.sortOrder == 1) {
        //元の順番にpushしているので並び替え済み
      }
      else if (this.sortOrder == 2) {
        newList.sort(function (a, b) {
          return a.price - b.price;
        });
      }
      return newList;
    },
    //絞り込み後の商品件数を返す算出プロパティ
    count: function () {
      return this.filteredList.length;
    }
  }
});
</code></pre>';

$quote = '<pre><code class="prettyprint">&lt;div id=&quot;app&quot; v-cloak&gt;
&lt;div class=&quot;container bg-dark text-white p-5&quot;&gt;
  &lt;h2 class=&quot;text-center border-bottom pb-3 mb-5&quot;&gt;自動見積もりフォーム&lt;/h2&gt;
  &lt;form&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot;&gt;希望する動画制作
        &lt;span class=&quot;badge badge-danger&quot;&gt;必須&lt;/span&gt;
      &lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;div class=&quot;row&quot;&gt;
          &lt;div class=&quot;col-md-5&quot;&gt;
            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
              &lt;input class=&quot;form-check-input&quot; type=&quot;radio&quot; name=&quot;movie_type&quot; id=&quot;type1&quot; value=&quot;余興ムービー&quot; v-model=&quot;movieType&quot;&gt;
              &lt;label class=&quot;form-check-label&quot; for=&quot;type1&quot;&gt;余興ムービー&lt;/label&gt;
            &lt;/div&gt;
          &lt;/div&gt;&lt;!-- col-md-5 --&gt;
          &lt;div class=&quot;col-md-5&quot;&gt;
            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
              &lt;input class=&quot;form-check-input&quot; type=&quot;radio&quot; name=&quot;movie_type&quot; id=&quot;type2&quot; value=&quot;広告用ムービー&quot; v-model=&quot;movieType&quot;&gt;
              &lt;label class=&quot;form-check-label&quot; for=&quot;type2&quot;&gt;広告用ムービー&lt;/label&gt;
            &lt;/div&gt;
          &lt;/div&gt;&lt;!-- col-md-5 --&gt;
          &lt;div class=&quot;col-md-5&quot;&gt;
            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
              &lt;input class=&quot;form-check-input&quot; type=&quot;radio&quot; name=&quot;movie_type&quot; id=&quot;type3&quot; value=&quot;プレゼン動画&quot; v-model=&quot;movieType&quot;&gt;
              &lt;label class=&quot;form-check-label&quot; for=&quot;type3&quot;&gt;プレゼン動画&lt;/label&gt;
            &lt;/div&gt;
          &lt;/div&gt;&lt;!-- col-md-5 --&gt;
          &lt;div class=&quot;col-md-5&quot;&gt;
            &lt;div class=&quot;form-check form-check-inline&quot;&gt;
              &lt;input class=&quot;form-check-input&quot; type=&quot;radio&quot; name=&quot;movie_type&quot; id=&quot;type4&quot; value=&quot;会社紹介動画&quot; v-model=&quot;movieType&quot;&gt;
              &lt;label class=&quot;form-check-label&quot; for=&quot;type4&quot;&gt;会社紹介動画&lt;/label&gt;
            &lt;/div&gt;
          &lt;/div&gt;&lt;!-- col-md-5 --&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- 発表日 --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot; for=&quot;announcement_date&quot;&gt;発表日
        &lt;span class=&quot;badge badge-danger&quot;&gt;必須&lt;/span&gt;
      &lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;input class=&quot;form-control&quot; type=&quot;date&quot; id=&quot;announcement_date&quot; placeholder=&quot;日付を選びください&quot; v-model=&quot;announcement_date&quot;&gt;
        &lt;small class=&quot;form-text&quot;&gt;動画発表の日にちを選択してください&lt;/small&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- DVD仕上がり予定日 --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot; for=&quot;delivery_date&quot;&gt;DVD納品予定日
        &lt;span class=&quot;badge badge-danger&quot;&gt;必須&lt;/span&gt;
      &lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;input class=&quot;form-control&quot; type=&quot;date&quot; id=&quot;delivery_date&quot; v-bind:min=&quot;tommorow&quot; placeholder=&quot;日付を選びください&quot; v-model=&quot;delivery_date&quot;&gt;
        &lt;small class=&quot;form-text&quot;&gt;仕上がり予定日を発表日の1週間前に設定しております&lt;/small&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- 基本料金 --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot;&gt;基本料金(税込)&lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;div class=&quot;input-group&quot;&gt;
          &lt;input type=&quot;text&quot; class=&quot;form-control text-right&quot; id=&quot;sum_base&quot; v-bind:value=&quot;taxedBasePrice | number_format&quot; readonly&gt;
          &lt;div class=&quot;input-group-append&quot;&gt;
            &lt;label class=&quot;input-group-text&quot;&gt;円&lt;/label&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- オプションメニュー --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot;&gt;オプション(税込)
        &lt;span class=&quot;badge badge-info&quot;&gt;任意&lt;/span&gt;
      &lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;div class=&quot;form-check mb-3&quot;&gt;
          &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot; id=&quot;opt1&quot; v-model=&quot;opt1_use&quot;&gt;
          &lt;label class=&quot;form-check-label&quot; for=&quot;opt1&quot;&gt;BGM制作 ＋{{taxedopt1 | number_format}}円&lt;/label&gt;
          &lt;small class=&quot;form-text&quot;&gt;オリジナル楽曲を依頼される場合は1曲{{taxedopt1 | number_format}}円かかります&lt;/small&gt;
        &lt;/div&gt;
        &lt;div class=&quot;form-check mb-3&quot;&gt;
          &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot; id=&quot;opt2&quot; v-model=&quot;opt2_use&quot;&gt;
          &lt;label class=&quot;form-check-label&quot; for=&quot;opt2&quot;&gt;メイキング動画 ＋{{taxedopt2 | number_format}}円&lt;/label&gt;
          &lt;small class=&quot;form-text&quot;&gt;メイキングムービーを依頼される場合の料金です&lt;/small&gt;
        &lt;/div&gt;
        &lt;div class=&quot;form-check mb-3&quot;&gt;
          &lt;input class=&quot;form-check-input&quot; type=&quot;checkbox&quot; id=&quot;opt3&quot; v-model=&quot;opt3_use&quot;&gt;
          &lt;label class=&quot;form-check-label&quot; for=&quot;opt3&quot;&gt;DVD盤面印刷 ＋{{taxedopt3 | number_format}}円&lt;/label&gt;
          &lt;small class=&quot;form-text&quot;&gt;盤面デザインを希望される場合は{{taxedopt3 | number_format}}円(税込)がかかります&lt;/small&gt;
        &lt;/div&gt;
        &lt;div class=&quot;form-row mb-3 align-items-center&quot;&gt;
          &lt;div class=&quot;col-auto&quot;&gt;
            &lt;label class=&quot;form-check-label&quot; for=&quot;opt4&quot;&gt;写真スキャニング ＋{{taxedopt4 | number_format}}円&lt;/label&gt;
          &lt;/div&gt;
          &lt;div class=&quot;col-auto&quot;&gt;
            &lt;div class=&quot;input-group&quot;&gt;
              &lt;input class=&quot;form-control&quot; type=&quot;number&quot; id=&quot;opt4&quot; v-model.number=&quot;opt4_num&quot; min=&quot;0&quot; max=&quot;30&quot;&gt;
              &lt;div class=&quot;input-group-append&quot;&gt;
                &lt;label class=&quot;input-group-text&quot; for=&quot;opt4&quot;&gt;枚&lt;/label&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;small class=&quot;form-text&quot;&gt;プリントアウトした写真のスキャニング希望の方は1枚当たり{{taxedopt4 | number_format}}円にて承ります&lt;/small&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- 小計 --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot;&gt;オプション料金(税込)&lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;div class=&quot;input-group&quot;&gt;
          &lt;input type=&quot;text&quot; class=&quot;form-control text-right&quot; id=&quot;sum_opt&quot; v-bind:value=&quot;taxedOptPrice | number_format&quot; readonly&gt;
          &lt;div class=&quot;input-group-append&quot;&gt;
            &lt;label class=&quot;input-group-text&quot;&gt;円&lt;/label&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- 合計 --&gt;
    &lt;div class=&quot;form-group row&quot;&gt;
      &lt;label class=&quot;col-md-3 col-form-label pt-0&quot;&gt;合計(税込)&lt;/label&gt;
      &lt;div class=&quot;col-md-9&quot;&gt;
        &lt;div class=&quot;input-group&quot;&gt;
          &lt;input type=&quot;text&quot; class=&quot;fo-m-control text-right&quot; id=&quot;sum_total&quot; v-bind:value=&quot;taxedTotalPrice | number_format&quot; readonly&gt;
          &lt;div class=&quot;input-group-append&quot;&gt;
            &lt;label class=&quot;input-group-text&quot;&gt;円&lt;/label&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/form&gt;
&lt;/div&gt;
&lt;/div&gt;&lt;!-- /#app --&gt;
</code></pre>';

$quote_js = '<pre><code class="prettyprint">//通貨書式への変換フィルター
Vue.filter(&#039;number_format&#039;, function (val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: &#039;#app&#039;,
  data: {
    taxRate: 0.1,
    movieType: &#039;余興ムービー&#039;,
    basePrice: 25000,
    addPrice1: 5000,
    addPrice2: 10000,
    addPrice3: 15000,
    addPrice4: 20000,
    addPrice5: 30000,
    addPrice6: 40000,
    addPrice7: 45000,
    optPrice: 0,
    totalPrice: 0,
    announcement_date: &#039;&#039;,
    delivery_date: &#039;&#039;,
    opt1_use: false,
    opt1_price: 6600,
    opt2_use: false,
    opt2_price: 12500,
    opt3_use: false,
    opt3_price: 1200,
    opt4_num: 0,
    opt4_price: 320,
  },
  methods: {
    //税込金額に変換
    incTax: function (untaxed) {
      return Math.floor(untaxed * (1 + this.taxRate));
    },
    //日付の差分を求める
    getDateDiff: function (dateString1, dateString2) {
      var date1 = new Date(dateString1);
      var date2 = new Date(dateString2);
      //二つの日付の差分(ミリ秒)を計算
      var msDiff = date1.getTime() - date2.getTime();
      //差分を日付に変換　差分÷(1000ミリ秒×60秒×60分×24時間)
      return Math.ceil(msDiff / (1000 * 60 * 60 * 24));
    },
    //日付をYYYY-MM-DDの書式を返すメソッド
    formatDate: function (dt) {
      var y = dt.getFullYear();
      var m = (&#039;00&#039; + (dt.getMonth() + 1)).slice(-2);
      var d = (&#039;00&#039; + dt.getDate()).slice(-2);
      return (y + &#039;-&#039; + m + &#039;-&#039; + d);
    }
  },
  computed: {
    taxedopt1: function () {
      return this.incTax(this.opt1_price);
    },
    taxedopt2: function () {
      return this.incTax(this.opt2_price);
    },
    taxedopt3: function () {
      return this.incTax(this.opt3_price);
    },
    taxedopt4: function () {
      return this.incTax(this.opt4_price);
    },
    taxedBasePrice: function () {
      var addPrice = 0;
      //納期までの残り日数
      var dateDiff = this.getDateDiff(this.delivery_date, (new Date()).toLocaleString());
      //割増料金
      if (21 &lt;= dateDiff &amp;&amp; dateDiff &lt; 30) {
        addPrice = this.addPrice1;
      } else if (14 &lt;= dateDiff &amp;&amp; dateDiff &lt; 21) {
        addPrice = this.addPrice2;
      } else if (7 &lt;= dateDiff &amp;&amp; dateDiff &lt; 14) {
        addPrice = this.addPrice3;
      } else if (3 &lt;= dateDiff &amp;&amp; dateDiff &lt; 7) {
        addPrice = this.addPrice4;
      } else if (dateDiff == 3) {
        addPrice = this.addPrice5;
      } else if (dateDiff == 2) {
        addPrice = this.addPrice6;
      } else if (dateDiff == 1) {
        addPrice = this.addPrice7;
      }
      return this.incTax(this.basePrice + addPrice);
    },
    taxedOptPrice: function () {
      var optPrice = 0;
      if (this.opt1_use) { optPrice += this.opt1_price; }
      if (this.opt2_use) { optPrice += this.opt2_price; }
      if (this.opt3_use) { optPrice += this.opt3_price; }
      if (this.opt4_num == &#039;&#039;) { this.opt4_num == 0; }
      optPrice += this.opt4_num * this.opt4_price;
      return this.incTax(optPrice);
    },
    taxedTotalPrice: function () {
      return (this.taxedBasePrice + this.taxedOptPrice);
    },
  },
  created: function () {
    //今日の日付取得
    var dt = new Date();
    //発表日に2か月後の日付を初期設定
    dt.setMonth(dt.getMonth() + 2);
    this.announcement_date = this.formatDate(dt);
    //DVD納品予定日をさらに1週間前に初期設定
    dt.setDate(dt.getDate() - 7);
    this.delivery_date = this.formatDate(dt);
  },
  //明日の日付をYYYY-MM-DDの書式で返すプロパティ
  tommorow: function () {
    var dt = new Date();
    dt.setDate(dt.getDate() + 1);
    return this.formatDate(dt);
  }
});
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';
?>

