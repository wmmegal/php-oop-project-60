<?php

namespace Validator\Schemas;

interface SchemaInterface
{
    public function isValid(): bool;
}