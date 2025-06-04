<?php

namespace Validator;

use Validator\Schemas\ArraySchema;
use Validator\Schemas\NumberSchema;
use Validator\Schemas\StringSchema;

class Validator
{
    public function string(): StringSchema
    {
        return new StringSchema();
    }

    public function number(): NumberSchema
    {
        return new NumberSchema();
    }

    public function array(): ArraySchema
    {
        return new ArraySchema();
    }
}
