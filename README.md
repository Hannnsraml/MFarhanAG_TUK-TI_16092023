# MFarhanAG_TUK-TI_14092023

# Sistem Informasi Pengelolaan Anggota UKM

## Cara Penggunaan :

#### 1. Install library yang akan digunakan

`composer install`

#### 2. Buat file .env dengan menduplikat .env.example lalu sesuaikan pengaturan pada file tersebut

```
APP_URL=[url]

DB_DATABASE=[nama database]
DB_USERNAME=[username database]
DB_PASSWORD=[password database]
```

#### 3. Jalankan migration dan seeder

```
php artisan migrate

php artisan db:seed 
```

#### 4. Install npm

`npm install`

#### 5. Jalankan npm

`npm run dev atau npm run build`

#### 6. Buat storage link

`php artisan storage:link`

##### Catatan

username : administrator
password : 12345678
