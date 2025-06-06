<?php

namespace Validator\Schemas;

use Validator\Rules\Array\RequiredRule;
use Validator\Rules\Array\ShapeRule;
use Validator\Rules\Array\SizeOfRule;

class ArraySchema implements SchemaInterface
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

    public function shape(array $rules): static
    {
        $this->addRule(new ShapeRule($rules));

        return $this;
    }

    public function isValid(?array $value = null): bool
    {
        return $this->validate($value);
    }
}