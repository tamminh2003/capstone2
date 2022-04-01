<?php

namespace Utility;

class Utility
{
  public function __construct()
  {
  }

  static function log($string)
  {
    $output = "[" . date("D M d h:i:s Y", time()) . "] " . "$string\n";
    file_put_contents("php://stderr", $output);
  }
}
