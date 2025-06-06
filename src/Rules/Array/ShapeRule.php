<?php

namespace Validator\Rules\Array;

use Validator\Rules\RuleInterface;

readonly class ShapeRule implements RuleInterface
{
    public function __construct(
        private array $rules = []
    ) {
    }

    public function getName(): string
    {
        return 'shape';
    }

    public function check(?array $array = []): bool
    {
        foreach ($this->rules as $key => $rule) {
            if (! $rule->isValid($array[$key] ?? null)) {
                return false;
            }
        }

        return true;
    }
}