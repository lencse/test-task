<?php

namespace Lencse\Test\RoundPrime;


use Lencse\RoundPrime\RoundPrimeCounter;

class RoundPrimeCounterTest extends \PHPUnit_Framework_TestCase
{

    public function testCounter()
    {
        $counter = new RoundPrimeCounter(1e4);
        $this->assertTrue(in_array(7, $counter->getRoundPrimes()));
        $this->assertTrue(in_array(719, $counter->getRoundPrimes()));
        $this->assertTrue(in_array(197, $counter->getRoundPrimes()));
        $this->assertFalse(in_array(22, $counter->getRoundPrimes()));
        $this->assertFalse(in_array(100, $counter->getRoundPrimes()));
        $this->assertFalse(in_array(3111, $counter->getRoundPrimes()));
    }

}