<?php
interface Game
{
  function newGame($point); //引数が1個ある
  function play();
  function isAlive(): bool;
}
//論理値（bool、boolean）とは、真か偽かを表す変数の型のことです。真の場合は「true」、偽の場合は「false」の値をそれぞれ持ちます