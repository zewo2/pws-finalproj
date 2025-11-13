# MSF Movies - PWS Final Project

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## About This Project

This is a final project for the **PWS (Programação Web Servidor)** course at **ISTEC** - Instituto Superior de Tecnologias Avançadas.

**Course:** PWS - Programação Web Servidor  
**Institution:** ISTEC  
**Academic Year:** 2024/2025 - 1º Ano, 2º Semestre

## Project Overview

A comprehensive movie management system built with Laravel 12, featuring user authentication, role-based access control, and a complete CRUD system for movie management. The application provides both a public-facing interface for browsing movies and an administrative backend for content management.

## Features

### Public Features
- **Movie Browsing**: View all available movies with pagination
- **Advanced Filtering**: Search by title and filter by genre
- **Sorting Options**: Sort movies by newest or oldest
- **Movie Details**: View detailed information about each movie
- **Favorites System**: Authenticated users can save favorite movies
- **Responsive Design**: Mobile-friendly interface

### Administrative Features
- **User Management**: Complete CRUD operations for users (Admin only)
- **Movie Management**: Add, edit, and delete movies (Admin & Editor)
- **Role-Based Access Control**: Three user types (Admin, Editor, User)
- **Dashboard**: Separate dashboards for users and maintenance staff
- **User Registration**: Public registration system with email verification support

### Authentication & Authorization
- **Laravel Fortify**: Secure authentication system
- **Two-Factor Authentication**: Optional 2FA support
- **Middleware Protection**: Route protection based on user roles
- **Custom Middleware**: `admin` and `admin_or_editor` middleware

## Technical Stack

- **Framework**: Laravel 12.13
- **PHP**: 8.2+
- **Database**: MySQL/MariaDB
- **Frontend**: Blade Templates, Custom CSS
- **Authentication**: Laravel Fortify
- **Asset Bundling**: Vite

## Database Structure

### Main Tables
- `users` - User accounts with role management
- `movies` - Movie catalog with metadata
- `favs` - User favorite movies (many-to-many relationship)
- `registers` - User registration records

### User Roles
- **Admin**: Full system access (user management + movie management)
- **Editor**: Movie management access only
- **User**: Public access + favorites management

## Installation

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/zewo2/pws-finalproj.git
   cd pws-finalproj
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Edit `.env` file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   
   Open your browser and navigate to `http://localhost:8000`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── MovieController.php      # Movie CRUD operations
│   │   ├── UserController.php       # User management
│   │   ├── DashboardController.php  # Dashboard logic
│   │   └── RegisterController.php   # User registration
│   └── Middleware/                  # Custom middleware
├── Models/
│   ├── User.php                     # User model
│   ├── Movie.php                    # Movie model
│   └── Fav.php                      # Favorites model
└── Providers/
    └── FortifyServiceProvider.php   # Authentication setup

resources/
├── views/
│   ├── movies/                      # Movie views
│   ├── users/                       # User management views
│   ├── dashboard/                   # Dashboard views
│   └── layouts/                     # Master layouts
└── css/                             # Custom styles

routes/
└── web.php                          # Application routes
```

## Key Routes

### Public Routes
- `/` - Home page
- `/movies` - Browse all movies
- `/movies/public/{movie}` - Movie details
- `/register-users/create` - User registration

### Authenticated Routes
- `/dashboard` - User dashboard
- `/favorites` - User's favorite movies
- `/movies/{movie}/favorite` - Toggle favorite

### Admin/Editor Routes
- `/maintenance-dashboard` - Maintenance dashboard
- `/all-movies` - Movie management list
- `/maintenance-movies/*` - Movie CRUD operations

### Admin Only Routes
- `/admin-users/*` - User management CRUD

## Development

### Running in development mode
```bash
# Terminal 1: Run Laravel development server
php artisan serve

# Terminal 2: Watch and compile assets
npm run dev
```

### Running tests
```bash
php artisan test
```

## Academic Context

This project demonstrates the following concepts learned in the PWS course:

- **MVC Architecture**: Proper separation of concerns
- **Database Design**: Normalized database structure with relationships
- **Authentication & Authorization**: Secure user management
- **RESTful Routes**: Resource controllers and proper HTTP methods
- **Blade Templating**: Dynamic content rendering
- **Eloquent ORM**: Database queries and relationships
- **Middleware**: Request filtering and route protection
- **Form Validation**: Data integrity and security
- **File Uploads**: Image storage and management
- **Session Management**: User state persistence

## License

This project is developed for educational purposes as part of the ISTEC PWS course curriculum.

Built with [Laravel](https://laravel.com) - The PHP Framework for Web Artisans.
