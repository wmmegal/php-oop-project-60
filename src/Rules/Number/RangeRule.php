<?php

namespace Validator\Rules\Number;

use Validator\Rules\RuleInterface;

readonly class RangeRule implements RuleInterface
{
    public function __construct(
        private int $from,
        private int $to
    ) {
    }

    public function getName(): string
    {
        return 'range';
    }

    public function check(?int $value = 0): bool
    {
        return $value >= $this->from && $value <= $this->to;
    }
}
