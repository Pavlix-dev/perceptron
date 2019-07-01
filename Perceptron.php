<?php


class Perceptron
{
    /**
     * Vector length
     *
     * @var int
     */
    private $length;

    /**
     * Perceptron weights
     * array of float
     *
     * @var array
     */
    private $weights;

    public function __construct(int $length)
    {
        $this->length = $length;

        for ($i = 0; $i < $length; $i++) {
            //set random value in interval <-1, 1> for every weight
            $this->weights[] = mt_rand(-mt_getrandmax(), mt_getrandmax()) / mt_getrandmax();
        }
    }



}