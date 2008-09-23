<?php

/**
 * @author yusuke.hata
 */
abstract class sfPHPFitAction extends sfAction
{
  public function preExecute()
  {
    $this->setViewClass(sfConfig::get('app_fit_view_class', 'sfPHPFit'));
    sfConfig::set('sf_web_debug', false);
  }
}
