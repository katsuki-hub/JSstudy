//通貨書式への変換フィルター
Vue.filter('number_format', function (val) {
  return val.toLocaleString();
});

var app = new Vue({
  el: '#app',
  data: {
    taxRate: 0.1,
    movieType: '余興ムービー',
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
    announcement_date: '',
    delivery_date: '',
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
      var m = ('00' + (dt.getMonth() + 1)).slice(-2);
      var d = ('00' + dt.getDate()).slice(-2);
      return (y + '-' + m + '-' + d);
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
      if (21 <= dateDiff && dateDiff < 30) {
        addPrice = this.addPrice1;
      } else if (14 <= dateDiff && dateDiff < 21) {
        addPrice = this.addPrice2;
      } else if (7 <= dateDiff && dateDiff < 14) {
        addPrice = this.addPrice3;
      } else if (3 <= dateDiff && dateDiff < 7) {
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
      if (this.opt4_num == '') { this.opt4_num == 0; }
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