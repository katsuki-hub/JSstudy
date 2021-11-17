<?php
class Climber
{
  public $name;
  public $score;

  function __construct($name = '名無し', $score = 0) //引数が省略された場合のコンストラクタ初期値
  {
    $this->name = $name;
    $this->score = $score;
  }

  public function __toString() //ストリングにキャストされたとき返す文字列
  {
    return $this->name;
    return $this->score;
  }

  public function who() //インスタンスメソッド
  {
    echo "{$this->name}です。", "\n";
  }

  public function yosen()
  {
    echo "{$this->name}の予選リザルトは{$this->score}点です。", "\n";
  }
}
