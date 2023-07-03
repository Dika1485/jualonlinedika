git clone https://github.com/Dika1485/jualonlinedika.git

cd jualonlinedika

composer install

-- make .env and database --

php artisan migrate:fresh --seed

php artisan serve

npm install && npm run dev

view https://127.0.0.1:8000