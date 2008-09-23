<?php

/**
 * @author yusuke.hata
 */
class processAction extends sfPHPFitAction
{
  public function execute($request)
  {
    $fitProcess = sfConfig::get('app_fit_process', null);
    if(is_null($fitProcess)){
      throw new UnexpectedValueException('config: "app_fit_index" was null');
    }
    $fixturePath = sfConfig::get('app_fit_fixture_dir', null);
    $name = $request->getParameter('in');
    $type = $request->getParameter('type');
    
    $fitProcessType = $fitProcess[$type];
    $fitProcessClass = $fitProcessType['class'];
    $fitProcessClassParams = $fitProcessType['param'];
    
    $reflector = new ReflectionClass($fitProcessClass);
    $process = $reflector->newInstance($fitProcessClassParams);
    $process->execute($name, $type);
    $inputPath = $process->getInputPath();

    $output = new PHPFitTempFile;
    $outputPath = $output->getPath();
    
    $runner = new PHPFIT_FileRunner;
    $this->result = $runner->run($inputPath, $outputPath, $fixturePath);
    $this->testOutput = file_get_contents($outputPath);
  }
}
