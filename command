# 1. Masuk ke folder project (setelah clone atau extract ZIP)
cd <nama-folder-project>

# 2. Install PHP dependencies
composer install

# 3. Buat file environment
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Setup database
php artisan migrate
php artisan db:seed   # opsional, kalau ada seeder

# 6. Jalankan server
php artisan serve

# 7. Opsional (untuk frontend & storage)
npm install
npm run dev
php artisan storage:link
