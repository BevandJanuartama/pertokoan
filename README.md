# Pertokoan

<div align="center">

**Base CRUD Laravel Built on Laravel 12**

[![Laravel](https://img.shields.io/badge/Laravel-12.21.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

</div>

---

## 🚀 Tech Stack

| Category | Technology | Version | Description |
|----------|-----------|---------|-------------|
| **Backend Framework** | Laravel | `12.21.0` | Leading PHP framework for web artisans |
| **Database** | MySQL | Latest | Robust relational database system |
| **Frontend Styling** | Tailwind CSS | `3.x` | Utility-first CSS framework |
| **Authentication** | Laravel Breeze | Latest | Official Laravel authentication scaffolding |
| **Package Management** | Composer & NPM | Latest | PHP and JavaScript dependency managers |

---

## 🖥️ System Requirements

Before installation, ensure your system meets Laravel's minimum server requirements:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x & NPM >= 9.x
- **MySQL** >= 5.7 

📚 **Reference:** [Laravel Server Requirements](https://laravel.com/docs/12.x/deployment#server-requirements)

---

## ⚡ Quick Start Guide

Follow these steps to get the project up and running on your local machine.

### 1️⃣ Clone & Install Dependencies

```bash
# Clone the repository
git clone https://github.com/BevandJanuartama/pertokoan.git 

# Navigate to project directory
cd pertokoan

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 2️⃣ Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

**⚙️ Configure your `.env` file:**

```env
APP_NAME="Pertokoan"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3️⃣ Database Setup

```bash
# Run database migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed
```

### 4️⃣ Build Assets & Run

```bash
# Build frontend assets
npm run build

# Start development server
php artisan serve
```

🎉 **Your application should now be running at:** `http://localhost:8000`

---

## 📞 Support

If you have any questions, feel free to reach out:

📱 **Instagram:** [@jnrtma](https://www.instagram.com/jnrtma?igsh=MXJydmdwenFoYnA1Yw%3D%3D&utm_source=qr)

---

## 👨‍💻 Developer

**Muhammad Bevand Januartama**

* 💼 Software Engineer (Rekayasa Perangkat Lunak)
* 🏫 SMK Telkom Banjarbaru, Indonesia
* 🔗 GitHub: [@BevandJanuartama](https://github.com/BevandJanuartama)

---

## 📄 License

This project is proprietary software. All rights reserved.

---

<div align="center">

Made with ❤️ in Banjarbaru, Indonesia

⭐ **Star this repository if you find it helpful!**

</div>