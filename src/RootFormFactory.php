<?php namespace App\RootForms;

use App\RootForms\FieldTypes\CheckboxFieldType;
use App\RootForms\FieldTypes\RadioFieldType;
use App\RootForms\FieldTypes\SelectFieldType;
use App\RootForms\FieldTypes\TextFieldType;
use App\RootForms\FieldTypes\ToggleFieldType;

/**
 * Class RootFormFactory
 *
 * @package App\RootForms
 * @author James Wigger <james@rootstudio.co.uk>
 */
class RootFormFactory
{
    /**
     * Set help text for fields
     *
     * @var bool|string
     */
    protected $helpText = false;

    /**
     * Create new text field
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function text($id, $label, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label)
            ->setClass($class)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create new email field
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function email($id, $label, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'email')
            ->setClass($class)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create new telephone field
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function tel($id, $label, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'tel')
            ->setClass($class)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create new password field
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function password($id, $label, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'password')
            ->setClass($class)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create a new drop down select field
     *
     * @param string $id
     * @param string $label
     * @param array  $options
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function select($id, $label, array $options, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'select')
            ->setClass($class)
            ->setOptions($options)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create a new set of radio buttons
     *
     * @param string $id
     * @param string $label
     * @param array  $options
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return mixed
     */
    public function radio_set($id, $label, array $options, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'radio')
            ->setClass($class)
            ->setOptions($options)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create a new set of checkboxes
     *
     * @param string $id
     * @param string $label
     * @param array  $options
     * @param array  $value
     * @param string $class
     * @param array  $attributes
     *
     * @return mixed
     */
    public function checkbox_set($id, $label, array $options, array $value = [], $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'checkbox')
            ->setClass($class)
            ->setOptions($options)
            ->setValue($value)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create a simple yes / no field
     *
     * @param string $id
     * @param string $label
     * @param bool   $value
     * @param string $class
     *
     * @return mixed
     */
    public function confirm($id, $label, $value = false, $class = '')
    {
        return $this->field($id, $label, 'radio')
            ->setClass($class)
            ->setOptions([true => 'Yes', false => 'No'])
            ->setValue($value)
            ->render();
    }

    /**
     * Create a simple on / off checkbox
     *
     * @param string $id
     * @param string $label
     * @param bool   $value
     * @param string $class
     *
     * @return string
     */
    public function toggle($id, $label, $value = false, $class = '')
    {
        return $this->field($id, $label, 'toggle')
            ->setClass($class)
            ->setValue($value)
            ->render();
    }

    /**
     * Set common values on field class
     *
     * @param string $id
     * @param string $label
     * @param string $type
     *
     * @return TextFieldType
     */
    public function field($id, $label, $type = 'text')
    {
        switch ($type) {
            case 'select':
                $field = new SelectFieldType();
                break;
            case 'checkbox':
                $field = new CheckboxFieldType();
                break;
            case 'radio':
                $field = new RadioFieldType();
                break;
            case 'toggle':
                $field = new ToggleFieldType();
                $type = 'checkbox';
                break;
            case 'text':
            case 'email':
            case 'password':
            default:
                $field = new TextFieldType();
                break;
        }

        $field->setID($id)
            ->setName($id)
            ->setType($type)
            ->setLabel($label)
            ->setHelp($this->getHelpText());

        return $field;
    }

    /**
     * Set help text for next field
     *
     * @param $text
     */
    public function hint($text)
    {
        $this->helpText = $text;
    }

    /**
     * Return and reset help text
     *
     * @return bool|string
     */
    protected function getHelpText()
    {
        $helpText = $this->helpText;

        $this->helpText = false;

        return $helpText;
    }
}
