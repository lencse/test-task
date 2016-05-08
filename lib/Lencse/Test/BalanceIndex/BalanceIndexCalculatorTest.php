<?php

namespace Lencse\Test\BalanceIndex;


use Lencse\BalanceIndex\BalanceIndexCalculator;

class BalanceIndexCalculatorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetBalanceIndex()
    {
        $calculator = new BalanceIndexCalculator([-7, 1, 5, 2, -4, 3, 0]);
        $this->assertEquals(3, $calculator->getBalanceIndex());
    }

    public function testGetBalanceIndexOnTheRight()
    {
        $calculator = new BalanceIndexCalculator([3, -3, 1]);
        $this->assertEquals(2, $calculator->getBalanceIndex());
    }

    public function testGetBalanceIndexOnTheLeft()
    {
        $calculator = new BalanceIndexCalculator([1, 3, -3]);
        $this->assertEquals(0, $calculator->getBalanceIndex());
    }

    public function testGetBalanceIndexWhenNotFound()
    {
        $calculator = new BalanceIndexCalculator([1, 2]);
        $this->assertEquals(-1, $calculator->getBalanceIndex());
    }

}