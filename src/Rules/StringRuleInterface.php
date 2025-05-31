<?php

namespace Validator\Rules;

use Validator\Schemas\StringSchema;

interface StringRuleInterface
{
    public function getName(): string;

    public function check(?string $value = ''): bool;
}
