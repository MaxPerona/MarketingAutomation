<?php

$true = true;
$i = 0;
while ($true) {
  if ($i == 9)
    echo $i . ": eseguo processo1 .. " . PHP_EOL;
  $i += 1;
  sleep(1);
}
