<?php

namespace Lencse\RoundPrime;


class RoundPrimeCounter
{

    /**
     * @var int[]
     */
    private $roundPrimes = [];

    /**
     * @var int[]
     */
    private $notRoundPrimes = [];

    /**
     * RoundPrimeCounter constructor.
     * @param int $limit
     */
    public function __construct($limit)
    {
        for ($i = 2; $i < $limit; ++$i) {
            $this->testNumber($i);
        }
    }

    /**
     * @param int $i
     */
    private function testNumber($i)
    {
        if ($i < 10) {
            // Egyszámjegyű prímek mindenképp bekerülnek
            if (Numbers::isPrime($i)) {
                $this->roundPrimes[] = $i;
            }
            return;
        }
        // Ha valamelyik számjegye páros, vagy 5, a forgatásnál az mindenképp a végre fog kerülni, nem lehet prím
        // str_pos gyorsabb, mint ha reguláris kifejezéssel tesztelném
        $str = (string) $i;
        if (   strpos($str, '0') !== false
            || strpos($str, '2') !== false
            || strpos($str, '4') !== false
            || strpos($str, '5') !== false
            || strpos($str, '6') !== false
            || strpos($str, '8') !== false
        ) {
            return;
        }
        // Ha már egy korábbi forgatásnál előállt a szám, és teszteltük, mehetünk tovább
        if (isset($this->notRoundPrimes[$i]) || isset($this->roundPrimes[$i])) {
            return;
        }
        $shifted = Numbers::getShiftedNumbers($i);
        $foundNotPrime = false;
        foreach ($shifted as $num) {
            if (!Numbers::isPrime($num)) {
                $foundNotPrime = true;
                foreach ($shifted as $a) {
                    // Ide gyűjtjük azokat, amik számjegyeik alapján stimmelhetnének,
                    // de valamelyik elforgatottjuk nem prím
                    $this->notRoundPrimes[$a] = $a;
                }
                break;
            }
        }
        if (!$foundNotPrime) {
            foreach ($shifted as $a) {
                $this->roundPrimes[$a] = $a;
            }
        }
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->roundPrimes);
    }

    /**
     * @return int[]
     */
    public function getRoundPrimes()
    {
        return $this->roundPrimes;
    }

}