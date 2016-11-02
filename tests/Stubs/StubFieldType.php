<?php namespace RootStudio\RootForms\Tests\Stubs;
use RootStudio\RootForms\FieldTypes\FieldType;

/**
 * Class StubFieldType
 *
 * @package RootStudio\RootForms\Tests\Stubs
 * @author James Wigger <james@rootstudio.co.uk>
 */
class StubFieldType extends FieldType
{
    protected function getDefaultView()
    {
        return 'test_view';
    }

    protected function allowedTypes()
    {
        return ['test_type'];
    }

    protected function additionalData()
    {
        return [];
    }

    // Fix statics persisting between tests - anyone got better ideas?
    public function __destruct()
    {
        self::$uid = 1;
    }
}
