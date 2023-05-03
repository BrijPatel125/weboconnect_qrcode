# Steps to setup project

Requirement : php 8.1 or greater

1. Take a clone of project using "https://github.com/BrijPatel125/weboconnect_qrcode.git"
2. Rename the .env.example file to .env
3. Make below mentioned changes in .env

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=weboconnect
    DB_USERNAME=root
    DB_PASSWORD=

4. run composer install
5. run npm install
6. run php artisan migrate
7. php artisan serve