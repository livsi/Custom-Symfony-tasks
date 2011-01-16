<?php
/**
 * Clears the symfony cache.
 *
 * @author LiVsI
 */
class gitLogClearTask extends sfLogClearTask{
  protected function configure()
  {
    $this->namespace = 'log';
    $this->name = 'clear-sf';
    $this->briefDescription = 'Clears log files, exclude .sf files';

    $this->detailedDescription = <<<EOF
The [log:clear|INFO] task clears all symfony log files:

  [./symfony log:clear|INFO]
EOF;
  }
  protected function execute($arguments = array(), $options = array())
  {
    $logs = sfFinder::type('file')->discard('.sf')->in(sfConfig::get('sf_log_dir'));
    $this->getFilesystem()->remove($logs);
  }
}
