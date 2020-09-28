<?php

declare(strict_types=1);

namespace App\Model\Combination;


use App\Model\CombinationFilter\FilterInterface;

class CombinationCollection
{

    private array $items;

    public static function create(): CombinationCollection
    {
        return new self([]);
    }

    private function __construct(array $arr = [])
    {
        $this->items = $arr;
    }

    public function addItem(CombinationInterface $combination): self
    {
        $this->items[] = $combination->toString();
        return $this;
    }

    public function removeItem(CombinationInterface $combination): self
    {
        $this->items = array_diff($this->items, [$combination->toString()]);
        return $this;
    }

    public function applyFilter(FilterInterface $filter): self
    {
        $combinations = array_filter(
            $this->combinations(),
            static function (CombinationInterface $combination) use ($filter) {
                return $filter->apply($combination);
            }
        );

        $this->items = [];
        foreach ($combinations as $combination) {
            $this->addItem($combination);
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * @return CombinationInterface[]
     */
    public function combinations(): array
    {
        $combinations = [];
        foreach ($this->items as $item) {
            $combinations[] = NumberCombination::fromString($item);
        }

        return $combinations;
    }
}
