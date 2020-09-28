<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Combination\CombinationCollection;
use App\Model\CombinationFilter\FilterInterface;
use App\Model\CombinationGenerator\CombinationGeneratorInterface;

final class LockCombinationGenerator
{

    private CombinationCollection $combinations;

    public static function create(int $digits, CombinationGeneratorInterface $generator): LockCombinationGenerator
    {
        $combinations = $generator->generate($digits);
        return new self($combinations);
    }

    private function __construct(CombinationCollection $combinations)
    {
        $this->combinations = $combinations;
    }

    public function applyFilter(FilterInterface $filter): self
    {
        $this->combinations = $this->combinations->applyFilter($filter);
        return $this;
    }

    public function combinations(): CombinationCollection
    {
        return $this->combinations;
    }

    public function strItems(): array
    {
        return $this->combinations->items();
    }
}
