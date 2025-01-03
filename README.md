# furni Website

Welcome to the furni website, built using Laravel. This README will guide you through the setup, structure, and functionality of the project.

---

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Folder Structure](#folder-structure)
4. [Database Setup](#database-setup)
5. [Features](#features)
6. [Deployment](#deployment)

---

## Prerequisites

Ensure you have the following installed on your system:

- PHP >= 8.1
- Composer
- MySQL
- Node.js and npm (optional, for frontend assets)
- Laravel >= 10.x

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/tabishalia.git
   cd your-repo-folder
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:

   ```bash
   cp .env.example .env
   ```

4. Generate an application key:

   ```bash
   php artisan key:generate
   ```

5. Set up your database:

   - Configure the database credentials in `.env` (e.g., DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).

6. Run migrations and seed the database:

   ```bash
   php artisan migrate --seed
   ```

7. Serve the application:

   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

---

## Folder Structure

### Views

- **Dashboard Views**: Located in `resources/views/dashboard`.
- **Movie Views**:
  - `resources/views/admin/movie/index.blade.php`: Displays the movie list.
  - `resources/views/admin/movie/edit.blade.php`: Movie edit form.
  - `resources/views/admin/movie/create.blade.php`: Movie creation form.

### Controller

- `app/Http/Controllers/MovieController.php`: Handles CRUD operations for movies.

### Public Assets

- **Images**: Stored and accessed online (not locally).

## Features

1. **CRUD Operations**:
   - Add, update, delete, and view movies.
2. **Admin Panel**:
   - Manage movies via dedicated admin views.
     Deployment

1) Deploy your code to Hostinger or your preferred hosting provider.
2) Ensure `.env` is properly configured for the production environment.
3) Set the appropriate permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```
4) Run migrations in production:
   ```bash
   php artisan migrate --force
   ```
5) Use Laravel's optimized commands for performance:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

## Support

For issues or support, please contact the tabishalia development team or submit an issue on the project's repository.

---

**Thank you for using the furni product website!**

