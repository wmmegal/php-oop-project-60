<?php

namespace Validator\Schemas;

use Validator\Rules\String\ContainsRule;
use Validator\Rules\String\MinLengthRule;
use Validator\Rules\String\RequiredRule;

class StringSchema implements SchemaInterface
{
    use SchemaTrait;

    public function required(): static
    {
        $this->addRule(new RequiredRule());

        return $this;
    }

    public function minLength(int $length): static
    {
        $this->addRule(new MinLengthRule($length));

        return $this;
    }

    public function contains(string $str): static
    {
        $this->addRule(new ContainsRule($str));

        return $this;
    }

    public function isValid(?string $value = ''): bool
    {
        return $this->validate($value);
    }
}
