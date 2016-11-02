<?php namespace RootStudio\RootForms\Tests;

use PHPUnit\Framework\TestCase;
use RootStudio\RootForms\Tests\Stubs\StubFieldType;

/**
 * @backupStaticAttributes enabled
 */
class FieldTypeTest extends TestCase
{
    /**
     * @test
     */
    function it_can_set_an_id()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setID('test_field_id');

        $data = $fieldType->getData();

        $this->assertEquals('test_field_id_1', $data['id']);
    }

    /**
     * @test
     */
    function it_can_set_a_safe_id()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setID('test / field + id');

        $data = $fieldType->getData();

        $this->assertEquals('test_field_id_1', $data['id']);
    }

    /**
     * @test
     */
    function it_can_set_a_unique_id()
    {
        $fieldType1 = $this->getStubClass();
        $fieldType2 = $this->getStubClass();

        $fieldType1->setID('test_field_id');
        $fieldType2->setID('test_field_id');

        $data1 = $fieldType1->getData();
        $data2 = $fieldType2->getData();

        $this->assertNotEquals($data1['id'], $data2['id']);
        $this->assertEquals('test_field_id_1', $data1['id']);
        $this->assertEquals('test_field_id_2', $data2['id']);
    }

    /**
     * @test
     */
    function it_can_set_a_name()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setName('test_field_name');

        $data = $fieldType->getData();

        $this->assertEquals('test_field_name', $data['name']);
    }

    /**
     * @test
     */
    function it_can_set_a_valid_type()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setType('test_type');

        $data = $fieldType->getData();

        $this->assertEquals('test_type', $data['type']);
    }

    /**
     * @test
     */
    function it_will_reject_an_invalid_type()
    {
        $this->expectException(\InvalidArgumentException::class);

        $fieldType = $this->getStubClass();

        $fieldType->setType('invalid_type');
    }

    /**
     * @test
     */
    function it_can_set_a_class()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setClass('test_field_class');

        $data = $fieldType->getData();

        $this->assertEquals('test_field_class', $data['class']);
    }

    /**
     * @test
     */
    function it_can_set_a_value()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setValue('Test field value');

        $data = $fieldType->getData();

        $this->assertEquals('Test field value', $data['value']);
    }

    /**
     * @test
     */
    function it_can_set_help_text()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setHelp('Test field help string');

        $data = $fieldType->getData();

        $this->assertEquals('Test field help string', $data['help']);
    }

    /**
     * @test
     */
    function it_can_set_attributes()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setAttributes([
            'data-testing' => 'test attribute value'
        ]);

        $data = $fieldType->getAttributes();

        $this->assertEquals([
            'data-testing' => 'test attribute value'
        ], $data);
    }

    private function getStubClass()
    {
        return new StubFieldType();
    }
}
