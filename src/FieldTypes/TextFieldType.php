<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class TextFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class TextFieldType extends FieldType
{
    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.text');
    }


    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['text', 'email', 'tel', 'password'];
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
