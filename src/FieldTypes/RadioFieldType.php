<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class RadioFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class RadioFieldType extends OptionsFieldType
{
    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'radio';

    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.radio');
    }

    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['radio'];
    }
}
