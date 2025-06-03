<?php

namespace Validator\Rules\String;

use Validator\Rules\RuleInterface;

readonly class RequiredRule implements RuleInterface
{
    public function getName(): string
    {
        return 'required';
    }

    public function check(?string $value = ''): bool
    {
        return ! empty($value);
    }
}
