## Laravel Tags
This package creates plain tags CRUD pages for tags in administrative panel.

It includes a ServiceProvider to register the package and attach it to the output. 
It includes migrations to create DB roles.
You can publish seeds and use it to create demo tags.
It includes views of the CRUD pages (blade sections).

## Installation
Add the package to root composer.json:
````
"require": {
        ...
        "vadiasov/tags": "^1.0",
  }
````
Then run:
````
composer update
````
Register package in config/app.php
````
'providers' => [
        /*
         * Package Service Providers...
         */
        Vadiasov\Tags\TagsServiceProvider::class,
````
Create model:
````
php artisan make:model Tag
````
Publish migrations and seeds. Run:
````
php artisan vendor:publish
````
and enter appropriate number of this package (see terminal output after last command).


Migrate:
````
php artisan migrate
````
Seed if you need demo data:
````
php artisan db:seed class=TagsSeeder
````

## Routes
The routes are in the package:
````
admin/tags
admin/tags/create
admin/tags/{id}/edit
admin/tags/{id}/delete
````
