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

    public function guess(array $xVector): int
    {
        //normalize array keys
        $xVector = array_values($xVector);

        //check, if input vector is ok
        $this->validateVector($xVector);

        $sum = 0;
        foreach ($xVector as $key => $value) {
            $sum += $value * $this->weights[$key];
        }

        return $this->sign($sum);
    }


    /**
     * Returns 1 if float is bigger than zero, -1 otherwise
     *
     * @param float $value
     * @return int
     */
    private function sign(float $value): int
    {
        if($value > 0) {
            return 1;
        }

        return -1;
    }


    private function validateVector(array $xVector): void
    {
        // check, if vector has right length
        if(!count($xVector) === $this->length) {
            throw new InvalidArgumentException('Expected length of vector is ' . $this->length);
        }

        // check, if type of values in vector is correct
        foreach ($xVector as $value) {
            if(!in_array(gettype($value), ['integer', 'double'])) {
                throw new InvalidArgumentException('All values in vector has to bee numerical');
            }
        }
    }

}