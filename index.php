<?php

require "vendor/autoload.php";

use MarketingAutomation\MarketingAutomation;

$MA = new MarketingAutomation("aaaaaa");
$response = $MA->runP1();
echo $response;
