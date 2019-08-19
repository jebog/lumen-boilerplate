# [Lumen 5.7 Boilerplate](https://github.com/lloricode/lumen-boilerplate)

[![Build Status](https://travis-ci.org/lloricode/lumen-boilerplate.svg?branch=master)](https://travis-ci.org/lloricode/lumen-boilerplate)

A template made from [Lumen 5.7.*](https://lumen.laravel.com/), authenticated with [laravel/passport](https://github.com/laravel/passport)



### Installing

- after cloning/downloding this repo, first open to terminal then change directory to a project directory.
- sample, in linux, `cd lumen-boilerplate`.
- run `composer install` to install project dependencies.
- copy `.env.example` to `.env`. (dont just rename it), for team reference purpose.
- prepare you environment in `.env`
- lumen has no `php artisan key:generate`, so you can [google](https://google.com/search?q=how+to+add+APP_KEY+in+lumen) it to add value first.
- run `composer fresh`, this will migrate and seed fake data to your database, and install laravel passport. see composer.json `scripts` index.
- if you not familiar with  [laravel/passport](https://github.com/laravel/passport), you must see  [this](https://github.com/laravel/passport) first.
- how to login? see [laravel/passport](https://github.com/laravel/passport)

### Available Endpoints

- to generate documentation run `php artisan apidoc:generate`, then visit `http://lumen-boilerplate.test/docs` on browser.

## Running the tests
- you can view integration [here](https://travis-ci.org/lloricode/lumen-boilerplate)
- go to project directory.
- run `vendor/bin/phpunit`, if you running this via [homestead](https://laravel.com/docs/5.7/homestead), you can run this through `ssh` via `phpunit` in current project directory.
- run `composer coverage` to see code coverage via `html`.
- run `composer coverage-txt` to see code coverage via `terminal`.


## Built With

* [laravel/lumen-framework:5.7.*](https://github.com/laravel/lumen-framework) - The stunningly fast micro-framework by Laravel
* [laravel/passport](https://github.com/laravel/passport) - OAuth2 server and API authentication, fix installed by [dusterio/lumen-passport](https://github.com/dusterio/lumen-passport)
* [andersao/l5-repository](https://github.com/andersao/l5-repository) - Repositories to abstract the database layer
* [thephpleague/fractal](https://github.com/thephpleague/fractal) - Output complex, flexible, AJAX/RESTful data structures, extended by [andersao/l5-repository](https://github.com/andersao/l5-repository)
* [spatie/laravel-permission](https://github.com/spatie/laravel-permission) - Associate users with roles and permissions
* [barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors) - Adds CORS (Cross-Origin Resource Sharing) headers support in your Laravel application
* [mpociot/laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator) - Laravel API Documentation Generator


See also the list of [contributors](https://github.com/lloricode/lumen-boilerplate/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/lloricode/lumen-boilerplate/blob/master/LICENSE) file for details
