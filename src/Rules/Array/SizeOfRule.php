<?php

namespace Validator\Rules\Array;

use Validator\Rules\RuleInterface;

readonly class SizeOfRule implements RuleInterface
{
    public function __construct(
        private int $size
    ) {
    }

    public function getName(): string
    {
        return 'sizeOf';
    }

    public function check(array $value = []): bool
    {
        return count($value) >= $this->size;
    }
}