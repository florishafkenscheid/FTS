## To run
---
Run `composer install && npm install` to install the required packages.
Next run `cp .env.example .env && php artisan key:generate` (or `copy` instead of `cp` if you're on windows), then edit the env file to fit your MySQL username and password. The default is `root` without a password.

To migrate and seed the database, run `php artisan migrate:fresh --seed`.

Then `npm run build && composer run dev` to build the required files and then run the server locally.

The website should now be available at 127.0.0.1:8000 in your web browser.

## For your convenience
It is also [online](https://fts.blousy.dev/)
