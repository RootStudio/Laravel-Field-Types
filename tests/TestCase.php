<?php namespace RootStudio\RootForms\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use RootStudio\RootForms\RootFormServiceProvider;

/**
 * Class TestCase
 *
 * @package RootStudio\RootForms\Tests
 * @author  James Wigger <james@rootstudio.co.uk>
 */
abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            RootFormServiceProvider::class
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__ . '/Stubs/views']);
        $app['config']->set('rootforms.views.text', 'test::text');
        $app['config']->set('rootforms.views.textarea', 'test::textarea');
        $app['config']->set('rootforms.views.select', 'test::select');
        $app['config']->set('rootforms.views.checkbox', 'test::checkbox');
        $app['config']->set('rootforms.views.radio', 'test::radio');
        $app['config']->set('rootforms.views.toggle', 'test::toggle');
        $app['config']->set('rootforms.views.file', 'test::file');
    }
}
