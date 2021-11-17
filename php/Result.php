<?php
require_once("Climber.php"); //親クラス読み込み

class Result extends Climber
{
    public function yosen()
    {
        echo "{$this->name}の予選リザルトは{$this->score}点です。", "\n";
    }
}
