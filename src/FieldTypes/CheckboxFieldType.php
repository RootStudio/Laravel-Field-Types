<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class TextFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class CheckboxFieldType extends OptionsFieldType
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
        return config('rootforms.views.checkbox');
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
