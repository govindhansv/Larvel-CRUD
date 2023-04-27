# PRODUCT CRUD PHP LARAVEL
## How To Setup this Project



1. Clone the repository: Begin by cloning the Git repository to your local machine.    You can do this by running the following command in your terminal:

    ```sh
    git clone https://github.com/govindhansv/Larvel-CRUD.git
    ```
2. Install dependencies: Once you have cloned the repository, navigate to the project directory and install the required dependencies using composer. Run the following command in your terminal:
    ```sh
   composer install
    ```


3. Create the .env file: Laravel requires an .env file to store your application's environment variables such as database connection settings, email credentials etc. Rename the .env.example file to .env and update the database connection settings to match your environment.
    
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```
    
4. Generate the application key: Run the following command to generate the application key in the .env file.

    ```sh
    php artisan key:generate
    ```
5. Run migrations: Use the following command to run the migrations to create the database tables.
    ```sh
    php artisan migrate
    ```
6. Serve the application: You can use the following command to serve the application on the built-in PHP server.

    ```sh
    php artisan serve
    ```
    
  ## Version Details
  
  PHP 8.2.4  
  
  "laravel-vite-plugin": "^0.7.2"  
  
  "vite": "^4.0.0"
  
  
