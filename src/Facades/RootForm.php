<?php namespace App\RootForms\Facades;

use App\RootForms\RootFormFactory;
use Illuminate\Support\Facades\Facade;

/**
 * Class RootForm
 *
 * @package App\RootForms\Facades
 * @author James Wigger <james@rootstudio.co.uk>
 */
class RootForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RootFormFactory::class;
    }
}
