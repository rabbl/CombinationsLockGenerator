<?php

namespace App\Tests\Model\CombinationFilter;

use App\Model\Combination\NumberCombination;
use App\Model\CombinationFilter\StartsWithFilter;
use PHPUnit\Framework\TestCase;

class StartsWithFilterTest extends TestCase
{

    /**
     * @param string $combinationStr
     * @param array $filterChars
     * @param bool $result
     * @dataProvider applyFilterDataProvider
     */
    public function testApplyFilter(string $combinationStr, array $filterChars, bool $result): void
    {
        $nc = NumberCombination::fromString($combinationStr);
        $filter = StartsWithFilter::create($filterChars);
        self::assertEquals($result, $filter->apply($nc));
    }

    public function applyFilterDataProvider(): array
    {
        return [
            ['1234', ['4'], false],
            ['1234', ['1'], true],
            ['1234', ['1', '2', '3', '4'], true],
        ];
    }
}
