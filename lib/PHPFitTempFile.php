<?php

/**
 * @author yusuke.hata
 */
class PHPFitTempFile {
  private $autoDelete = true;
  private $path;
  public function __construct($prefix = 'phpfit_'){
    $this->path = tempnam(sys_get_temp_dir(), $prefix);
    if(false === $this->path){
      throw new RuntimeException('tempnam creation fail');
    }
  }
  public function __destruct(){
    if($this->autoDelete){
      unlink($this->path);
    }
  }
  public function setAutoDelete($autoDelete){
    $this->autoDelete = $autoDelete;
  }
  public function getPath(){
    return $this->path;
  }
}
