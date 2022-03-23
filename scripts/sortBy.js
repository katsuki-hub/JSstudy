//数値を通貨書式※コンポーネントより先に定義
Vue.filter('number_format', function (val) {
  return val.toLocaleString();
});

//商品一覧コンポーネント
var app = new Vue({
  el: '#app',
  data: {
    showSaleItem: false, //SALE商品のチェック状態Vue.filter
    showDelvFree: false, //送料無料のチェック状態
    sortOrder: 1, //並び替えの選択値(1:標準 2:価格が安い順)
    products: [ //商品リスト
      { id: 1, name: 'ジム<br>クライミング体験会', price: 1550, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 2, name: 'ジム<br>クライミング観戦チケット', price: 1280, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 3, name: '福岡会場<br>公式戦観戦チケット', price: 1680, image: '../images/clim.jpg', delv: 190, isSale: true },
      { id: 4, name: '外岩講習会<br>外岩クライミング体験チケット', price: 500, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 5, name: 'リード<br>リードクライミング講習', price: 890, image: '../images/clim.jpg', delv: 0, isSale: false },
      { id: 6, name: 'ロープの使い方<br>クライミング座談会', price: 990, image: '../images/clim.jpg', delv: 0, isSale: false }
    ]
  },
  computed: {
    //絞り込み後の商品リストを返す算出プロパティ
    filteredList: function () {
      var newList = [];
      for (var i = 0; i < this.products.length; i++) {
        var isShow = true;
        //i番目の商品が表示対象かどうかを判定する
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