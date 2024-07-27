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

##CLONE REPOSITORY
```sh
git clone https://github.com/AndryAditama/NEWS-WEBSITE-TC14.git
cd NEWS-WEBSITE-TC14

#INSTALL DEPENDENSI
- Instal dependensi PHP menggunakan Composer:
- composer install
- Instal dependensi Node.js menggunakan npm:
- npm install

# KONVIGURASI ENVIRONMENT
- Salin file .env.example ke .env dan sesuaikan konfigurasi environment Anda:
- cp .env.example .env

# KONFIGURASI POSTGRESQL
- pastikan anda telah membuat database di postgresq. Masuk ke file .env dan sesuaikan konfigurasi database Anda:
- DB_CONNECTION=pgsql
- DB_HOST=127.0.0.1
- DB_PORT=5432
- DB_DATABASE=database_name_postgresql
- DB_USERNAME=database_user_postgresql
- DB_PASSWORD=database_password_postgresql

# GENERATE KEY LARAVEL
- php artisan key:generate

# MIGRASI DATABASE
- php artisan migrate

# INSERT DATA DUMMY
- php artisan db:seed

# BUILD ASSETS
- npm run build

# JALANKAN PROJECT
- php artisan serve
