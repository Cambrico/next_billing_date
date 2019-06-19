<?php

namespace Cambrico\NextBillingDate;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Cambrico\NextBillingDate\NextBillingDate
 */
class NextBillingDateTest extends TestCase
{
    /**
     * @covers ::calculate
     * @covers ::shouldBeFixed
     */
    public function testNextBillingDate()
    {
        $lastBillingDate = new \DateTime('2019-01-31');
        $periodExpected = [
            1 => '2019-02-28',
            3 => '2019-04-30',
            6 => '2019-07-31',
            12 => '2020-01-31',
        ];

        foreach ($periodExpected as $period => $expected) {
            $nextBillingDate = NextBillingDate::calculate($lastBillingDate, $period);

            $this->assertEquals($expected, $nextBillingDate->format('Y-m-d'));
        }
    }
}
