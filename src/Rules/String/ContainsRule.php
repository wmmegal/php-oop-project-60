<?php

namespace Validator\Rules\String;

use Validator\Rules\RuleInterface;

readonly class ContainsRule implements RuleInterface
{
    public function __construct(
        private string $value = ''
    ) {
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
