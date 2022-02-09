<?php
abstract class Shop
{
  abstract function thanks(); //抽象メソッド

  protected $sales = 0;
  protected function sell($price){
    if(is_numeric($price)) { //引数が数値型の変数として有効な値である場合にTRUEを返す
      echo "{$price}円です。";
      $this->sales += $price;
    }
    $this->thanks(); //子クラスで実装されるメソッドを呼び出す
  }
}