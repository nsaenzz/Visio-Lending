# Visio Lending - Assessment
 Assestment
 
 ## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone git@github.com:nsaenzz/Visio-Lending.git

Switch to the repo folder

    cd laravel-realworld-example-app

Install all the dependencies using composer

    composer install
   

# Rules - Json format

## Folders

- `storage\app\json` - Contains json file where the Product Rule are

## Format

```json
{
	"disqualified_states": {    
		"1": "State Name"        
	},
	"credit_score_modifier":{
		"reduce":{
			"credit_score": "credit score",
			"rate": "Reduce Rate By"
		},
		"incremet":{
			"credit_score": "credit score",
			"rate": "Increment Rate By"
		}
	},
	"products_modifier":{
        "reduce":{
			"Product Name": "Reduce Rate By"
		},
		"incremet":{
			"Product Name": "Increment Rate By"
		}
	}
}
```
## Example

```json
{
	"disqualified_states": {
		"1": "Florida"
	},
	"credit_score_modifier":{
		"reduce":{
			"credit_score": "720",
			"rate": "0.3"
		},
		"incremet":{
			"credit_score": "720",
			"rate": "0.5"
		}
	},
	"products_modifier":{
		"incremet":{
			"7-1 ARM": "0.5"
		}
	}
}
```


# Testing API

- Run the laravel development server

    php artisan serve

- The api can now be accessed at

    POST http://127.0.0.1:8000/api/productRunRule

- Request body

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|


- Body Json Example
```json
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
```
