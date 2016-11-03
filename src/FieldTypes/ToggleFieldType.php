<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class ToggleFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class ToggleFieldType extends FieldType
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

    /**
     * Additional data to be returned to the view
     *
     * @return array
     */
    protected function additionalData()
    {
        return [];
    }
}
