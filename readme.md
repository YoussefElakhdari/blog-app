# Blog App Full Stack Project

This project is a full-stack **blogging platform** with a **React frontend** and a **Laravel 12 backend REST API**. Users can register, login, create posts, comment, react, and save posts. Profile pictures and post images are supported.

---

## Table of Contents

* [Project Overview](#project-overview)
* [Features](#features)
* [Tech Stack](#tech-stack)
* [Frontend Setup](#frontend-setup)
* [Backend Setup](#backend-setup)
* [Environment Variables](#environment-variables)
* [Database](#database)
* [Running the Project](#running-the-project)
* [API Endpoints](#api-endpoints)

---

## Project Overview

Full-stack blogging platform with:

* **Frontend:** React + TailwindCSS
* **Backend:** Laravel 12 REST API

Users can:

* Register/login
* Upload profile pictures
* Create posts with images
* Comment on posts
* React to posts/comments
* Save posts

The backend is stateless and uses **API token authentication** via Laravel Sanctum.

---

## Features

* User authentication (register/login/logout)
* Token-based API authentication (Sanctum)
* CRUD operations for posts and comments
* Image uploads for profiles and posts
* Post reactions and saved posts
* Clean JSON responses for all endpoints
* Responsive React frontend with post feeds, profile pages, and forms

---

## Tech Stack

* **Frontend:** React, TailwindCSS, Axios
* **Backend:** PHP 8.2, Laravel 12, MySQL, Sanctum

---

## Frontend Setup

1. Navigate to the frontend folder (adjust path as needed):

```bash
cd blog-app/client
```

2. Install dependencies:

```bash
npm install
```

3. Start the development server:

```bash
npm run dev
```

* The frontend will run on `http://localhost:5173` (default for Vite).

---

## Backend Setup

1. Navigate to the backend folder:

```bash
cd blog-app/server
```

2. Install PHP dependencies:

```bash
composer install
```

3. Create the `.env` file:

```bash
cp .env.example .env
```

4. Generate the application key:

```bash
php artisan key:generate
```

5. Configure your database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=
```

6. Run migrations and seed the database:

```bash
php artisan migrate --seed
```

7. Create storage link for images:

```bash
php artisan storage:link
```

8. Start the backend server:

```bash
php artisan serve
```

* Laravel backend will run on `http://127.0.0.1:8000`.

---

## Environment Variables

### Frontend

* Usually uses `.env` or `.env.local` for API base URL:

```env
VITE_API_BASE_URL=http://127.0.0.1:8000/api
```

### Backend

```env
APP_NAME=BlogApp
APP_ENV=local
APP_KEY=<generated-key>
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=none   # API is stateless
FILESYSTEM_DISK=local
```

Generate APP_KEY

```bash
php artisan key:generate
```

---

## Database

Tables include:

* `users` 
* `posts`
* `post_images`
* `comments`
* `reactions` 
* `saved_posts`

---

## Running the Project

1. Start the backend first (`php artisan serve`).
2. Start the frontend (`npm run dev`).
3. Access the app via frontend URL and it communicates with Laravel REST API.

---

## API Endpoints

### Authentication

| Method | Endpoint        | Description                 |
| ------ | --------------- | --------------------------- |
| POST   | `/api/register` | Register a new user         |
| POST   | `/api/login`    | Login and receive API token |
| POST   | `/api/logout`   | Logout (revoke token)       |
| GET    | `/api/user`       | Get authenticated user data |

### Posts

| Method | Endpoint          | Description         |
| ------ | ----------------- | ------------------- |
| GET    | `/api/posts`      | Get all posts       |
| POST   | `/api/posts`      | Create a new post   |
| GET    | `/api/posts/{id}` | Get a specific post |
| PUT    | `/api/posts/{id}` | Update a post       |
| DELETE | `/api/posts/{id}` | Delete a post       |

### Comments, Reactions, and Saved Posts

* `/api/comments` → CRUD for comments
* `/api/reactions` → Like/laugh/angry/inspiring on posts or comments
* `/api/saved-posts` → Save or unsave posts

---

## Notes

* Profile images: `public/images/profiles`
* Post images: `public/images/posts`
* All API responses are JSON
* `profile_pic_url` accessor provides full image URL
