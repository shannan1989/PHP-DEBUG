<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;

$logger = new Logger('append');
$logger->pushHandler(new BrowserConsoleHandler());
$logger->pushProcessor(new MemoryPeakUsageProcessor());
$logger->pushProcessor(new MemoryUsageProcessor());

$logger->info('Peak memory usage', ['size' => (memory_get_peak_usage(true) / 1024 / 1024) . ' MB']);
