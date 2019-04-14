<?php

require __DIR__."/../vendor/autoload.php";

use Faktory\Queue\FaktoryClient;
use Faktory\Queue\FaktoryWorker;

$client = new FaktoryClient('faktory', '7419');
$worker = new FaktoryWorker($client);

$worker->register('cooljob', function($job) {
    echo "something cool: ".$job['args'][0].' '.$job['args'][1]."\n";
});

$worker->register('cooljob2', function($job) {
    echo "This is cooler: ".$job['args'][0].' '.$job['args'][1]."\n";
});

$worker->run(true);