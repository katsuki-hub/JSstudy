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

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';
?>

