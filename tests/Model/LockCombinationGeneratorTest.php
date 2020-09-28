<?php

namespace App\Tests\Model;

use App\Model\CombinationFilter\ContainsOneOrMoreFilter;
use App\Model\CombinationFilter\NotContainsFilter;
use App\Model\CombinationFilter\StartsWithFilter;
use App\Model\CombinationGenerator\NumberCombinationGenerator;
use App\Model\LockCombinationGenerator;
use PHPUnit\Framework\TestCase;

class LockCombinationGeneratorTest extends TestCase
{
    public function testGenerateItems(): void
    {
        $lcg = LockCombinationGenerator::create(2, new NumberCombinationGenerator());
        self::assertCount(100, $lcg->strItems());
        self::assertEquals('55', $lcg->strItems()[55]);
    }

    public function testGenerateFilterItemsWithStartsWithFilter(): void
    {
        $lcg = LockCombinationGenerator::create(2, new NumberCombinationGenerator());
        $lcg = $lcg->applyFilter(StartsWithFilter::create(['1', '3']));
        self::assertCount(20, $lcg->strItems());
        self::assertEquals([
            '10', '11', '12', '13', '14', '15', '16', '17', '18', '19',
            '30', '31', '32', '33', '34', '35', '36', '37', '38', '39'
        ], $lcg->strItems());
    }

    public function testContainsOneOrMoreFilter(): void
    {
        $lcg = LockCombinationGenerator::create(2, new NumberCombinationGenerator());
        $lcg = $lcg->applyFilter(ContainsOneOrMoreFilter::create('1'));
        self::assertCount(19, $lcg->strItems());
        self::assertEquals([
            '01', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19',
            '21', '31', '41', '51', '61', '71', '81', '91'
        ], $lcg->strItems());
    }

    public function testNotContainsFilter(): void
    {
        $lcg = LockCombinationGenerator::create(2, new NumberCombinationGenerator());
        $lcg = $lcg->applyFilter(NotContainsFilter::create('4'));
        self::assertCount(81, $lcg->strItems());
    }
}
