<?php

if(in_array('phpFit', sfConfig::get('sf_enabled_modules', array()))){
  $this->dispatcher->connect('routing.load_configuration', array('sfPHPFitRouting', 'listenToRoutingLoadConfigurationEvent'));
}
