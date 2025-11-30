# Library Management API

**Library Management API** is a RESTful API built with **Laravel 12**, designed to manage books, members, borrowings, and library staff efficiently.

---

## Table of Contents

* [Requirements](#requirements)
* [Installation](#installation)
* [Environment Configuration](#environment-configuration)
* [Dependencies](#dependencies)
* [Running the Application](#running-the-application)
* [API Endpoints](#api-endpoints)

  * [Authentication](#authentication)
  * [Books](#books)
  * [Members](#members)
  * [Borrowings](#borrowings)
  * [Reports](#reports)
* [Middleware](#middleware)
* [Error Handling](#error-handling)
* [Project Structure](#project-structure)

---

## Requirements

* PHP 8.1+
* Composer
* MySQL / PostgreSQL / SQLite
* Laravel 12
* Web server (Apache/Nginx or PHP built-in server)

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/library-api.git
cd library-api
```

2. Install dependencies:

```bash
composer install
```

3. Generate application key:

```bash
php artisan key:generate
```

4. Run database migrations:

```bash
php artisan migrate
```

5. (Optional) Seed the database:

```bash
php artisan db:seed
```

---

## Environment Configuration

Copy `.env.example` to `.env` and configure your environment variables:

```dotenv
APP_NAME=LibraryAPI
APP_ENV=local
APP_KEY=base64:generated_key_here
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD=secret

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@library.com
MAIL_FROM_NAME="Library API"
```

---

## Dependencies

* Laravel 12 Framework
* Laravel Sanctum / JWT Authentication (for API tokens)
* Eloquent ORM (built-in)
* Mail services (optional email notifications)

---

## Running the Application

Start the development server:

```bash
php artisan serve
```

The API will be available at: `http://127.0.0.1:8000`

---

## API Endpoints

### Authentication

 Endpoint         Method   Description                    

 `/api/register`   POST     Register a new staff/member    
 `/api/login`      POST     Login and receive access token 
 `/api/logout`     POST     Logout user                    

### Books

 Endpoint           Method  Description         

 `/api/books`       GET     List all books      
 `/api/books/{id}`  GET     Get book details    
 `/api/books`       POST    Create a new book   
 `/api/books/{id}`  PUT     Update book details 
 `/api/books/{id}`  DELETE  Delete a book       

### Members

 Endpoint             Method  Description         

 `/api/members`       GET     List all members    
 `/api/members/{id}`  GET     Get member details  
 `/api/members`       POST    Register new member 
 `/api/members/{id}`  PUT     Update member info  
 `/api/members/{id}`  DELETE  Delete member       

### Borrowings

 Endpoint                       Method  Description            

 `/api/borrowings`              GET     List all borrowings    
 `/api/borrowings`              POST    Borrow a book          
 `/api/borrowings/{id}/return`  POST    Return a borrowed book 
 `/api/borrowings/{id}`         DELETE  Cancel borrowing       

### Reports

 Endpoint                        Method  Description                      

 `/api/reports/borrowed-books`   GET     List of currently borrowed books 
 `/api/reports/member-activity`  GET     Borrowing history per member     

---

## Middleware

* **Auth Middleware:** Protects endpoints that require authentication.
* **Role/Permission Middleware:** Optional, for staff vs admin privileges.

---

## Error Handling

Laravel automatically returns JSON for API errors:

```json
{
  "message": "Resource not found",
  "status": 404
}
```

Common HTTP codes:

* `400` – Bad Request
* `401` – Unauthorized
* `403` – Forbidden
* `404` – Not Found
* `500` – Internal Server Error



