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
?>


