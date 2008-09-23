<?php

/**
 * @author yusuke.hata
 */
class PHPFitInput {
  public $name;
  public $type;
  public function __construct($name, $type){
    $this->name = $name;
    $this->type = $type;
  }
}
