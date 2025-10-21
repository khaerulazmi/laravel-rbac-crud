# 🚀 Laravel RBAC CRUD Project - Panduan Lengkap

Project ini dibuat menggunakan **Laravel Framework** dengan fitur:
- Autentikasi (Login & Register)
- Role Based Access Control (RBAC)
- CRUD Data
- Upload File
- Tampilan dengan Tailwind CSS

## ⚙️ Persiapan Awal: Install dan Setup Project Laravel

### 1️⃣ Clone Project dari GitHub
Buka terminal, lalu jalankan:
```bash
git clone https://github.com/username/nama-project.git
cd nama-project

2️⃣ Install Dependency

Pastikan Composer sudah terpasang.
Lalu jalankan:

composer install


Selanjutnya install dependency frontend:

npm install
npm run build/npm run dev

3️⃣ Siapkan File Environment

Copy file contoh .env.example menjadi .env:

copy .env.example dan rename menjadi .env

4️⃣ Generate App Key

php artisan key:generate

5️⃣ Konfigurasi Database

Buka file .env, lalu ubah bagian berikut sesuai pengaturan MySQL kamu:

DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

6️⃣ Jalankan Migration & Seeder

Buat struktur tabel dan data awal (misalnya role admin & user):

php artisan migrate
php artisan db:seed

# 📁 Konfigurasi Upload File di Laravel

Project ini memiliki fitur **upload file**, sehingga perlu beberapa pengaturan tambahan agar file yang diunggah bisa tampil di browser.

---

## ⚙️ 1️⃣ Ubah Konfigurasi di `.env`

Pastikan bagian berikut di file `.env` sudah sesuai:

```env
FILESYSTEM_DISK=public

🔗 2️⃣ Buat Shortcut (Symbolic Link)

Setelah konfigurasi di atas selesai, jalankan perintah ini di terminal:

php artisan storage:link

7️⃣ Jalankan Server Laravel
php artisan serve

🧰 Tech Stack

- Framework: Laravel 11
- Database: MySQL
- Frontend: Blade + Tailwind CSS
- Authentication: Laravel Breeze / Fortify
- Role Access: Middleware & Gates
