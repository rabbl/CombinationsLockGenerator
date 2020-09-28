<?php

declare(strict_types=1);

namespace App\Model\CombinationFilter;

use App\Model\Combination\CombinationInterface;

class ContainsOneOrMoreFilter implements FilterInterface
{

    private string $char;

    public static function create(string $char): ContainsOneOrMoreFilter
    {
        return new self($char);
    }

    final private function __construct(string $char)
    {
        $this->char = $char;
    }

    /**
     * @param CombinationInterface $combination
     * @return bool
     *
     * returns true for all items which are starting with one of the given chars
     */
    public function apply(CombinationInterface $combination): bool
    {
        if (preg_match(sprintf("/[%s]/i", $this->char), $combination->toString())) {
            return true;
        }

        return false;
    }
}

