# JWTBackends

## Introduction

This project simulate how JWT Server run in Laravel and NodeJS + Express in a simple way

## API Documentation

[http://docs.jwtapi3.apiary.io/#](http://docs.jwtapi3.apiary.io/#)

## Requirements

- PHP 7.0
- Composer 1.4.3
- NPM 3.10.10
- NodeJs 6.11.3
- MySQL / MariaDB
- Postman for Test the API


## Installations

- Clone this repository to your machine

### Laravel Server

1. Open terminal inside project folder.

2. Move to laravel directory
```bash
cd laravelBackend54
```

3. Install dependencies by type 
```bash
composer install
```

4. Copy  (`.env.example`) file into (`.env`) (Create a new file named .env).

5. Create a database on your MySQL Server

6. Open (`.env`) file and change the database configs like `DB_DATABASE` , `DB_USERNAME` , and `DB_PASSWORD` to match your system database environment.

7.  Run 
```bash
php artisan key:generate
``` 
in terminal to set the application `APP_KEY`.

```env
JWT_SECRET=base64:lIeV1GTr1gUJVLKmfkJ2huAgP8BxEnAZKwXUI6c3d4s=
```

8. Run
```bash
php artisan vendor:publish --provider="Codecasts\Auth\JWT\ServiceProvider"
``` 
in terminal to publish Codecast Laravel JWT

9. Generate secret key by `php artisan jwt:generate` and then copy generated secret from terminal into (`.env`) file

10. Run Migration `php artisan migrate`

11. Run development server `php artisan serve` or `php artisan serve --port=PORT` for custom port

### NodeJS + Express Server

1. Open terminal inside project folder.

2. Move to express directory
```bash
cd expressBackend
```

3. Install dependencies by type 
```bash
npm install
```

4. Setup the secret key

open (`index.js`) and change the value of variable `var secret` from secret key generated on laravel application but exclude the `base64:` 

Example : 

Secret from laravel (`.env`) is `base64:FClidjjWPImBqjptbZWc4XCtq9F0P7PUBnBBLTpf6ew=`

Copy to (`index.js`) only `FClidjjWPImBqjptbZWc4XCtq9F0P7PUBnBBLTpf6ew=`

```javascript

var express = require('express');
var app = express();
var jwt = require('jwt-simple');
//change first parameter of Buffer.from to match laravel server jwt secret exclude the 'base64:'
var secret = Buffer.from('FClidjjWPImBqjptbZWc4XCtq9F0P7PUBnBBLTpf6ew=', 'base64')

```


5. open terminal and run the server by type `node index.js`

## Testing

Currently unit testing just available for LaravelServer

to run test type `vendor/bin/phpunit` on (`laravelBackend54`) folder
