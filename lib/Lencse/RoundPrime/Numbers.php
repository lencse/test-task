<?php

namespace Lencse\RoundPrime;


class Numbers
{

    /**
     * @param $a int
     * @return bool
     */
    public static function isPrime($a)
    {
        if ($a == 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($a); ++$i) {
            if ($a % $i == 0) {
                return false;
            }
        }

        return true;
    }

    /**
     * A szám elforgatott változataival tér vissza
     * 0-t tartalmazó számokra nem működik jól, de ezeket már úgyis kiszórtuk
     *
     * @param $a int
     * @return int[]
     */
    public static function getShiftedNumbers($a)
    {
        $ret = [$a];
        for ($i = 0; $i < floor(log($a, 10)); ++$i) {
            $a = self::shift($a);
            $ret[] = $a;
        }

        return $ret;
    }

    /**
     * @param $a int
     * @return int
     */
    private static function shift($a)
    {
        $shift = floor($a / pow(10, floor(log($a, 10))));

        return ($a * 10 + $shift) % ($shift * pow(10, ceil(log($a, 10))));
    }

}