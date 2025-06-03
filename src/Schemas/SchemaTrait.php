<?php

namespace Validator\Schemas;

use Validator\Rules\RuleInterface;

trait SchemaTrait
{
    private array $rules = [];

    private function addRule(RuleInterface $rule): void
    {
        $this->rules[$rule->getName()] = $rule;
    }

    private function validate(mixed $value): bool
    {
        foreach ($this->rules as $validator) {
            if (! $validator->check($value)) {
                return false;
            }
        }

        return true;
    }
}
