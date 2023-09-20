## Cara Install Project

1. Buka git bash atau cmd di folder tujuan
2. Jalankan perintah git clone https://github.com/uqyanzie/MySpareLog.git, folder project akan didownload
3. Buka folder project MySpareLog dengan VsCode
4. Simpan File .env (chat untuk minta file .env) di folder project
5. Jalankan 'composer install' kemudian 'npm install' di terminal VsCode
6. Buka Xampp, nyalakan Apache dan MySql
7. Buka Admin Mysql, Buat Database Baru dengan nama : 'mysparelogdb'
8. Jalankan perintah 'php artisan migrate:fresh'
9. Jalankan perintah-perintah ini secara berurutan :
    - php artisan db:seed --class=UserSeeder
    - php artisan db:seed --class=CategorySeeder
    - php artisan db:seed --class=TypeSeeder      
    - php artisan db:seed --class=InventorySeeder  
10. Jika semua langkah di atas berhasil dilakukan, jalankan perintah 'php artisan serve' untuk run aplikasi
11. Buka url http://127.0.0.1:8000 di browser untuk melihat aplikasi 
    
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
