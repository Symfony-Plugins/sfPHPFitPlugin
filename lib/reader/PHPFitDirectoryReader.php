<?php

/**
 * @author yusuke.hata
 */
class PHPFitDirectoryReader implements PHPFitReader {
  private $inputDir;
  private $types = array('html', 'wiki');
  public function __construct($params = array()){
    $this->inputDir = $params['input_dir'];
    if(is_null($this->inputDir)){
      throw new Exception('input_dir parameter was not exist');
    }
    $this->types = $params['types'];
  }
  public function getIndexObject(){
    $input = new PHPFitDirectoryIndexObject;
    $it = new RecursiveDirectoryIterator($this->inputDir);
    foreach($it as $file){
      if($file->isDir()){
        continue;
      }
      
      $fileName = $file->getFilename();
      $parts = explode('.', $fileName);
      if(!is_array($parts)){
        continue;
      }
      
      $filExtension = end($parts);
      if(in_array($filExtension, $this->types)){
        $input->append(new PHPFitInput($fileName, $filExtension));
      }
    }
    return $input;
  }
}

/**
 * @author yusuke.hata
 */
class PHPFitDirectoryIndexObject extends ArrayIterator implements PHPFitIndexObject {
}