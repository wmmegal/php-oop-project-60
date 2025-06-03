<?php

namespace Validator\Rules\Number;

use Validator\Rules\RuleInterface;

class PositiveRule implements RuleInterface
{
    public function getName(): string
    {
        return 'positive';
    }

    public function check(?int $value = 0): bool
    {
        return is_integer($value) && $value > 0;
    }
}
