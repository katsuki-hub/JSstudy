<?php
trait Date
{
  public function ymdString($date)
  { //DateTimeを年月日の書式で返す
    $dateString = $date->format('y年m月d日');
    return $dateString;
  }
  public function addymdString($date, $days)
  { //指定日数後の年月日で返す
    $date->add(new DateInterval("P{$days}D"));
    return $this->ymdString($date);
  }
}
