<?php
/**
 * Created by PhpStorm.
 * User: Lilla
 * Date: 2016.05.04.
 * Time: 12:32
 */

namespace Lencse\Test\RoundPrime;


use Lencse\RoundPrime\RoundPrimeCounter;
use Lencse\Triangle\Triangle;

class TriangleTest extends \PHPUnit_Framework_TestCase
{

    public function testPossibleWays()
    {
        $this->assertEquals(8, $this->getTriangle()->getPossibleWays());
    }

    public function testMaxWaySum()
    {
        $this->assertEquals(14, $this->getTriangle()->getMaxWaySum());
    }

    public function testEmptyInput()
    {
        try {
            $triangle = new Triangle([]);
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception not thrown');
    }

    public function testBadInput()
    {
        try {
            $triangle = new Triangle([
                '1',
                '1 2a'
            ]);
        }
        catch (\InvalidArgumentException $e) {
            return;
        }
        $this->fail('Exception not thrown');
    }

    public function testParse()
    {
        $triangle = new Triangle([
            '1',
            '2 1',
            '4 1',
            '2 2 3 4'
        ]);
        $this->assertEquals(3, $triangle->getMaxWaySum());
    }

    /**
     * @return Triangle
     */
    private function getTriangle()
    {
        return new Triangle([
            '1',
            '2 1',
            '4 1 8',
            '2 2 3 4'
        ]);
    }

}