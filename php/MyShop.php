<?php
require_once("Shop.php");

class MyShop extends Shop
{
  public function thanks() //抽象クラスで指定されているメソッド
  {
    echo "ありがとうございました。", "\n";
  }

  public function selling($tanka, $kosu) //販売する⇒抽象クラスから継承しているメソッドを実行
  {
    $price = $tanka * $kosu;
    $this->sell($price);
  }

  public function getSelling() //売上合計を出す
  {
    echo "売上合計は、{$this->sales}円です。";
  }
}
