<?php namespace RootStudio\RootForms\FieldTypes;

/**
 * Class OptionsFieldType
 *
 * @package RootStudio\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
abstract class OptionsFieldType extends FieldType
{
    /**
     * Options array
     *
     * @var array
     */
    protected $options = [];

    /**
     * Set options array
     *
     * @param array $options
     *
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Additional data to be returned to the view
     *
     * @return array
     */
    protected function additionalData()
    {
        return [
            'options' => $this->options
        ];
    }
}
