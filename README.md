# README

Simple Laravel project for doing API request to third party.

## Get started

1. Clone this repository with `git clone https://github.com/nicky75/requestapi.git`
2. Run `cd requestapi`
3. Run `composer install`
4. Run `cp .env.example .env`
5. Edit .env file and add there client ID and client secret
6. Run `php artisan key:generate`
7. Run `php artisan serve`

You can open http://localhost:8000 in your browser to check the result. Simple test on API request call is available with `php artisan test`

API endpoints can be accessed also from third party tools, for example Postman like this:

`http://localhost:8000/api/services`

to get the list of the services or 

`http://localhost:8000/api/services/ID_OF_SERVICE` 

to get detailed view of a service.