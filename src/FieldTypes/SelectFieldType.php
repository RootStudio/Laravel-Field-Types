<?php namespace App\RootForms\FieldTypes;

/**
 * Class TextFieldType
 *
 * @package App\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
class SelectFieldType extends OptionsFieldType
{
    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.select');
    }


    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['select'];
    }
}
