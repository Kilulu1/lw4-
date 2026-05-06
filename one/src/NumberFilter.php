<?php

namespace NumberFilterLib;

class NumberFilter
{
    private array $numbers = [];
    public function addNumber(int $num): void
    {
        $this->numbers[] = $num;
    }
    public function getEven(): array
    {
        return array_values(array_filter($this->numbers, function (int $num): bool {
            return $num % 2 === 0;
        }));
    }
    public function getOdd(): array
    {
        return array_values(array_filter($this->numbers, function (int $num): bool {
            return $num % 2 !== 0;
        }));
    }

    public function getGreaterThan(int $value): array
    {
        return array_values(array_filter($this->numbers, function (int $num) use ($value): bool {
            return $num > $value;
        }));
    }
}