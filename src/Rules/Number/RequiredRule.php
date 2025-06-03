<?php

namespace Validator\Rules\Number;

use Validator\Rules\RuleInterface;

class RequiredRule implements RuleInterface
{
    public function getName(): string
    {
        return 'required';
    }

    public function check(?int $value = null): bool
    {
        return is_integer($value);
    }
}
