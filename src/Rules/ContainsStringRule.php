<?php

namespace Validator\Rules;

use Validator\Schemas\StringSchema;

readonly class ContainsStringRule implements StringRuleInterface
{
    public function __construct(private string $value = '')
    {
    }

    public function getName(): string
    {
        return 'contains';
    }

    public function check(?string $value = ''): bool
    {
        return str_contains($value, $this->value);
    }
}
