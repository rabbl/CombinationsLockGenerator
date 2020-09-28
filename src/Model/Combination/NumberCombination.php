<?php

declare(strict_types=1);

namespace App\Model\Combination;


final class NumberCombination implements CombinationInterface
{

    private string $combination;

    public static function fromIntWithDigits(int $number, int $digits): NumberCombination
    {
        // Todo validation $number not larger then $digits
        return new self(str_pad((string)$number, $digits, '0', STR_PAD_LEFT));
    }

    public static function fromString(string $combination): NumberCombination
    {
        return new self($combination);
    }

    private function __construct(string $combination)
    {
        $this->combination = $combination;
    }

    public function toInt(): int
    {
        return (int)$this->combination;
    }

    public function toString(): string
    {
        return $this->combination;
    }

    public function digits(): int
    {
        if (null !== $this->combination) {
            return strlen($this->combination);
        }

        return 0;
    }

    public function toArray(): array
    {
        return str_split($this->combination);
    }
}
