# IP Lookup Service
This is a Laravel (API) and Angular application to lookup an IP address in the MySQL database.

Went with the Laravel framework because:
- Ease of setup given the time restraint
- Request Validation, routing
- Instant Docker setup with MySQL and Redis
- Testing framework setup

# Performance
## Caching
IP Lookup is cached using Redis, the key being a valid IP address.
## Function-based indexing
`range_start` and `range_end` are in a function-based index on the INET_ATON() values of these two columns

# Lookup
Lookup is happening with a raw SQL prepared statement, using a SQL function which changes IP to a longint, allowing to using between SQL logic to find the right database entry. 

One improvement would be storing IP range_start and range_end as longint, so it would be quicker to search, and converting it back to an IP address format on the front-end.

# Testing
There are basic Feature Tests, to run them:
`./vendor/bin/sail artisan test`

One of them is not passing, I didn't have time to look into it, but it seems like the testing database setup.

# Installation

1. .env file is removed from .gitignore and commited - obviously not the best practice, but wanted to speed up the setup, and it only has default values
2. Install PHP libraries through composer
3. Download the CSV file using a command (didn't upload it to GIT as it's 500 mbs, could have used git lfs but went with a simpler solution)
4. Setup Docker containers using Sail
5. Create database table
6. Seed the database with the data from the CSV
7. Go into the Angular folder
8. Install dependencies
9. Run application

Laravel url is http://laravel.test
Angular application url is http://laravel.test:4200

These are the commands:
```
composer install 
php artisan csv:download
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
cd resources/angular
npm install
ng serve
```

# Time restraint
Given more time I would:
- Add more Angular tests
- Add more Feature tests
- Add better handling to the Angular front-end functionalities
- Default validation error response code is 422 in Laravel, task mentioned 400, tried to change it but couldn't within the time limit
