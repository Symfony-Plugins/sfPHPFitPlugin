<?php

/**
 * @author yusuke.hata
 */
class PHPFitAggregateReader implements PHPFitReader {
  private $indexObject;
  public function __construct($params = array()){
    $this->indexObject = new PHPFitAggregateIndexObject;
    foreach($params as $key => $value){
      $ref = new ReflectionClass($value['class']);
      $reader = $ref->newInstance($value['param']);
      $this->indexObject->add($reader->getIndexObject());
    }
  }
  public function getIndexObject(){
    $this->indexObject->rewind();
    return $this->indexObject;
  }
}

/**
 * @author yusuke.hata
 */
class PHPFitAggregateIndexObject implements PHPFitIndexObject {
  private $indexes;
  private $iterator;
  public function __construct(){
    $this->indexes = new ArrayObject;
  }
  public function add(PHPFitIndexObject $indexObject){
    $this->indexes->append($indexObject);
    $this->indexes->setIteratorClass('RecursiveArrayIterator');
  }
  public function rewind(){
    $this->iterator = new RecursiveIteratorIterator($this->indexes->getIterator(), RecursiveIteratorIterator::SELF_FIRST);
    return $this->iterator->rewind();
  }
  public function current(){
    return $this->iterator->current();
  }
  public function key(){
    return $this->iterator->key();
  }
  public function next(){
    return $this->iterator->next();
  }
  public function valid(){
    if(null === $this->iterator){
      return false;
    }
    return $this->iterator->valid();
  }
}
