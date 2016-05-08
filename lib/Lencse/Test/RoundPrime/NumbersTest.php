<?php

namespace Lencse\Test\RoundPrime;


use Lencse\RoundPrime\Numbers;

class NumbersTest extends \PHPUnit_Framework_TestCase
{

    public function testGetShiftedNumbers()
    {
        $this->assertEquals([719, 197, 971], Numbers::getShiftedNumbers(719));
    }

    public function testIsPrime()
    {
        $this->assertTrue(Numbers::isPrime(2));
        $this->assertTrue(Numbers::isPrime(3));
        $this->assertTrue(Numbers::isPrime(5));
        $this->assertTrue(Numbers::isPrime(719));

        $this->assertFalse(Numbers::isPrime(1));
        $this->assertFalse(Numbers::isPrime(4));
        $this->assertFalse(Numbers::isPrime(6));
        $this->assertFalse(Numbers::isPrime(363));
    }

}