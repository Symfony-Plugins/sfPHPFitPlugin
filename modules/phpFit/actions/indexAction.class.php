<?php

/**
 * @author yusuke.hata
 */
class indexAction extends sfPHPFitAction
{
  public function execute($request)
  {
    $fitInput = sfConfig::get('app_fit_index', null);
    if(is_null($fitInput)){
      throw new UnexpectedValueException('config: "app_fit_index" was null');
    }
    $inputClass = $fitInput['class'];
    $inputClassParams = $fitInput['param'];
    $reflector = new ReflectionClass($inputClass);
    $input = $reflector->newInstance($inputClassParams);
    $this->index = $input->getIndexObject();
  }
}
