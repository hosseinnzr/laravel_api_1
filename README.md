## Laravel Api

### Introduction

you can add , delete , edit , update your database table value . <br>
use MVC architecture in this project and MYSQL sever for data base .

To run this Laravel app, you need to have the following software installed on your machine:
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)


### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/hosseinnzr/laravel_api.git
   ```
2. Change into the project directory:
    ```bash
    cd laravel_api
    ```

3. Install PHP dependencies:
    ```bash
    composer update
    composer install
    ```
4. Create a copy of the .env.example file and rename it to .env. Update the database and other configurations as needed.

6. Generate an application key:
    ```bash
    php artisan key:generate
    ```
7. Migrate the database:
    ```bash
    php artisan migrate
    ```
8. Serve the application:
    ```bash
    php artisan serve
    ```
10. Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to view the app.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
