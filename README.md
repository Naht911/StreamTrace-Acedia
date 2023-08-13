# Home Page

![Home Page](https://streamtrace.xyz/) 

# How to Install

### Clone the project about

Copy the file to create the .env file > copy the content of the .evn.example file via

Edit database information in .env . file

### Run the following commands in order:

```
composer install
php artisan key:generate
```

### Create a database named ```streamtrace_acedia``` and run the following command:

```
php artisan migrate
```

### Open new console windows (Ctrl + j ) and run the following commands:

```
php artisan serve
```
