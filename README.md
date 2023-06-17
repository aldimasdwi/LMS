## LARASCHOOL V 1.0.0
<p><b>
LARASCHOOL adalah aplikasi website sekolah dibuat dengan framework laravel 8.
</b></p>

## Instalasi
- download zip <a href="https://github.com/rahmathidayat9/laraschool/archive/master.zip">disini</a> 
- atau clone : git clone https://github.com/rahmathidayat9/laraschool

## Setup
- buka direktori project di terminal anda.
- ketikan command : cp .env.example .env (copy paste file .env.example)
- buat database 

Lalu ketik command dibawah ini
- composer install
- php artisan optimize:clear 
- php artisan key:generate (generate app key)
- php artisan migrate (migrasi database)
- php artisan db:seed 

## Login
Email : rahmat@example.com
Password : password

## Fitur
# Front / Depan
- Home (Halaman home,menampilkan materi,pengumuman terbaru) 
- Materi & Show + pencarian materi  
- Pengumuman & Show

# admin
- Autentikasi (menggunakan fortify)
- Halaman Dashboard
- Manage User (CRUD)
- Manage Materi (CRUD)
- Manage Agenda (CRUD)
- Manage Pengumuman (CRUD)
- Manage Kategori Materi (CRUD)

## Author
- Rahmat Hidayatullah
