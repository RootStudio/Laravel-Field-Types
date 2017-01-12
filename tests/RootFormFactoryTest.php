<?php namespace RootStudio\RootForms\Tests;

use Mockery;
use RootStudio\RootForms\FieldTypes\CheckboxFieldType;
use RootStudio\RootForms\FieldTypes\FileFieldType;
use RootStudio\RootForms\FieldTypes\RadioFieldType;
use RootStudio\RootForms\FieldTypes\SelectFieldType;
use RootStudio\RootForms\FieldTypes\TextAreaFieldType;
use RootStudio\RootForms\FieldTypes\TextFieldType;
use RootStudio\RootForms\FieldTypes\ToggleFieldType;
use RootStudio\RootForms\RootFormFactory;

class RootFormFactoryTest extends TestCase
{
    /**
     * @var RootFormFactory
     */
    protected $formFactory;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        $this->formFactory = new RootFormFactory();

        parent::setUp();
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_text_field()
    {
        $html = $this->formFactory->text('field_id', 'field_label', 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('text', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_textarea_field()
    {
        $html = $this->formFactory->textarea('field_id', 'field_label', 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('text', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_email_field()
    {
        $html = $this->formFactory->email('field_id', 'field_label', 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('email', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_tel_field()
    {
        $html = $this->formFactory->tel('field_id', 'field_label', 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('tel', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_password_field()
    {
        $html = $this->formFactory->password('field_id', 'field_label', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('password', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_file_field()
    {
        $html = $this->formFactory->file('field_id', 'field_label', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('file', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_select_field()
    {
        $html = $this->formFactory->select('field_id', 'field_label', ['option_1' => 'Option 1'], 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('option_1 => Option 1', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('select', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_checkbox_set()
    {
        $html = $this->formFactory->checkbox_set('field_id', 'field_label', ['option_1' => 'Option 1'], ['field_value'], 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('option_1 => Option 1', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('checkbox', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_radio_set()
    {
        $html = $this->formFactory->radio_set('field_id', 'field_label', ['option_1' => 'Option 1'], 'field_value', 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('option_1 => Option 1', $html);
        $this->assertContains('field_value', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('radio', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_confirm_field()
    {
        $html = $this->formFactory->confirm('field_id', 'field_label', false, 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('1 => Yes', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('radio', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_return_a_rendered_togglefield()
    {
        $html = $this->formFactory->toggle('field_id', 'field_label', false, 'field_class');

        $this->assertInternalType('string', $html);
        $this->assertContains('field_id', $html);
        $this->assertContains('field_label', $html);
        $this->assertContains('field_class', $html);
        $this->assertContains('checkbox', $html);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_set_help_only_once()
    {
        $this->formFactory->hint('help_string');
        $html_help = $this->formFactory->text('field_id', 'field_label', 'field_value', 'field_class');
        $html_plain = $this->formFactory->text('field_id', 'field_label', 'field_value', 'field_class');

        $this->assertInternalType('string', $html_help);
        $this->assertInternalType('string', $html_plain);

        $this->assertContains('help_string', $html_help);
        $this->assertNotContains('help_string', $html_plain);
    }

    /**
     * @test
     * @group factory
     */
    function it_will_generate_correct_classes()
    {
        $field = $this->formFactory->field('field_id', 'field_label', 'text');
        $this->assertInstanceOf(TextFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'textarea');
        $this->assertInstanceOf(TextAreaFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'email');
        $this->assertInstanceOf(TextFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'tel');
        $this->assertInstanceOf(TextFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'password');
        $this->assertInstanceOf(TextFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'select');
        $this->assertInstanceOf(SelectFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'checkbox');
        $this->assertInstanceOf(CheckboxFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'radio');
        $this->assertInstanceOf(RadioFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'toggle');
        $this->assertInstanceOf(ToggleFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'file');
        $this->assertInstanceOf(FileFieldType::class, $field);

        $field = $this->formFactory->field('field_id', 'field_label', 'unknown');
        $this->assertInstanceOf(TextFieldType::class, $field);
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__ . '/Stubs/views']);
        $app['config']->set('rootforms.views.text', 'stub');
        $app['config']->set('rootforms.views.textarea', 'stub');
        $app['config']->set('rootforms.views.select', 'stub');
        $app['config']->set('rootforms.views.checkbox', 'stub');
        $app['config']->set('rootforms.views.radio', 'stub');
        $app['config']->set('rootforms.views.toggle', 'stub');
        $app['config']->set('rootforms.views.file', 'stub');
    }
}
