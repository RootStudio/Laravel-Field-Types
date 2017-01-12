<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class TextAreaFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class TextAreaFieldType extends FieldType
{
    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'textarea';

    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.textarea');
    }


    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['textarea'];
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
