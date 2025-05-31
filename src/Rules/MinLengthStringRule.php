<?php

namespace Validator\Rules;

use Validator\Schemas\StringSchema;

class MinLengthStringRule implements StringRuleInterface
{
    public function __construct(
        private readonly int $value = 0
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
