<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class FileFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author  James Wigger <james@rootstudio.co.uk>
 */
class FileFieldType extends FieldType
{
    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'file';

    /**
     * Return the view for the field
     *
     * @return string
     */
    protected function getDefaultView()
    {
        return config('rootforms.views.file');
    }

    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    protected function allowedTypes()
    {
        return ['file'];
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
