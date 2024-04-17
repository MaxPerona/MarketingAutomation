<?php

namespace MarketingAutomation;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\PhpSubprocess;



class MarketingAutomation
{
  private $test = "test";
  private $workingDir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;



  function __construct($test)
  {
    $this->test = $test;
  }

  function runP1()
  {
    $process = new PhpSubprocess(["process1.php"], $this->workingDir, null, 10);
    $process->start();
    echo "Sto eseguendo mentre il processo 1 è stato avviato: " . PHP_EOL;
    $process->wait();
    echo "fine processo 1. " . PHP_EOL;
    if (!$process->isSuccessful()) {
      throw new ProcessFailedException($process);
    }
    return $process->getOutput();
  }


  function runP2()
  {
    $process = new PhpSubprocess(["process2.php"], $this->workingDir, null, 10);
    echo "Sto per eseguire processo 2" . PHP_EOL;
    $process->run(function ($type, $buffer): void {
      if (PhpSubprocess::ERR === $type) {
        echo 'ERR > ' . $buffer;
      } else {
        echo 'OUT > ' . $buffer;
      }
    });
    echo "fine processo 2";
    if (!$process->isSuccessful()) {
      throw new ProcessFailedException($process);
    }
    $process->getOutput();
  }
}
