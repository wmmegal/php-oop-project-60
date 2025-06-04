<?php

use PHPUnit\Framework\TestCase;
use Validator\Schemas\ArraySchema;
use Validator\Validator;

class ArraySchemaTest extends TestCase
{
    protected Validator $v;
    protected ArraySchema $schema;

    protected function setUp(): void
    {
        $this->v = new Validator();

        $this->schema = $this->v->array();
    }

    public function testNullValue()
    {
        $this->assertTrue($this->schema->isValid(null));
    }

    public function testRequired()
    {
        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid([]));
        $this->assertTrue($this->schema->isValid([1, 2, 3]));
    }

    public function testSizeOf()
    {
        $this->schema->sizeof(2);

        $this->assertTrue($this->schema->isValid([1, 2]));
        $this->assertTrue($this->schema->isValid([1, 2, 3]));
        $this->assertFalse($this->schema->isValid([1]));
        $this->assertFalse($this->schema->isValid([]));
    }

    public function testCombinedRules()
    {
        $this->schema->required();
        $this->schema->sizeof(3);

        $this->assertFalse($this->schema->isValid(null));
        $this->assertFalse($this->schema->isValid([]));
        $this->assertFalse($this->schema->isValid([1, 2]));
        $this->assertTrue($this->schema->isValid([1, 2, 3]));
        $this->assertTrue($this->schema->isValid([1, 2, 3, 4]));
    }
}
