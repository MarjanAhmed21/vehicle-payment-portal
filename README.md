Vehicle Payment Portal

A Laravel + Vue.js payment portal demonstrating REST API development, frontend integration, and basic CRUD operations for customers and payments.

Tech Stack

PHP 8.2

Laravel 12

Vue.js 3

Vite

Axios

Tailwind CSS

MySQL (or SQLite)

Features
Backend / Laravel

REST API for customers and payments

Eloquent models: Customer, Payment

Database migrations for customers, payments, sessions

Validation for form inputs

CRUD operations: create, read, update, delete payments

Frontend / Vue.js

UserForm.vue → add new customers

PaymentForm.vue → add payments linked to customers

PaymentTable.vue → view all payments with customer info

Inline edit and delete buttons for payments

Vue Router navigation between pages

Success and error messages for all actions

Setup

Clone the repo:

git clone https://github.com/MarjanAhmed21/vehicle-payment-portal.git
cd vehicle-payment-portal


Install PHP dependencies:

composer install


Install Node dependencies:

npm install


Generate Laravel app key:

php artisan key:generate


Run database migrations:

php artisan migrate


Compile frontend assets:

npm run dev


Serve the application:

php artisan serve


Open in browser: http://127.0.0.1:8000
