var app = new Vue({
  el: '#app',
  data: {
    //商品リスト
    products: [
      { id: 1, name: 'ジム<br>クライミング体験会', price: 1550, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 2, name: 'ジム<br>クライミング観戦チケット', price: 1280, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 3, name: '福岡会場<br>公式戦観戦チケット', price: 1680, image: '../images/clim.jpg', delv: 190, isSale: true },
      { id: 4, name: '外岩講習会<br>外岩クライミング体験チケット', price: 500, image: '../images/clim.jpg', delv: 0, isSale: true },
      { id: 5, name: 'リード<br>リードクライミング講習', price: 890, image: '../images/clim.jpg', delv: 0, isSale: false },
      { id: 6, name: 'ロープの使い方<br>クライミング座談会', price: 990, image: '../images/clim.jpg', delv: 0, isSale: false }
    ]
  }
});