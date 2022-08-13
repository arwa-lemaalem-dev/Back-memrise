# Memrise (Back-End VueJs3)</h1>

## Link of Front-end Memrise : 
<a href="https://github.com/arwa-lemaalem-dev/front-end-memrise">Front-end-memrise</a>
## Requirements

-   PHP >= 7.3

## App Content

<ol>
    <li>Register/login</li>
    <li>Task Management (To do list)</li>
    <li>Project Management</li>
    <li>Account Management</li>
    <li>Calendar (task in progress)</li>
    <li>Unit Test</li>
</ol>

## App Screenshot
<ul>
    <li>App Home</li>
    <img src="public\assets\screenshot_app\app_home.png">
    <li>To Do List</li>
    <img src="public\assets\screenshot_app\todolist.png">
</ul>

# Installation

 * Copy .env.example to .env
 * Set up database config in: /.env (Same configuration as the backend project)

 * Execute the following commands in order
  
  * Set up the **DataBase**
``` bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=
DB_PASSWORD=
DB_CONNECTION=chat
DB_DATABASE=
```

``` bash
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate 
php artisan optimize
php artisan route:clear
```




 
