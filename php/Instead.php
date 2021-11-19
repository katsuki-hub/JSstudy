<?php
require_once("Momotaro.php");
require_once("Orihime.php");

class Instead
{
  use Momotaro, Orihime {
    Momotaro::hello as Momohello;
    Orihime::hello insteadof Momotaro;
  }
}
