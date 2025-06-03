<?php

use PHPUnit\Framework\TestCase;
use Validator\Schemas\NumberSchema;
use Validator\Validator;

class NumberSchemaTest extends TestCase
{
    protected Validator $v;
    protected NumberSchema $schema;

    protected function setUp(): void
    {
        $this->v = new Validator();

        $this->schema = $this->v->number();
    }

    public function testNullValue()
    {
        $this->assertTrue($this->schema->isValid(null));
    }

    public function testRequired()
    {
        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid(7));
        $this->assertTrue($this->schema->isValid(1));
    }

    public function testPositive()
    {
        $this->assertTrue($this->schema->positive()->isValid(10));
        $this->assertFalse($this->schema->positive()->isValid(-1));
    }

    public function testRange()
    {
        $this->schema->positive();
        $this->schema->range(-5, 5);

        $this->assertFalse($this->schema->isValid(-3));
        $this->assertTrue($this->schema->isValid(3));
    }
}
