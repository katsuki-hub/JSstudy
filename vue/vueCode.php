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

$a = '<pre><code class="prettyprint">
</code></pre>';
?>

