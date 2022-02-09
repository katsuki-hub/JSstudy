<?php
require_once("Date.php");

class DeliveryDate
{
  use Date;
  public $theDate;
  public $limitDate;

  function __construct()
  {
    $now = new DateTime(); //今日の日付
    $this->theDate = $this->ymdString($now); //年月日の書式へ
    $this->limitDate = $this->addymdString($now, 20); //20日後の日付
  }
}
