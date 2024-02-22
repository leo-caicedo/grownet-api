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

Before installing, make sure you have Docker installed on your system. You'll also need Composer to manage PHP dependencies. PHP ^8.1 is required

## Installation
Steps to follow
```
git clone https://github.com/leo-caicedo/grownet-api.git
```
```
cd grownet-api
```
```
cp .env.example .env
```
Add Sail, PHP ^8.1 is required

Make sure you have the following extensions
```
sudo apt-get install php8.0-bcmath php8.0-ctype php8.0-fileinfo php8.0-json php8.0-mbstring php8.0-opcache php8.0-pdo php8.0-tokenizer php8.0-xml
```
```
composer require  laravel/sail  --dev
```
```
php artisan  sail:install
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
