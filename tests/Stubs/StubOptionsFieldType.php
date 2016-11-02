<?php namespace RootStudio\RootForms\Tests\Stubs;

use RootStudio\RootForms\FieldTypes\OptionsFieldType;

/**
 * Class StubOptionsFieldType
 *
 * @package RootStudio\RootForms\Tests\Stubs
 * @author  James Wigger <james@rootstudio.co.uk>
 */
class StubOptionsFieldType extends OptionsFieldType
{
    protected function getDefaultView()
    {
        return 'test_view';
    }

    protected function allowedTypes()
    {
        return ['test_type'];
    }

    // Fix statics persisting between tests - anyone got better ideas?
    public function __destruct()
    {
        self::$uid = 1;
    }
}