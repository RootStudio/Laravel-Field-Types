# Laravel Field Types

The package adds a simple API to Laravel projects to create templated form fields that automatically populates inline error messages, help text and accessibility tags. It is not designed to be a full form manager, instead it removes the repetition when creating form based UIs.

[![Build Status](https://semaphoreci.com/api/v1/projects/bc4d955d-a81c-45ff-b9f4-9ee24bb2983f/1039619/shields_badge.svg)](https://semaphoreci.com/jamesyps/laravel-field-types)

## Requirements

* PHP 5.5+
* Laravel 5.1+

## Installation

Add the following to your `composer.json` file and run `composer update`.

```json
"require": {
    "rootstudio/laravel-field-types": "^1.0"
},
"repositories": [
    {
        "type": "git",
        "url": "git@github.com:RootStudio/Laravel-Field-Types.git"
    }
]
```

Next add the service provider to the `config/apps.php`:

```php
RootStudio\RootForms\RootFormServiceProvider::class,
```

Finally the facade to the aliases config:

```php
'RootForms' => RootStudio\RootForms\Facades\RootForm::class,
```

## Using the package

The package gives the ability to quickly add the following field types:

* text
* email
* tel
* password
* checkbox set
* radio set
* select
* file
* toggle
* confirm

For example, to create a simple text fields:

```blade
{!! RootForms::text('name', 'Your name', old('name')) !!}
{!! RootForms::email('login', 'Your email', old('login')) !!}
{!! RootForms::password('password', 'Your password') !!}
```

*Note: password field types do not accept a value parameter*

You can optionally include additional classes or attributes:

```blade
{!! RootForms::text('name', 'Your name', old('name'), 'js-autosuggest', ['required' => true]) !!}
```

Multiple choice fields use a similar syntax:

```blade
{!! RootForms::select('country', 'Shipping destination', ['uk' => 'United Kingdom', 'usa' => 'United States'], old('country')) !!}
{!! RootForms::radio_set('method', 'Shipping method', ['standard' => 'Royal Mail', 'priority' => 'FedEx'], old('method')) !!}
{!! RootForms::checkbox_set('extras', 'Include the following', ['gift' => 'Gift Wrap', 'sms' => 'SMS Notifications'], old('extras')) !!}
```

Boolean fields do not take additional options, only true or false:

```blade
{!! RootForms::toggle('send_emails', 'Would you like to be emailed?', old('send_emails')) !!}
{!! RootForms::confirm('terms_agreement', 'Have you read the terms & conditions?', old('terms_agreement')) !!}
```

## Customising

The package templates are built for Bootstrap v4. If you wish to customise these and use your own styling and classes the views can be published using artisan: 

```
php artisan vendor:publish --provider="RootStudio\RootForms\RootFormsServiceProvider" --tag="views"
```

To change the location of the view files export the config file:

```
php artisan vendor:publish --provider="RootStudio\RootForms\RootFormsServiceProvider" --tag="config"
```
