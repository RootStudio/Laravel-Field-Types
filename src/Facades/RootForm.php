<?php namespace RootStudio\RootForms\Facades;

use RootStudio\RootForms\RootFormFactory;
use Illuminate\Support\Facades\Facade;

/**
 * Class RootForm
 *
 * @package RootStudio\RootForms\Facades
 * @author James Wigger <james@rootstudio.co.uk>
 */
class RootForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RootFormFactory::class;
    }
}
