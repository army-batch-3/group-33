
## Setup Process

Run command promp, git bash or terminal on the project folder and execute the following.

- composer install
- npm install
- copy .env.example .env
- setup your database connection on the .env file
- php artisan optimize
- "php artisan migrate --seed" or "php artisan migrate:fresh --seed"
- "php artisan serve" or "php artisan serve --port=xxxx"

## Artisan Commands

### Create Controller
- php artisan make:controller [TableName]Controller
-
### Create Model
- php artisan make:model [TableName]

### Create Migration
- php artisan make:migration CreatePa[TableName]Table (Note: _TableName should have a prefix 'pa' attach to it and should be camelcase_.)

### Create Seeder
- php artisan make:seeder [TableName]Seeder

## Other Commands
- php artisan optimize (Clear cache for configuration cache and cached, route(s) and files)
- php artisan permission:cache-reset (If permission is not refelecting when assigning permission to roles)
