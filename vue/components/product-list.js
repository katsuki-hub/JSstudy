Vue.component('product-list', {
  template: `
    <div class="container">
      <product-header
        v-bind:count="filteredList.length"
        v-bind:showSaleItem="showSaleItem"
        v-bind:showDelvFree="showDelvFree"
        v-bind:sortOrder="sortOrder"
        v-on:showSaleItemChanged="showSaleItem=!showSaleItem"
        v-on:showDelvFreeChanged="showDelvFree=!showDelvFree"
        v-on:sortOrderChanged="sortOrderChanged">
      </product-header>
      <div class="br200"></div>
      <div class="list">
        <product
          v-for="product in filteredList"
          v-bind:product="product"
          v-bind:key="product.id">
        </product>
      </div>
    </div>`,
  components: {
    'product-header': productHeader,
    'product': product
  },
  props: ['products'],
  data: function () {
    return {
      showSaleItem: false,
      showDelvFree: false,
      sortOrder: 1
    }
  },
  methods: {
    //並び替えの選択が変わったときに呼び出されるメソッド
    sortOrderChanged: function (order) {
      this.sortOrder = order;
    }
  },
  computed: {
    filteredList: function () {
      var newList = [];
      for (var i = 0; i < this.products.length; i++) {
        var isShow = true;
        if (this.showSaleItem && !this.products[i].isSale) {
          isShow = false;
        }
        if (this.showDelvFree && this.products[i].delv > 0) {
          isShow = false;
        }
        if (isShow) {
          newList.push(this.products[i]);
        }
      }
      if (this.sortOrder == 1) {
        //元の順番にpushしているので並び替え済み
      } else if (this.sortOrder == 2) {
        newList.sort(function (a, b) {
          return a.price - b.price;
        });
      }
      return newList;
    }
  }
});