## Composer

`composer.json`

```json
    "require": {
        "facebook/graph-sdk": "^5.7"
    },
```

launch `composer install` 

## Usage

Copy the files to the corresponding folders from app/ and complete the following files :

in .env

```ini
FACEBOOK_APP_ID=
FACEBOOK_APP_SECRET=
FACEBOOK_DEFAULT_GRAPH_VERSION=v3.2
FACEBOOK_VERIFY_TOKEN=                  //Token for subscribe webhook
FACEBOOK_USER_TOKEN=                    //Long Life facebook user token
```

in config/app.php

```php

'providers' => [

...

App\Providers\FacebookServiceProvider::class,

...

],

```

in app/Http/kernel.php


```php

protected $routeMiddleware = [

...

'verifyToken' => \App\Http\Middleware\VerifyToken::class,
'verifySignature' => \App\Http\Middleware\VerifySignature::class,

...

],

```

Routes example

```php
Route::get('/webhook', 'EventController@handle')->name('facebook.webhook.verify')->middleware('verifyToken');
Route::post('/webhook', 'EventController@handle')->name('facebook.webhook.handle')->middleware('verifySignature');
```