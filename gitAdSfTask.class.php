<?php

class gitAdSfTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    // // add your own options here
    // $this->addOptions(array(
    //   new sfCommandOption('my_option', null, sfCommandOption::PARAMETER_REQUIRED, 'My option'),
    // ));

    $this->namespace        = 'utask';
    $this->name             = 'sf';
    $this->briefDescription = 'Generate .sf files in cache/ and log/';
    $this->detailedDescription = <<<EOF
The [utask:sf|INFO] task generate .sf files in cache/ and log/ for add this empty folders in git.

Call it with:

  [php symfony utask:sf|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {

    $this->getFilesystem()->touch(array(sfConfig::get('sf_log_dir').DIRECTORY_SEPARATOR.'.sf', sfConfig::get('sf_cache_dir').DIRECTORY_SEPARATOR.'.sf'));
  }
}
