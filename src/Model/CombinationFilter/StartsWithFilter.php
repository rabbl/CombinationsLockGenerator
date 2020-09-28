<?php

declare(strict_types=1);

namespace App\Model\CombinationFilter;

use App\Model\Combination\CombinationInterface;

/**
 * Class StartsWithFilter
 * @package App\Model\CombinationFilter
 */
class StartsWithFilter implements FilterInterface
{

    private array $chars;

    public static function create(array $chars): StartsWithFilter
    {
        return new self($chars);
    }

    final private function __construct(array $chars)
    {
        $this->chars = $chars;
    }

    /**
     * @param CombinationInterface $combination
     * @return bool
     *
     * returns true for all items which are starting with one of the given chars
     */
    public function apply(CombinationInterface $combination): bool
    {
        // Todo -> regexp is possibly faster
        if (in_array($combination->toArray()[0], $this->chars, true)) {
            return true;
        }

        return false;
    }
}
