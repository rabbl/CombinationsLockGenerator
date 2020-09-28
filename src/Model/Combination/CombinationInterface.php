<?php

declare(strict_types=1);

namespace App\Model\Combination;


interface CombinationInterface
{

    public static function fromString(string $combination): CombinationInterface;

    public function toString(): string;

    public function digits(): int;

    public function toArray(): array;
}
