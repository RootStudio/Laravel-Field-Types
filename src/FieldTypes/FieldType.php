<?php namespace App\RootForms\FieldTypes;

use InvalidArgumentException;

/**
 * Class FieldType
 *
 * @package App\RootForms\FieldTypes
 * @author James Wigger <james@rootstudio.co.uk>
 */
abstract class FieldType
{
    /**
     * Non-user definable attributes
     *
     * @var array
     */
    protected $lockedAttributes = [
        'id',
        'name',
        'class',
        'type',
        'value'
    ];

    /**
     * Attributes that are set as booleans
     *
     * @var array
     */
    protected $booleanAttributes = [
        'disabled',
        'required'
    ];

    /**
     * Unique ID of field
     *
     * @var string
     */
    protected $id;

    /**
     * Input field name
     *
     * @var string
     */
    protected $name;

    /**
     * Field type
     *
     * @var string
     */
    protected $type;

    /**
     * Additional classes
     *
     * @var string
     */
    protected $class;

    /**
     * Human friendly label
     *
     * @var string
     */
    protected $label;

    /**
     * Additional help text below field
     *
     * @var string
     */
    protected $help;

    /**
     * Default value / pre-selected
     *
     * @var string
     */
    protected $value;

    /**
     * Custom additional attributes
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Default view
     *
     * @var string
     */
    protected $view;

    /**
     * Increments to prevent duplicate IDs
     *
     * @var int
     */
    protected static $uid = 1;

    /**
     * Set the ID attribute
     *
     * @param string $id
     *
     * @return $this
     */
    public function setID($id)
    {
        $this->id = str_slug($id, '_') . '_' . self::$uid++;

        return $this;
    }

    /**
     * Set the name attribute
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the field type attribute
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        if (!in_array($type, $this->allowedTypes())) {
            throw new InvalidArgumentException(sprintf('Invalid field type "%s"'));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Set additional classes
     *
     * @param string $class
     *
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Set the label attribute
     *
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set a default value
     *
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set a string of help text below field
     *
     * @param string $help
     *
     * @return $this
     */
    public function setHelp($help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * Set custom attributes not defined by class
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $valid = array_except($attributes, $this->lockedAttributes);
        $this->attributes = array_merge($this->attributes, $valid);

        return $this;
    }

    /**
     * Set a custom view to render the field
     *
     * @param $view
     *
     * @return $this
     */
    public function setView($view)
    {
        if (!view()->exists($view)) {
            throw new InvalidArgumentException(sprintf('The view "%s" does not exists'));
        }

        $this->view = $view;

        return $this;
    }

    /**
     * Return data to be sent to the template
     *
     * @return array
     */
    public function getData()
    {
        $defaults = [
            'id'         => $this->id,
            'name'       => $this->name,
            'type'       => $this->type,
            'class'      => $this->class,
            'label'      => $this->label,
            'help'       => $this->help,
            'value'      => $this->value,
            'attributes' => $this->getAttributeString()
        ];

        return array_merge($defaults, $this->additionalData());
    }

    /**
     * Convert the attributes array into a HTML string
     *
     * @return string
     */
    public function getAttributeString()
    {
        $str = '';

        $booleans = array_only($this->attributes, $this->booleanAttributes);
        $standard = array_except($this->attributes, $this->booleanAttributes);

        foreach ($standard as $attribute => $value) {
            $str .= sprintf('%s="%s" ', $attribute, $value);
        }

        foreach ($booleans as $bool => $value) {
            if (!$value) continue;

            $str .= $bool . ' ';
        }

        return $str;
    }

    /**
     * Return view string
     *
     * @return string
     */
    public function getView()
    {
        if ($this->view) {
            return $this->view;
        }

        return $this->getDefaultView();
    }

    /**
     * Render the template
     *
     * @return string
     */
    public function render()
    {
        return view($this->getView())->with($this->getData());
    }

    /**
     * Return the view for the field
     *
     * @return string
     */
    abstract protected function getDefaultView();

    /**
     * Return the allowed types of this field
     *
     * @return array
     */
    abstract protected function allowedTypes();

    /**
     * Additional data to be returned to the view
     *
     * @return array
     */
    abstract protected function additionalData();
}
