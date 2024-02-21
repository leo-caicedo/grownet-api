# Grownet API

Welcome to the Grownet online store API repository.
This project is built using Laravel Sail on Docker, and MySQL as a database management system.


## Characteristics

- List of all products
- Data on a specific product
- Relationship of a product with the creator user and restaurant
- User authentication system (Sanctum)
- Restriction of endpoints for user without authentication
- Feedback on erroneous requests

## Starting

### Previous requirements

Before installing, make sure you have Docker installed on your system. You'll also need Composer to manage PHP dependencies.

## Installation
Steps to follow
```
git clone https://github.com/leo-caicedo/grownet-api.git
```
```
cd grownet-api
```
```
cp .env-example .env
```
Create containers
```
./vendor/bin/sail up -d
```
Run migrations and seeders to configure your database
```
./vendor/bin/sail artisan migrate --seed
```
## Use
To start using the API, you can make requests to http://localhost/. Here are some endpoints available:
* `GET api/products` Get all products 
* `GET api/products/{id}` Get a product
* `POST api/products` Create a product (Authentication is required)
* `POST api/users/register` Register a user
* `POST api/users/login` Login a user
