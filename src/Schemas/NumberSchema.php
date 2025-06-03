<?php

namespace Validator\Schemas;

use Validator\Rules\Number\PositiveRule;
use Validator\Rules\Number\RangeRule;
use Validator\Rules\Number\RequiredRule;

class NumberSchema
{
    use SchemaTrait;

    public function required(): static
    {
        $this->addRule(new RequiredRule());

        return $this;
    }

    public function positive(): static
    {
        $this->addRule(new PositiveRule());

        return $this;
    }

    public function range(int $from, int $to): static
    {
        $this->addRule(new RangeRule($from, $to));

        return $this;
    }

    public function isValid(?int $value = null): bool
    {
        return $this->validate($value);
    }
}
