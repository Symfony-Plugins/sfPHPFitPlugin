<?php

/**
 * @author yusuke.hata
 */
interface PHPFitWiki {
  public function __construct($options = array());
  public function parse($text);
}
