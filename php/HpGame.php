<?php
require_once("Game.php");

class HpGame implements Game
{
  public $hitPoint;

  function __construct($point = 50)
  {
    $this->newGame($point); //インスタンスの作成と同時にゲーム開始
  }


  /*インターフェース指定メソッド*/

  public function newGame($point = 50) //ニューゲーム
  {
    $this->hitPoint = $point;
  }

  public function play() //ゲーム開始
  {
    $num = random_int(0, 50);
    if ($num % 2 == 0) { //割り切れる偶数値
      echo "{$num}ポイント回復した", "\n";
      $this->hitPoint += $num;
    } else {
      echo "{$num}ポイント消費した！！！", "\n";
      $this->hitPoint -= $num;
    }
    echo "<b>";
    echo "現在のHP{$this->hitPoint}ポイント", "\n";
    echo "</b>";
  }

  public function isAlive(): bool //勝敗のチェック
  {
    return ($this->hitPoint > 0);
  }
}
