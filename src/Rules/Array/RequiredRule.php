<?php

namespace Validator\Rules\Array;

use Validator\Rules\RuleInterface;

class RequiredRule implements RuleInterface
{
    public function getName(): string
    {
        return 'required';
    }

    public function check(?array $value = null): bool
    {
        return is_array($value);
    }
}