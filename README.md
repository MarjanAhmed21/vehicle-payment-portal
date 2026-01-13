Vehicle Payment Portal 🚗💳










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

Database migrations for customers, payments, and sessions

Input validation and error handling

CRUD operations: create, read, update, delete payments

Frontend / Vue.js

UserForm.vue → add new customers

PaymentForm.vue → add payments linked to customers

PaymentTable.vue → view all payments with customer info

Inline edit and delete buttons for payments

Vue Router navigation between pages

Success and error messages for all actions

Setup Instructions
1. Clone the repository
git clone https://github.com/MarjanAhmed21/vehicle-payment-portal.git
cd vehicle-payment-portal

2. Install PHP dependencies
composer install

3. Install Node dependencies
npm install

4. Generate Laravel app key
php artisan key:generate

5. Run database migrations
php artisan migrate

6. Compile frontend assets
npm run dev

7. Serve the application
php artisan serve

8. Open in browser
http://127.0.0.1:8000

Usage

Navigate using the top links:

Page	Description
Add Customer	Create new customers
Add Payment	Record payments for existing customers
View Payments	View all payments, edit or delete inline

Customer IDs are auto-generated.

Future Enhancements

Show total payments per customer

Add filtering/searching for payments

User authentication for secure access

Export payments as CSV or PDF
