<?php

namespace MarketingAutomation;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\PhpSubprocess;



class MarketingAutomation
{
  private $test = "test";
  private $processDir;

  private $processes = [];

  function __construct($test)
  {
    $this->test = $test;
    // Imposta il percorso della directory dei processi
    $this->processDir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "processes" . DIRECTORY_SEPARATOR;
    $this->loadProcesses();
  }

  function loadProcesses()
  {
    if (!is_dir($this->processDir)) {
      echo "Directory dei processi non trovata.";
      return;
    }
    $files = scandir($this->processDir);
    if ($files === false) {
      echo "Errore durante la lettura della directory.";
      return;
    }
    foreach ($files as $file) {
      if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $this->processes[] = $file;
      }
    }
  }
}
