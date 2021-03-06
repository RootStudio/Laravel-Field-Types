<?php namespace RootStudio\RootForms;

use RootStudio\RootForms\FieldTypes\CheckboxFieldType;
use RootStudio\RootForms\FieldTypes\FieldType;
use RootStudio\RootForms\FieldTypes\FileFieldType;
use RootStudio\RootForms\FieldTypes\OptionsFieldType;
use RootStudio\RootForms\FieldTypes\RadioFieldType;
use RootStudio\RootForms\FieldTypes\SelectFieldType;
use RootStudio\RootForms\FieldTypes\TextAreaFieldType;
use RootStudio\RootForms\FieldTypes\TextFieldType;
use RootStudio\RootForms\FieldTypes\ToggleFieldType;

/**
 * Class RootFormFactory
 *
 * @package RootStudio\RootForms
 * @author  James Wigger <james@rootstudio.co.uk>
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
     * Create new textarea field
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function textarea($id, $label, $value = '', $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'textarea')
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
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function password($id, $label, $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'password')
            ->setClass($class)
            ->setAttributes($attributes)
            ->render();
    }

    /**
     * Create new file field
     *
     * @param string $id
     * @param string $label
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    public function file($id, $label, $class = '', array $attributes = [])
    {
        return $this->field($id, $label, 'file')
            ->setClass($class)
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
        $field = $this->getFieldClass($type);

        $field->setID($id)
            ->setName($id)
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
     * Returns class instance for type
     *
     * @param string $type
     *
     * @return FieldType|OptionsFieldType
     */
    protected function getFieldClass($type)
    {
        $map = [
            'checkbox' => CheckboxFieldType::class,
            'file'     => FileFieldType::class,
            'radio'    => RadioFieldType::class,
            'select'   => SelectFieldType::class,
            'text'     => TextFieldType::class,
            'textarea' => TextAreaFieldType::class,
            'tel'      => TextFieldType::class,
            'email'    => TextFieldType::class,
            'password' => TextFieldType::class,
            'toggle'   => ToggleFieldType::class
        ];

        if (!array_key_exists($type, $map)) {
            return new TextFieldType('text');
        }

        $class = $map[$type];

        // Special snowflake
        if($type === 'toggle') {
            $type = 'checkbox';
        }

        return new $class($type);
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
