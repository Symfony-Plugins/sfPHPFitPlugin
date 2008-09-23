<?php

/**
 * @author yusuke.hata
 */
class sfPHPFitRouting
{
  public static function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $subject = $event->getSubject();
    $subject->prependRoute('fit_web_index', '/fit', array('module' => 'phpFit', 'action' => 'index'), array());
    $subject->prependRoute('fit_web_index_alt', '/fit/index', array('module' => 'phpFit', 'action' => 'index'), array());
    $subject->prependRoute('fit_web_test', '/fit/process', array('module' => 'phpFit', 'action' => 'process'), array());
  }
}
