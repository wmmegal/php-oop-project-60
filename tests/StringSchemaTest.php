<?php

use PHPUnit\Framework\TestCase;
use Validator\Schemas\StringSchema;
use Validator\Validator;

class StringSchemaTest extends TestCase
{
    protected Validator $v;
    protected StringSchema $schema;
    protected StringSchema $schema2;

    protected function setUp(): void
    {
        $this->v = new Validator();

        $this->schema = $this->v->string();
        $this->schema2 = $this->v->string();
    }

    public function testDefaultSchema()
    {
        $this->assertNotSame($this->schema, $this->schema2);

        $this->assertTrue($this->schema->isValid(''));
        $this->assertTrue($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid('what does the fox say'));
    }

    public function testRequired()
    {
        $this->schema->required();

        $this->assertFalse($this->schema->isValid(''));
        $this->assertFalse($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid('what does the fox say'));
        $this->assertTrue($this->schema2->isValid(''));
        ;
    }

    public function testContains()
    {
        $this->assertTrue($this->schema->contains('what')->isValid('what does the fox say'));
        $this->assertFalse($this->schema->contains('whattt')->isValid('what does the fox say'));
    }

    public function testMinLength()
    {
        $this->assertTrue($this->v->string()->minLength(10)->minLength(5)->isValid('Hexlet'));
    }
}
