<?php

namespace Validator\Rules;

use Validator\Schemas\StringSchema;

readonly class RequiredStringRule implements StringRuleInterface
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
