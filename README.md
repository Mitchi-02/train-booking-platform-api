# Train Booking API

A Rest API for a train booking platform, built with Laravel 9 (Repository Design Pattern), MySQL, Stripe and Vonage. 

It handles user authentication, admin features, customer support features, travels management, stations management and booking management This is an academic project I built with my team.
 
## Get Started
Don't forget to change your env variables: db connection, stripe and vonage keys.
```
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan ser
```
In another shell, start the background queue that handles notifications and jobs using the command:
```
php artisan queue:work
```

