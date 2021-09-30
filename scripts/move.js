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