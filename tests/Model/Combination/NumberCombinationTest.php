<?php

namespace App\Tests\Model\Combination;

use App\Model\Combination\NumberCombination;
use PHPUnit\Framework\TestCase;

class NumberCombinationTest extends TestCase
{

    /**
     * @dataProvider fromIntWithDigitsProvider
     * @param int $number
     * @param int $digits
     * @param string $expected
     */
    public function testFromIntWithDigits(int $number, int $digits, string $expected): void
    {
        $nc = NumberCombination::fromIntWithDigits($number, $digits);
        self::assertEquals($nc->toInt(), $number);
        self::assertEquals($expected, $nc->toString());
    }

    public function fromIntWithDigitsProvider(): array
    {
        return [
            [1234, 4, '1234'],
            [1, 4, '0001'],
            [1, 10, '0000000001'],
            [99999, 5, '99999']
        ];
    }

    /**
     * @param string $str
     * @param int $digits
     * @param int $number
     * @dataProvider fromStringProvider
     */
    public function testFromString(string $str, int $digits, int $number): void
    {
        $nc = NumberCombination::fromString($str);
        self::assertEquals($digits, $nc->digits());
        self::assertEquals($str, $nc->toString());
        self::assertEquals($number, $nc->toInt());
    }

    public function fromStringProvider(): array
    {
        return [
            ['1234', 4, 1234],
            ['0001', 4, 1],
            ['0000000001', 10, 1],
            ['99999', 5, 99999]
        ];
    }

    public function testToArray(): void
    {
        $nc = NumberCombination::fromString('12345');
        self::assertEquals(['1', '2', '3', '4', '5'], $nc->toArray());
    }
}
