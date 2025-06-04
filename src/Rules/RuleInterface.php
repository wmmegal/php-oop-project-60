<?php

namespace Validator\Rules;

interface RuleInterface
{
    public function getName(): string;

    public function check(): bool;
}
