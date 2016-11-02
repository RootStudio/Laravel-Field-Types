<?php namespace RootStudio\RootForms\Tests;


use RootStudio\RootForms\FieldTypes\CheckboxFieldType;
use RootStudio\RootForms\FieldTypes\FileFieldType;
use RootStudio\RootForms\FieldTypes\RadioFieldType;
use RootStudio\RootForms\FieldTypes\SelectFieldType;
use RootStudio\RootForms\FieldTypes\TextFieldType;
use RootStudio\RootForms\FieldTypes\ToggleFieldType;

class FieldTypeDefaultsTest extends TestCase
{
    /**
     * @test
     */
    function checkbox_field_will_return_default_view_from_config()
    {
        $fieldType = new CheckboxFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::checkbox', $view);
    }

    /**
     * @test
     */
    function checkbox_field_will_only_allow_set_types()
    {
        $fieldType = new CheckboxFieldType();

        $fieldType->setType('checkbox');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('type', $data);
        $this->assertEquals('checkbox', $data['type']);
    }

    /**
     * @test
     */
    function file_field_will_return_default_view_from_config()
    {
        $fieldType = new FileFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::file', $view);
    }

    /**
     * @test
     */
    function file_field_will_only_allow_set_types()
    {
        $fieldType = new FileFieldType();

        $fieldType->setType('file');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('type', $data);
        $this->assertEquals('file', $data['type']);
    }

    /**
     * @test
     */
    function radio_field_will_return_default_view_from_config()
    {
        $fieldType = new RadioFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::radio', $view);
    }

    /**
     * @test
     */
    function radio_field_will_only_allow_set_types()
    {
        $fieldType = new RadioFieldType();

        $fieldType->setType('radio');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('type', $data);
        $this->assertEquals('radio', $data['type']);
    }

    /**
     * @test
     */
    function select_field_will_return_default_view_from_config()
    {
        $fieldType = new SelectFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::select', $view);
    }

    /**
     * @test
     */
    function select_field_will_only_allow_set_types()
    {
        $fieldType = new SelectFieldType();

        $fieldType->setType('select');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('type', $data);
        $this->assertEquals('select', $data['type']);
    }

    /**
     * @test
     */
    function text_field_will_return_default_view_from_config()
    {
        $fieldType = new TextFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::text', $view);
    }

    /**
     * @test
     */
    function text_field_will_only_allow_set_types()
    {
        $fieldType = new TextFieldType();

        foreach(['text', 'email', 'tel', 'password'] as $type) {
            $fieldType->setType($type);
            $data = $fieldType->getData();

            $this->assertArrayHasKey('type', $data);
            $this->assertEquals($type, $data['type']);
        }
    }

    /**
     * @test
     */
    function toggle_field_will_return_default_view_from_config()
    {
        $fieldType = new ToggleFieldType();

        $view = $fieldType->getView();

        $this->assertEquals('test::toggle', $view);
    }

    /**
     * @test
     */
    function toggle_field_will_only_allow_set_types()
    {
        $fieldType = new ToggleFieldType();

        $fieldType->setType('checkbox');

        $data = $fieldType->getData();

        $this->assertArrayHasKey('type', $data);
        $this->assertEquals('checkbox', $data['type']);
    }
}
