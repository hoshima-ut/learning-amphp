<?php // hello-world.php

require __DIR__ . '/vendor/autoload.php';

use Amp\Future;
use function Amp\async;
use function Amp\Future\await;
use function Amp\delay;

$future1 = async(function () {
    delay(2);
    echo 'delay2';
    return 'future1';
});

$future2 = async(function () {
    delay(5);
    echo 'delay5';
    return 'future2';
});

$future3 = async(function () {
    delay(3);
    echo 'delay3';
    return 'future3';
});

echo "Let's start: ";

await([$future1, $future2, $future3]);

echo $future1;
echo $future2;
echo $future3;

echo "end";