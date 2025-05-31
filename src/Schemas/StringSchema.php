<?php

namespace Validator\Schemas;

use Validator\Rules\ContainsStringRule;
use Validator\Rules\MinLengthStringRule;
use Validator\Rules\RequiredStringRule;
use Validator\Rules\StringRuleInterface;

class StringSchema implements SchemaInterface
{
    public function __construct(
        private array $rules = [],
    ) {
    }


    private function addRule(StringRuleInterface $rule): void
    {
        $this->rules[$rule->getName()] = $rule;
    }

    public function required(): static
    {
        $this->addRule(new RequiredStringRule());

        return $this;
    }

    public function minLength(int $length): static
    {
        $this->addRule(new MinLengthStringRule($length));

        return $this;
    }

    public function contains(string $str): static
    {
        $this->addRule(new ContainsStringRule($str));

        return $this;
    }

    public function isValid(?string $value = ''): bool
    {
        foreach ($this->rules as $validator) {
            if (! $validator->check($value)) {
                return false;
            }
        }

        return true;
    }
}
