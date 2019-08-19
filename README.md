# [Lumen 5.7 Boilerplate + Docker](https://github.com/jebog/lumen-boilerplate)

[![Build Status](https://travis-ci.org/jebog/lumen-boilerplate.svg?branch=master)](https://travis-ci.org/lloricode/lumen-boilerplate)

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


## Lumen Docker Scaffold

### **Description**

This will create a dockerized stack for a Laravel/Lumen application, consisted of the following containers:
-  **app**, your PHP application container

        Nginx, PHP7.2 PHP7.2-fpm, Composer, NPM, Node.js v8.x
    
-  **mysql**, MySQL database container ([mysql](https://hub.docker.com/_/mysql/) official Docker image)

#### **Directory Structure**
```
+-- src <project root>
+-- resources
|   +-- default
|   +-- nginx.conf
|   +-- supervisord.conf
|   +-- www.conf
+-- .gitignore
+-- Dockerfile
+-- docker-compose.yml
+-- readme.md <this file>
```

### **Setup instructions**

**Prerequisites:** 

* Depending on your OS, the appropriate version of Docker Community Edition has to be installed on your machine.  ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))

**Installation steps:** 

1. Create a new directory in which your OS user has full read/write access and clone this repository inside.

2. Create two new textfiles named `db_root_password.txt` and `db_password.txt` and place your preferred database passwords inside:

    ```
    $ echo "myrootpass" > db_root_password.txt
    $ echo "myuserpass" > db_password.txt
    ```

3. Open a new terminal/CMD, navigate to this repository root (where `docker-compose.yml` exists) and execute the following command:

    ```
    $ docker-compose up -d
    ```

    This will download/build all the required images and start the stack containers. It usually takes a bit of time, so grab a cup of coffee.

4. After the whole stack is up, enter the app container and install the framework of your choice:

    **Laravel**

    ```
    $ docker exec -it app bash
    $ composer create-project --prefer-dist laravel/laravel .
    $ nano .env
    $ php artisan migrate --seed
    ```

    **Lumen**

    ```
    $ docker exec -it app bash
    $ composer create-project --prefer-dist laravel/lumen .
    $ nano .env
    $ php artisan migrate --seed
    ```

5. That's it! Navigate to [http://localhost](http://localhost) to access the application.

**Default configuration values** 

The following values should be replaced in your `.env` file if you're willing to keep them as defaults:
    
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=appdb
    DB_USERNAME=user
    DB_PASSWORD=myuserpass
    


## Built With

* [laravel/lumen-framework:5.7.*](https://github.com/laravel/lumen-framework) - The stunningly fast micro-framework by Laravel
* [laravel/passport](https://github.com/laravel/passport) - OAuth2 server and API authentication, fix installed by [dusterio/lumen-passport](https://github.com/dusterio/lumen-passport)
* [andersao/l5-repository](https://github.com/andersao/l5-repository) - Repositories to abstract the database layer
* [thephpleague/fractal](https://github.com/thephpleague/fractal) - Output complex, flexible, AJAX/RESTful data structures, extended by [andersao/l5-repository](https://github.com/andersao/l5-repository)
* [spatie/laravel-permission](https://github.com/spatie/laravel-permission) - Associate users with roles and permissions
* [barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors) - Adds CORS (Cross-Origin Resource Sharing) headers support in your Laravel application
* [mpociot/laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator) - Laravel API Documentation Generator


See also the list of [contributors](https://github.com/lloricode/lumen-boilerplate/graphs/contributors) who participated in this project.

## Thanks to
* Lumen API Boilerplate [lloricode](https://github.com/lloricode/lumen-boilerplate)
* Laravel Lumen Docker [lephleg](https://github.com/lephleg/laravel-lumen-docker)

## License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/lloricode/lumen-boilerplate/blob/master/LICENSE) file for details
