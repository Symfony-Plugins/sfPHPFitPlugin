<?php

/**
 * @author yusuke.hata
 */
interface PHPFitProcess {
  public function __construct($params = array());
  public function execute($name, $type);
  public function getInputPath();
}
