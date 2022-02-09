/*=====================
  メニュースライド
=====================*/
$("#open_btn").click(function () {
  $("#boxmenu").toggleClass('panelactive');
});

$("#boxmenu a").click(function () {
  $("#boxmenu").removeClass('panelactive');
});

$('#boxmenu a').click(function () {
  var elmHash = $(this).attr('href'); //hrefの内容を取得
  var pos = Math.round($(elmHash).offset().top - 60); //headerの高さを引く
  $('body,html').animate({ scrollTop: pos }, 1000);//※数値が大きいほどゆっくりスクロール
  return false;
});

/*=====================
TOP PAGEへ
=====================*/
function PageTopAnime() {
  var scroll = $(window).scrollTop();
  if (scroll >= 500) {
    //上から200pxスクロールしたら
    $("#page-top").removeClass("DownMove");
    $("#page-top").addClass("UpMove");
  } else {
    if ($("#page-top").hasClass("UpMove")) {
      $("#page-top").removeClass("UpMove");
      $("#page-top").addClass("DownMove");
    }
  }
}

$(window).scroll(function () {
  PageTopAnime();
});

$(window).on("load", function () {
  PageTopAnime();
});

// #page-topをクリックした際の設定
$("#page-top a").click(function () {
  $("body,html").animate({
    scrollTop: 0,
  },
    1000
  ); //ページトップスクロールの速さ。
  return false; //リンク自体の無効化
});