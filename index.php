<?php
require_once 'Perceptron.php';

$perceptron = new Perceptron(2 );

var_dump($perceptron->guess([1, 2]));