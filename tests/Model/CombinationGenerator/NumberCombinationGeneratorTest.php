<?php

namespace App\Tests\Model\CombinationGenerator;

use App\Model\Combination\CombinationCollection;
use App\Model\CombinationGenerator\NumberCombinationGenerator;
use PHPUnit\Framework\TestCase;

class NumberCombinationGeneratorTest extends TestCase
{
    public function testGeneration(): void
    {
        $cc = (new NumberCombinationGenerator())->generate(3, 0);
        self::assertInstanceOf(CombinationCollection::class, $cc);
        self::assertCount(1000, $cc->items());
        self::assertEquals('099', $cc->items()[99]);
    }
}
