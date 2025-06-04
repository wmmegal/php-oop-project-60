<?php

namespace Validator\Schemas;

use Validator\Rules\Array\RequiredRule;
use Validator\Rules\Array\SizeOfRule;

class ArraySchema
{
    use SchemaTrait;

    public function required(): static
    {
        $this->addRule(new RequiredRule());

        return $this;
    }

    public function sizeof(int $size): static
    {
        $this->addRule(new SizeOfRule($size));

        return $this;
    }

    public function isValid(?array $value = null): bool
    {
        return $this->validate($value);
    }
}