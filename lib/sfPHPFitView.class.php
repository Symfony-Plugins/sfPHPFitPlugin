<?php

/**
 * @author yusuke.hata
 */
class sfPHPFitView extends sfPHPView
{
  public function execute()
  {
    $this->setDecoratorTemplate(dirname(__FILE__) . '/../templates/phpFitLayout.php');
    return parent::execute();
  }
}
