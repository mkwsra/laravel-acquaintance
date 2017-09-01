# Laravel 5 Acquaintances

_Please note this package is **totally working fine**, still needs documentation and tests thu!_

 [![Total Downloads](https://img.shields.io/packagist/dt/laravelme/laravel-acquaintances.svg?style=flat)](https://packagist.org/packages/laravelme/laravel-acquaintances) [![Version](https://img.shields.io/packagist/v/laravelme/laravel-acquaintances.svg?style=flat)](https://packagist.org/packages/laravelme/laravel-acquaintances) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)


This package gives Eloquent models the ability to manage their acquaintances.
You can easily design your social-like System (Facebook, Twitter, Foursquare...etc).

## Models can:
- Send Friend Requests
- Accept Friend Requests
- Deny Friend Requests
- Block a User
- Group Friends
- Follow a User or another Model i.e: Post
- Like a User or another Model i.e: Post
- Subscribe a User or another Model i.e: Post
- Favorite a User or another Model i.e: Post

## Installation

First, install the package through Composer.

```php
composer require laravelme/laravel-acquaintances
```

Then include the service provider inside `config/app.php`.

```php
'providers' => [
    ...
    Laravelme\Acquaintances\AcquaintancesServiceProvider::class,
    ...
];
```
Publish config and migrations

```
php artisan vendor:publish --provider="Laravelme\Acquaintances\AcquaintancesServiceProvider"
```
Configure the published config in
```
config\acquaintances.php
```
Finally, migrate the database
```
php artisan migrate
```

## Setup a Model
```php
use Laravelme\Acquaintances\Traits\CanBeFollowed;
use Laravelme\Acquaintances\Traits\CanFollow;
use Laravelme\Acquaintances\Traits\CanLike;
use Laravelme\Acquaintances\Traits\Friendable;
//...

class User extends Model
{
    use Friendable;
    use CanLike;
    use CanFollow;
    use CanBeFollowed;
    //...
}
```

###MORE DETAILS TO BE ADDED VERY SOON!

## Contributing
See the [CONTRIBUTING](CONTRIBUTING.md) guide.

Basically this package is a collective work of following libraries, so the credits are to [laravel-friendships](https://github.com/hootlex/laravel-friendships) 
& [laravel-follow](https://github.com/overtrue/laravel-follow).