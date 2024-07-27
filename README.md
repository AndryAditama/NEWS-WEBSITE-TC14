## WEBSITE BERITA - TalentClass Fullstack Web Development Batch 14
- Menggunakan Laravel
- Menggunakan Tailwind
- Menggunakan PostgreSQL

## FITUR APLIKASI
- Multiuser (admin, penulis)
- FIltering & Pagination
- dll

## PRASYARAT
- PHP >= 8.2
- Composer >= 2.x.x
- Node.js >= 20.xx.x
- NPM => 10.2.3
- PostgreSQL => 14.12

## CLONE REPOSITORY
```sh
git clone https://github.com/AndryAditama/NEWS-WEBSITE-TC14.git
```
ekstrak zip dan buka folder
```sh
cd NEWS-WEBSITE-TC14
```
## INSTALL DEPENDENSI
- Instal dependensi PHP menggunakan Composer:
```sh
composer install
```
- Instal dependensi Node.js menggunakan npm:
```sh
npm install
```

## KONVIGURASI ENVIRONMENT
- Salin file .env.example ke .env dan sesuaikan konfigurasi environment Anda:
```sh
cp .env.example .env
```

## KONFIGURASI POSTGRESQL
pastikan anda telah membuat database di postgresq. Masuk ke file .env dan sesuaikan konfigurasi database Anda:
```sh
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=database_name_postgresql
DB_USERNAME=database_user_postgresql
DB_PASSWORD=database_password_postgresql
```

## GENERATE KEY LARAVEL
```sh
php artisan key:generate
```

## MIGRASI DATABASE
```sh
php artisan migrate
```

## INSERT DATA DUMMY
```sh
php artisan db:seed
```
## BUILD ASSETS
```sh
npm run build
```
## JALANKAN PROJECT
```sh
php artisan serve
```
