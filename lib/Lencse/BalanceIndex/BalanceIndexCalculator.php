<?php

namespace Lencse\BalanceIndex;


class BalanceIndexCalculator
{

    /**
     * @var int[]
     */
    private $arr;

    /**
     * BalanceIndexCalculator constructor.
     * @param array $arr
     */
    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * @return int
     */
    public function getBalanceIndex()
    {
        $right = [];
        $left = [];
        $arr = $this->arr;
        $n = count($arr);

        $right[$n-1] = 0;
        for ($i = $n-2; $i >= 0; --$i) {
            $right[$i] = $right[$i+1] + $arr[$i+1];
        }

        if ($right[0] == 0) {
            return 0;
        }
        $left[0] = 0;
        for ($i = 1; $i < $n; ++$i) {
            $left[$i] = $left[$i-1] + $arr[$i-1];
            if ($left[$i] == $right[$i]) {
                return $i;
            }
        }

        return -1;
    }

}