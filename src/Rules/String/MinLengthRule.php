<?php

namespace Validator\Rules\String;

use Validator\Rules\RuleInterface;

readonly class MinLengthRule implements RuleInterface
{
    public function __construct(
        private int $value = 0
    ) {
    }

    public function getName(): string
    {
        return 'minLength';
    }

    public function check(?string $value = ''): bool
    {
        $strLen = strlen($value);

        return $strLen >= $this->value;
    }
}
