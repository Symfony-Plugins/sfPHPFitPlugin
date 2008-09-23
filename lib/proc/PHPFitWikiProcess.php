<?php

/**
 * @author yusuke.hata
 */
class PHPFitWikiProcess implements PHPFitProcess {
  private $inputDir;
  private $wiki;
  private $inputPath;
  public function __construct($params = array()){
    $ref = new ReflectionClass($params['class']);
    $this->wiki = $ref->newInstance();
    $this->inputDir = $params['input_dir'];
  }
  public function execute($name, $type){
      $htmlContents = $this->wiki->parse(file_get_contents($this->inputDir . DIRECTORY_SEPARATOR . $name));
      $input = new PHPFitTempFile('phpfit_wiki_');
      $input->setAutoDelete(false);
      $this->inputPath = $input->getPath();
      file_put_contents($this->inputPath, $htmlContents);
  }
  public function getInputPath(){
    return $this->inputPath;
  }
}