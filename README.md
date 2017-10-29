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


## Instalations

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

5. Open (`.env`) file and change the database configs like `DB_DATABASE` , `DB_USERNAME` , and `DB_PASSWORD` to match your system database environment.

6.  Run 
```bash
php artisan key:generate
``` 
in terminal to set the application `APP_KEY`.

7. Run
```bash
php artisan vendor:publish --provider="Codecasts\Auth\JWT\ServiceProvider"
``` 
in terminal to publish Codecast Laravel JWT

8. Generate secret key by `php artisan jwt:generate` and then copy generated secret from terminal into (`.env`) file

9. Run Migration `php artisan migrate`

10. Run development server `php artisan serve` and `php artisan serve --port=0000` for custom port

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

4. open (`index.js`) and change the value of variable `var secret` from secret key generated on laravel application but exclude the `base64:` 

5. run the server by type `node index.js`

