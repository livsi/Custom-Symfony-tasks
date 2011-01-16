<?php

class generateLinkSfTask extends sfBaseTask
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
    $this->name             = 'linkSf';
    $this->briefDescription = 'Publish symlink to symfony/data/web/sf from web folder';
    $this->detailedDescription = <<<EOF
The [utask:linkSf|INFO] task will publish symlink to symfony/data/web/sf from web folder.

Call it with:

  [php symfony utask:linkSf|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    $symfonySfDir = realpath(sfConfig::get('sf_symfony_lib_dir').DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."sf");

    $this->getFilesystem()->relativeSymlink($symfonySfDir, sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.'sf', true);
  }
}
