# Hướng dẫn Cấu trúc Dự án Laravel + React

## 📋 Tổng quan Dự án

Đây là một dự án **Laravel 12** kết hợp với **React + TypeScript** sử dụng **Inertia.js** để tạo một Single Page Application (SPA) hiện đại.

### Công nghệ sử dụng:
- **Backend**: Laravel 12, PostgreSQL
- **Frontend**: React 19, TypeScript, Tailwind CSS 4
- **Authentication**: Laravel Fortify (với Two-Factor Authentication)
- **SPA Framework**: Inertia.js
- **Build Tool**: Vite

---

## 📁 Cấu trúc Thư mục và Chức năng

### 🗂️ `/app` - Backend Application Logic

#### `/app/Http/Controllers`
Chứa các controller xử lý HTTP requests.

- **`Controller.php`**: Base controller class, tất cả controllers khác kế thừa từ đây
- **`Settings/ProfileController.php`**: Xử lý cập nhật thông tin profile người dùng
- **`Settings/PasswordController.php`**: Xử lý thay đổi mật khẩu
- **`Settings/TwoFactorAuthenticationController.php`**: Quản lý xác thực 2 yếu tố (2FA)

#### `/app/Http/Middleware`
Middleware xử lý các request trước khi đến controller.

- **`HandleInertiaRequests.php`**: 
  - Xử lý Inertia.js requests
  - Chia sẻ dữ liệu chung cho tất cả pages (auth user, quotes, sidebar state)
  - Định nghĩa root view template
  
- **`HandleAppearance.php`**: 
  - Xử lý theme (light/dark mode)
  - Quản lý cookie appearance

#### `/app/Http/Requests`
Form Request Validation classes.

- **`Settings/ProfileUpdateRequest.php`**: Validation rules cho việc cập nhật profile
- **`Settings/PasswordUpdateRequest.php`**: Validation rules cho việc thay đổi mật khẩu

#### `/app/Models`
Eloquent Models (Database Models).

- **`User.php`**: 
  - Model đại diện cho bảng users
  - Hỗ trợ Two-Factor Authentication
  - Có các attributes: name, email, password
  - Tự động hash password khi lưu

#### `/app/Actions/Fortify`
Custom actions cho Laravel Fortify (Authentication).

- **`CreateNewUser.php`**: Logic tạo user mới khi đăng ký
- **`PasswordValidationRules.php`**: Custom validation rules cho password
- **`ResetUserPassword.php`**: Logic reset password

#### `/app/Providers`
Service Providers - đăng ký services và bindings.

- **`AppServiceProvider.php`**: Service provider chính của ứng dụng
- **`FortifyServiceProvider.php`**: Cấu hình Laravel Fortify (đăng ký, đăng nhập, 2FA, etc.)

---

### 🗂️ `/routes` - Định nghĩa Routes

- **`web.php`**: 
  - Route chính của ứng dụng
  - Route `/`: Trang chủ (welcome page)
  - Route `/dashboard`: Dashboard (yêu cầu authentication)
  - Include routes từ `settings.php`

- **`settings.php`**: 
  - Routes cho phần Settings
  - `/settings/profile`: Quản lý profile
  - `/settings/password`: Đổi mật khẩu
  - `/settings/appearance`: Cài đặt giao diện (theme)
  - `/settings/two-factor`: Cài đặt 2FA

- **`console.php`**: Định nghĩa Artisan commands (CLI commands)

---

### 🗂️ `/config` - Cấu hình Ứng dụng

- **`app.php`**: Cấu hình chung (timezone, locale, service providers)
- **`auth.php`**: Cấu hình authentication (guards, providers)
- **`database.php`**: Cấu hình kết nối database (PostgreSQL, MySQL, SQLite, etc.)
- **`cache.php`**: Cấu hình cache
- **`filesystems.php`**: Cấu hình file storage
- **`fortify.php`**: Cấu hình Laravel Fortify (features, routes, etc.)
- **`inertia.php`**: Cấu hình Inertia.js
- **`logging.php`**: Cấu hình logging
- **`mail.php`**: Cấu hình email
- **`queue.php`**: Cấu hình queue jobs
- **`session.php`**: Cấu hình session
- **`services.php`**: Cấu hình third-party services

---

### 🗂️ `/database` - Database

#### `/database/migrations`
Các file migration tạo/cập nhật cấu trúc database.

- **`0001_01_01_000000_create_users_table.php`**: Tạo bảng users
- **`0001_01_01_000001_create_cache_table.php`**: Tạo bảng cache
- **`0001_01_01_000002_create_jobs_table.php`**: Tạo bảng jobs (queue)
- **`2025_08_26_100418_add_two_factor_columns_to_users_table.php`**: Thêm cột 2FA vào bảng users

#### `/database/factories`
Model Factories để tạo fake data cho testing.

- **`UserFactory.php`**: Factory tạo fake users cho testing

#### `/database/seeders`
Database Seeders để seed dữ liệu mẫu.

- **`DatabaseSeeder.php`**: Seeder chính, có thể gọi các seeders khác

#### `/database/database.sqlite`
File SQLite database (nếu sử dụng SQLite thay vì PostgreSQL)

---

### 🗂️ `/resources` - Frontend Resources

#### `/resources/js` - React/TypeScript Code

##### `/resources/js/app.tsx`
- **File entry point chính** của frontend
- Khởi tạo Inertia.js app
- Cấu hình React root
- Load theme (light/dark mode) khi khởi động

##### `/resources/js/pages` - React Pages (Components)

**Authentication Pages:**
- **`auth/login.tsx`**: Trang đăng nhập
- **`auth/register.tsx`**: Trang đăng ký
- **`auth/forgot-password.tsx`**: Quên mật khẩu
- **`auth/reset-password.tsx`**: Reset mật khẩu
- **`auth/confirm-password.tsx`**: Xác nhận mật khẩu (cho các thao tác nhạy cảm)
- **`auth/verify-email.tsx`**: Xác thực email
- **`auth/two-factor-challenge.tsx`**: Nhập mã 2FA

**Application Pages:**
- **`welcome.tsx`**: Trang chủ (landing page)
- **`dashboard.tsx`**: Dashboard sau khi đăng nhập

**Settings Pages:**
- **`settings/profile.tsx`**: Cập nhật thông tin profile
- **`settings/password.tsx`**: Đổi mật khẩu
- **`settings/appearance.tsx`**: Cài đặt theme (light/dark mode)
- **`settings/two-factor.tsx`**: Cài đặt 2FA

##### `/resources/js/components` - Reusable Components
Chứa các React components có thể tái sử dụng (49 files):
- UI components (buttons, forms, modals, etc.)
- Layout components
- Feature-specific components

##### `/resources/js/layouts` - Layout Components
Các layout templates:
- Main layout
- Auth layout
- Dashboard layout
- Settings layout

##### `/resources/js/hooks` - Custom React Hooks
Custom hooks để tái sử dụng logic:
- **`use-appearance.tsx`**: Hook quản lý theme (light/dark mode)
- Các hooks khác cho form handling, API calls, etc.

##### `/resources/js/lib` - Utility Libraries
Thư viện tiện ích:
- Helper functions
- Utility classes

##### `/resources/js/types` - TypeScript Type Definitions
Định nghĩa TypeScript types và interfaces

##### `/resources/js/actions` - Inertia Actions
Các action functions để gửi requests đến Laravel backend

##### `/resources/js/routes` - Frontend Routes
Định nghĩa routes cho frontend (có thể sử dụng với wayfinder)

##### `/resources/js/ssr.tsx`
Server-Side Rendering entry point cho Inertia.js SSR

#### `/resources/css`
- **`app.css`**: File CSS chính, import Tailwind CSS

#### `/resources/views`
- **`app.blade.php`**: Root Blade template cho Inertia.js
  - Load Vite assets
  - Chứa div `#app` để React mount vào

---

### 🗂️ `/public` - Public Assets

Thư mục này được serve trực tiếp bởi web server.

- **`index.php`**: Entry point của Laravel application
- **`favicon.ico`, `favicon.svg`**: Favicon
- **`robots.txt`**: File cho search engines
- **`build/`**: Compiled assets từ Vite (JS, CSS)
- **`hot`**: File để Vite HMR (Hot Module Replacement) detect

---

### 🗂️ `/storage` - File Storage

- **`app/public/`**: Public storage (có thể truy cập qua URL)
- **`app/private/`**: Private storage
- **`framework/cache/`**: Framework cache files
- **`framework/sessions/`**: Session files
- **`framework/views/`**: Compiled Blade views
- **`logs/`**: Log files (laravel.log, browser.log)
- **`pail/`**: Laravel Pail log files

---

### 🗂️ `/tests` - Test Files

- **`TestCase.php`**: Base test case class
- **`Feature/Auth/`**: Feature tests cho authentication
- **`Feature/DashboardTest.php`**: Test cho dashboard
- **`Feature/Settings/`**: Tests cho settings
- **`Unit/ExampleTest.php`**: Unit test mẫu

---

### 🗂️ `/bootstrap` - Bootstrap Files

- **`app.php`**: Bootstrap file chính
  - Cấu hình application
  - Đăng ký middleware
  - Đăng ký routes
  - Xử lý exceptions

- **`cache/`**: Bootstrap cache files
- **`providers.php`**: Service providers cache

---

### 🗂️ `/vendor` - Composer Dependencies

Chứa tất cả các packages được cài đặt qua Composer (Laravel framework, Inertia, Fortify, etc.)

---

## 📄 Files Quan trọng ở Root

### `composer.json`
- Định nghĩa PHP dependencies
- Scripts để chạy development, testing
- Autoload configuration

### `package.json`
- Định nghĩa Node.js dependencies (React, TypeScript, Vite, etc.)
- Scripts: `dev`, `build`, `build:ssr`, `lint`, `format`

### `vite.config.ts`
- Cấu hình Vite build tool
- Cấu hình Laravel Vite plugin
- Cấu hình React plugin
- Cấu hình Tailwind CSS
- Cấu hình Wayfinder plugin

### `.env`
- Environment variables (database, app config, etc.)
- **KHÔNG commit file này vào Git!**

### `artisan`
- Laravel CLI tool
- Chạy commands: `php artisan migrate`, `php artisan serve`, etc.

### `tsconfig.json`
- TypeScript configuration
- Compiler options, paths, etc.

### `phpunit.xml`
- PHPUnit test configuration

---

## 🔄 Luồng Hoạt động của Ứng dụng

### 1. Request Flow:
```
Browser Request 
  → public/index.php 
  → bootstrap/app.php 
  → Routes (web.php, settings.php)
  → Middleware (HandleAppearance, HandleInertiaRequests)
  → Controller
  → Inertia Response
  → Frontend (React pages)
```

### 2. Authentication Flow:
1. User đăng ký/đăng nhập qua Fortify
2. Fortify xử lý authentication
3. Nếu có 2FA, redirect đến two-factor-challenge page
4. Sau khi authenticated, redirect đến dashboard

### 3. Frontend-Backend Communication:
- Sử dụng Inertia.js để giao tiếp
- Frontend gửi requests qua Inertia router
- Backend trả về Inertia responses với data
- Frontend render React components với data đó
- Không cần API endpoints riêng (trừ khi cần)

---

## 🚀 Các Lệnh Thường Dùng

### Development:
```bash
# Chạy development server (Laravel + Vite + Queue + Logs)
composer dev

# Chạy với SSR
composer dev:ssr

# Chỉ chạy Laravel server
php artisan serve

# Chỉ chạy Vite dev server
npm run dev
```

### Build:
```bash
# Build production assets
npm run build

# Build với SSR
npm run build:ssr
```

### Database:
```bash
# Chạy migrations
php artisan migrate

# Tạo migration mới
php artisan make:migration create_table_name

# Rollback migrations
php artisan migrate:rollback
```

### Testing:
```bash
# Chạy tests
composer test
# hoặc
php artisan test
```

---

## 📝 Ghi chú Quan trọng

1. **Database**: Dự án sử dụng PostgreSQL (cấu hình trong `.env`)
2. **Authentication**: Sử dụng Laravel Fortify với hỗ trợ 2FA
3. **Frontend**: React 19 với TypeScript, không cần API riêng nhờ Inertia.js
4. **Styling**: Tailwind CSS 4 với Radix UI components
5. **Build Tool**: Vite thay vì Webpack/Mix
6. **Theme**: Hỗ trợ light/dark mode với cookie persistence

---

## 🔗 Tài liệu Tham khảo

- [Laravel Documentation](https://laravel.com/docs)
- [Inertia.js Documentation](https://inertiajs.com/)
- [Laravel Fortify Documentation](https://laravel.com/docs/fortify)
- [React Documentation](https://react.dev/)
- [Tailwind CSS Documentation](https://tailwindcss.com/)

