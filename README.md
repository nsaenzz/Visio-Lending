# Visio Lending
 Assestment
 
 ## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:nsaenzz/Visio-Lending.git

Switch to the repo folder

    cd laravel-realworld-example-app

Install all the dependencies using composer

    composer install
    
## Folders

- `storage\app\json` - Contains json file where the Product Rule are

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://127.0.0.1:8000/api/productRunRule

Request body

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|


Body Json Example
{
    "person": {
        "name": "Neil",
        "credit_score": "720",
        "state": "Florida"
    },
    "product": {
        "name": "7-1 ARM",
        "interest_rate": "5.0"
    }
}

Refer the [api specification](#api-specification) for more info.
