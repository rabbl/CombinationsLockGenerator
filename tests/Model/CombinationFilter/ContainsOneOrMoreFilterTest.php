<?php

namespace App\Tests\Model\CombinationFilter;

use App\Model\Combination\NumberCombination;
use App\Model\CombinationFilter\ContainsOneOrMoreFilter;
use PHPUnit\Framework\TestCase;

class ContainsOneOrMoreFilterTest extends TestCase
{

    /**
     * @param string $combinationStr
     * @param string $filterChar
     * @param bool $result
     * @dataProvider applyFilterDataProvider
     */
    public function testApplyFilter(string $combinationStr, string $filterChar, bool $result): void
    {
        $nc = NumberCombination::fromString($combinationStr);
        $filter = ContainsOneOrMoreFilter::create($filterChar);
        self::assertEquals($result, $filter->apply($nc));
    }

    public function applyFilterDataProvider(): array
    {
        return [
            ['1234', '4', true],
            ['2234', '1', false],
        ];
    }
}
