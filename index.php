<?php

use Pavlix\Perceptron\Perceptron;

require_once 'Perceptron.php';



$perceptron = new Perceptron(2 );

$trainingArray = [];
for($i = 0; $i < 100; $i++)
{
    $randomPoint = [rand(0, 1000), rand(0, 1000)];
    $value = $randomPoint[0] > $randomPoint[1] ? 1 : -1;

    $trainingArray[] = [
        'point' => $randomPoint,
        'value' => $value,
    ];

    $perceptron->train($randomPoint, $value);
}

$guess = $perceptron->guess([500, 100]);

var_dump($guess);