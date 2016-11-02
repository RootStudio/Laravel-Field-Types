<?php namespace RootStudio\RootForms\Tests;

use RootStudio\RootForms\Tests\Stubs\StubOptionsFieldType;

class OptionsFieldTypeTest extends TestCase
{
    /**
     * @test
     */
    function it_can_set_options_data()
    {
        $fieldType = $this->getStubClass();

        $fieldType->setOptions([
            'value_1' => 'First Value',
            'value_2' => 'Second Value'
        ]);

        $data = $fieldType->getData();

        $this->assertArrayHasKey('options', $data);
        $this->assertEquals([
            'value_1' => 'First Value',
            'value_2' => 'Second Value'
        ], $data['options']);
    }

    /**
     * Return field type
     *
     * @return StubOptionsFieldType
     */
    private function getStubClass()
    {
        return new StubOptionsFieldType();
    }
}
