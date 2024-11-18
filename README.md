# TravelLokal

### Run Project

Go to the project directory

```bash
  cd TravelLokal
```

-   Rename .env.example file to .env
-   Go to localhost/phpmyadmin and make sure laravel database exists

```bash
    composer install
```

```bash
    php artisan key:generate
```
 If there is an error because of ```laravel/ui``` package 

 ```bash 
     composer require laravel/ui
 ```
Migrate the database
```bash
    php artisan  migrate:fresh --seed
```
```bash
    php artisan storage:link
```
```bash
    npm install
```
```bash
    npm run dev
```
Run the web application
```bash
    php artisan serve
```

#### Login

To access login page, go to ```http://127.0.0.1:8000/login``` or ```localhost/TravelLokal/login```

-   email = admin@admin.com
-   password = 123
