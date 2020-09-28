<?php

declare(strict_types=1);

namespace App\Model\CombinationGenerator;

use App\Model\Combination\CombinationCollection;
use App\Model\Combination\NumberCombination;

final class NumberCombinationGenerator implements CombinationGeneratorInterface
{
    public function generate(int $numberOfDigits, $start = 0): CombinationCollection
    {
        $end = (int)str_pad("", $numberOfDigits, '9', STR_PAD_RIGHT);
        $combinations = CombinationCollection::create();
        for ($i = $start; $i <= $end; $i++) {
            $combinations->addItem(NumberCombination::fromIntWithDigits($i, $numberOfDigits));
        }

        return $combinations;
    }
}
