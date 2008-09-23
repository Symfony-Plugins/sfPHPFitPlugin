<?php

/**
 * @author yusuke.hata
 */
class PHPFitHTMLProcess implements PHPFitProcess {
  private $inputDir;
  private $name;
  private $type;
  public function __construct($params = array()){
    $this->inputDir = $params['input_dir'];
  }
  public function execute($name, $type){
    $this->name = $name;
    $this->type = $type;
  }
  public function getInputPath(){
    return $this->inputDir . DIRECTORY_SEPARATOR . $this->name;
  }
}