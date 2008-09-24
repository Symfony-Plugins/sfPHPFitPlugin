<?php

if(in_array('phpFit', sfConfig::get('sf_enabled_modules', array()))){
  set_include_path(sfConfig::get('sf_plugins_dir') . '/sfPHPFitPlugin/lib/vendor/phpfit' . PATH_SEPARATOR . get_include_path());
  $this->dispatcher->connect('routing.load_configuration', array('sfPHPFitRouting', 'listenToRoutingLoadConfigurationEvent'));
}
