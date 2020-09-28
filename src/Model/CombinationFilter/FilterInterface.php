<?php

declare(strict_types=1);

namespace App\Model\CombinationFilter;

use App\Model\Combination\CombinationInterface;

interface FilterInterface
{
    public function apply(CombinationInterface $combination): bool;
}
