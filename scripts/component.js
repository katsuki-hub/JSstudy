var app = new Vue({
  el: '#app',
  data: {
    price: 990
  },
  methods: {
    priceDown: function () {
      this.price -= 100;
    }
  }
});