<?php
//配列データは外部ファイルやデータベースからの読み込みにした方がいい
$couponList = ["kkpp" => 0.75, "nnpp" => 0.8, "aapp" => 0.85];
$priceList = ["xp10" => 12000, "win11" => 38000];

function getCouponRate($code) //コードで割引率を調べて返す
{
  global $couponList;
  $isCouponCode = array_key_exists($code, $couponList); //該当するコードがあるかチェック
  if ($isCouponCode) {
    return $couponList[$code]; //割引率を返す
  } else {
    return NULL; //見つからなかったらNULLを返す
  }
}

function getPrice($id) //商品IDで価格を調べて返す
{
  global $priceList;
  $isGoodsID = array_key_exists($id, $priceList);
  if ($isGoodsID) {
    return $priceList[$id]; //価格を返す
  } else {
    return Null; //見つからなかったらNULLを返す
  }
}
