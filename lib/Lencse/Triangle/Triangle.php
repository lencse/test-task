<?php

namespace Lencse\Triangle;


class Triangle
{

    /**
     * @var int
     */
    private $n;

    /**
     * @var int[]
     */
    private $sum = [];

    /**
     * Triangle constructor.
     * @param string[] $lines
     */
    public function __construct(array $lines)
    {
        if (!count($lines)) {
            $this->badInputError();
        }
        $preSum = [0];
        $sum = [];
        $n = 0;
        for ($i = 0; $i < count($lines); ++$i) {
            if (!preg_match('/^(\d|-)(\d|-| )*$/', $lines[$i])) {
                $this->badInputError();
            }
            $nums = explode(' ', $lines[$i]);
            if (count($nums) < $i + 1 ) {
                break;
            }
            ++$n;
            for ($j = 0; $j <= $i; ++$j) {
                $num = (int) $nums[$j];
                if ($j == 0) {
                    $sum[$j] = $preSum[$j] + $num;
                    continue;
                }
                if ($j == $i) {
                    $sum[$j] = $preSum[$j - 1] + $num;
                    continue;
                }
                $sum[$j] = max($preSum[$j], $preSum[$j - 1]) + $num;
            }
            $preSum = $sum;
        }
        $this->n = $n;
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getPossibleWays()
    {
        if (extension_loaded('gmp')) {
            return gmp_pow('2', $this->n-1);
        }
        elseif ($this->n < 32) {
            return pow(2, $this->n - 1);
        }
        else {
            throw new \OverflowException('Cannot calculate possible way count');
        }
    }

    /**
     * @return int
     */
    public function getMaxWaySum()
    {
        return max($this->sum);
    }

    private function badInputError()
    {
        throw new \InvalidArgumentException('Bad input');
    }

}