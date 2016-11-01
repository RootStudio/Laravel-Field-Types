<?php namespace App\RootForms\FieldTypes;

/**
 * Class ToggleFieldType
 *
 * @package App\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class ToggleFieldType extends OptionsFieldType
{
    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'checkbox';

    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.toggle');
    }

    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['checkbox'];
    }
}
