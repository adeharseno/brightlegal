# BrightLegal - Laravel CMS Project

Proyek Laravel dengan Tailwind CSS dan Alpine.js untuk website BrightLegal.

## Fitur

- ✅ Laravel 12
- ✅ Tailwind CSS dengan font Inter
- ✅ Alpine.js untuk interaktivitas
- ✅ Layout modular (header, footer, app.blade.php)
- ✅ Halaman Home dengan styling lengkap
- ✅ CMS Login System
- ✅ Admin Dashboard

## Kredensial Login

**Email:** admin@admin.com  
**Password:** admin123

## Instalasi

Proyek sudah terinstall lengkap. Untuk menjalankan:

### 1. Jalankan Laravel Server

```bash
php artisan serve
```

Server akan berjalan di: http://127.0.0.1:8000

### 2. Jalankan Vite Dev Server (Optional, untuk development)

```bash
npm run dev
```

Atau build untuk production:

```bash
npm run build
```

## Struktur Proyek

### Routes (routes/web.php)

- `/` - Halaman Home (HomeController)
- `/login` - Halaman Login
- `/cms` - Dashboard CMS (Protected, butuh login)
- `/logout` - Logout

### Controllers

- `HomeController` - Mengelola halaman home
- `Auth/LoginController` - Mengelola autentikasi
- `CmsController` - Mengelola dashboard CMS

### Views

#### Layouts
- `layouts/app.blade.php` - Layout utama
- `layouts/header.blade.php` - Header dengan navigasi
- `layouts/footer.blade.php` - Footer

#### Pages
- `home.blade.php` - Halaman home
- `auth/login.blade.php` - Halaman login
- `cms/index.blade.php` - Dashboard CMS

### Database

Database menggunakan SQLite (sudah termasuk dalam Laravel).

Migration untuk users table sudah dijalankan otomatis.

Admin user sudah di-seed dengan:
- Email: admin@admin.com
- Password: admin123

## Teknologi

- **Laravel 12** - PHP Framework
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Build tool
- **Font Inter** - Typography

## Command Penting

```bash
# Migrasi database
php artisan migrate

# Seed database (sudah dijalankan)
php artisan db:seed

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generate application key (sudah dijalankan)
php artisan key:generate
```

## Fitur Halaman Home

- Hero section dengan gradient
- Section Services (3 cards)
- Section Why Choose Us
- Responsive design
- Hover effects
- Mobile menu dengan Alpine.js

## Fitur CMS

- Protected dengan middleware auth
- Dashboard dengan statistik
- Quick actions
- Recent activity
- Responsive design

## Development

Untuk development, jalankan kedua server:

1. Laravel: `php artisan serve`
2. Vite: `npm run dev`

## Production Build

```bash
npm run build
```

File akan di-build ke folder `public/build/`


Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
