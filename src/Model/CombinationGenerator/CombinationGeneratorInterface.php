<?php

declare(strict_types=1);

namespace App\Model\CombinationGenerator;

use App\Model\Combination\CombinationCollection;

interface CombinationGeneratorInterface
{
    public function generate(int $numberOfDigits): CombinationCollection;
}
