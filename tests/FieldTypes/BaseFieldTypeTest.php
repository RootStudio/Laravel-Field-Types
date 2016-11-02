<?php namespace RootStudio\RootForms\Tests;

use RootStudio\RootForms\Tests\Stubs\StubFieldType;

class BaseFieldTypeTest extends TestCase
{
    /**
     * @test
     */
    function it_can_set_an_id()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setID('test_field_id');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('id', $data);
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

        $this->assertArrayHasKey('id', $data);
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

        $this->assertArrayHasKey('id', $data1);
        $this->assertEquals('test_field_id_1', $data1['id']);

        $this->assertArrayHasKey('id', $data2);
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

        $this->assertArrayHasKey('name', $data);
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

        $this->assertArrayHasKey('type', $data);
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

        $this->assertArrayHasKey('class', $data);
        $this->assertEquals('test_field_class', $data['class']);
    }

    /**
     * @test
     */
    function it_can_set_a_label()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setLabel('Test field label');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('label', $data);
        $this->assertEquals('Test field label', $data['label']);
    }

    /**
     * @test
     */
    function it_can_set_a_value()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setValue('Test field value');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('value', $data);
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

        $this->assertArrayHasKey('help', $data);
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

    /**
     * @test
     */
    function it_blocks_reserved_attributes()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setAttributes([
            'id'    => 'test_id',
            'name'  => 'test_name',
            'class' => 'test-class',
            'type'  => 'text',
            'value' => 'Test Value'
        ]);

        $data = $fieldType->getAttributes();

        $this->assertEmpty($data);
    }

    /**
     * @test
     */
    function it_returns_an_attribute_string()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setAttributes([
            'data-testing' => 'test attribute value',
            'aria-label'   => 'An accessible label'
        ]);

        $data = $fieldType->getData();
        $string = $fieldType->getAttributeString();

        $this->assertArrayHasKey('attributes', $data);
        $this->assertInternalType('string', $string);
        $this->assertEquals('data-testing="test attribute value" aria-label="An accessible label"', $string);
    }

    /**
     * @test
     */
    function it_converts_booleans_into_correct_html_attributes()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setAttributes([
            'required' => true,
            'disabled' => false
        ]);

        $string = $fieldType->getAttributeString();

        $this->assertInternalType('string', $string);
        $this->assertEquals('required', $string);
    }

    /**
     * @test
     */
    function it_can_return_a_default_view()
    {
        $fieldType = $this->getStubClass();
        $view = $fieldType->getView();

        $this->assertInternalType('string', $view);
        $this->assertEquals('test_view', $view);
    }

    /**
     * @test
     */
    function it_can_set_a_custom_view()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setView('stub');

        $view = $fieldType->getView();

        $this->assertInternalType('string', $view);
        $this->assertEquals('stub', $view);
    }

    /**
     * @test
     */
    function it_will_reject_an_invalid_view()
    {
        $this->expectException(\InvalidArgumentException::class);

        $fieldType = $this->getStubClass();

        $fieldType->setView('invalid.path');
    }

    /**
     * @test
     */
    function it_will_render_a_view_with_set_attributes()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setID('test_field_id');
        $fieldType->setName('test_field_name');
        $fieldType->setType('test_type');
        $fieldType->setClass('test_field_class');
        $fieldType->setValue('Test field value');
        $fieldType->setHelp('Test field help string');
        $fieldType->setAttributes([
            'data-testing' => 'test attribute value',
            'required' => true,
        ]);

        $fieldType->setView('stub');

        $html = $fieldType->render();

        $this->assertInternalType('string', $html);
        $this->assertContains('test_field_id', $html);
        $this->assertContains('test_field_name', $html);
        $this->assertContains('test_type', $html);
        $this->assertContains('test_field_class', $html);
        $this->assertContains('Test field value', $html);
        $this->assertContains('Test field help string', $html);
        $this->assertContains('data-testing="test attribute value" required', $html);
    }

    /**
     * @test
     */
    function it_will_render_a_view_when_casting_to_string()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setID('test_field_id');
        $fieldType->setName('test_field_name');
        $fieldType->setType('test_type');
        $fieldType->setClass('test_field_class');
        $fieldType->setValue('Test field value');
        $fieldType->setHelp('Test field help string');
        $fieldType->setAttributes([
            'data-testing' => 'test attribute value',
            'required' => true,
        ]);

        $fieldType->setView('stub');

        $html = (string) $fieldType;

        $this->assertInternalType('string', $html);
        $this->assertContains('test_field_id', $html);
        $this->assertContains('test_field_name', $html);
        $this->assertContains('test_type', $html);
        $this->assertContains('test_field_class', $html);
        $this->assertContains('Test field value', $html);
        $this->assertContains('Test field help string', $html);
        $this->assertContains('data-testing="test attribute value" required', $html);
    }

    /**
     * Return field type
     *
     * @return StubFieldType
     */
    private function getStubClass()
    {
        return new StubFieldType();
    }
}
