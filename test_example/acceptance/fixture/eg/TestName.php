<?php

class TestName extends PHPFIT_Fixture_Column {
  public $hoge;
  public $foo;
  public $bar;
  protected $typeDict = array(
    'hoge' => 'integer',
    'foo' => 'integer',
    'bar' => 'integer',
    'qwerty()' => 'integer'
  );
  public function qwerty(){
    throw new Exception('t.b.d');
  }
}