<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Stack
* php 8
* MySql 8
* Laravel 10
* Orchid


## Installation
0. Remember: If you want to do something, but You don't know how can you do it, please ask your colleagues.
1. Clone this project into your local workspace
1. Duplicate the `.env.example` file in the project root and set new name `.env`
1. In your `.env` file insert your database credentials.
    1. In this project we use only mysql.
    2. **You should create database by yourself.**
1. In your `.env` file change APP_URL to your local host name.
    1. No need to change other environment options.
1. Open your favorite console in the project root and run `composer install` or `composer i` to install all php dependencies.
1. Run `php artisan migrate` to install project.
2. Run `php artisan orchid:admin login email@email.com password` to create superuser

## Update
1. Run `composer install` or `composer i` to load new packages.
2. Run `php artisan migrate` as often as possible.
3. If you have troubles:  
   3.1. Try to `php artisan view:clear` if you have probles with views.  
   3.2. Try to `php artisan route:clear` if you have probles with routes.  
   3.3. Try to `php artisan cache:clear` if you have probles with cache.  
   3.4. Try to `php artisan config:clear` if you have probles with config.  
   3.5. Try to ask your colleagues what is the reason of your troubles.  
   3.6. Try to find other reasons of your troubles yourself.  
   3.7. Try to cry.
