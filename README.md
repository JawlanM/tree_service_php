# Arborist Business Management System

A web application for a tree-care business. It combines a public website, a customer portal, and separate dashboards for administrators and staff.

Built with CakePHP 5 and MySQL.

## Features

**Public site**
- Home page and a contact form protected by a captcha

**Administrators**
- Dashboard for managing customers, services, quote visits and contact messages
- Staff management, including active and inactive employees
- Shift planning: create shifts (morning, afternoon or full day) and allocate staff
- Equipment management, and allocating equipment to shifts

**Staff**
- A staff dashboard, and access to the quote visits assigned to them

**Accounts and security**
- Separate access for administrators, staff and customers, checked by role
- Sign-in with hashed passwords, and password reset by email
- CSRF protection on forms

## Tech stack

- PHP 8.2+, CakePHP 5.2 (MVC)
- MySQL
- Composer

## Running locally

Needs PHP 8.2 or later, Composer and MySQL.

```bash
git clone https://github.com/JawlanM/tree_service_php.git
cd tree_service_php
composer install
cp config/app_local.example.php config/app_local.php
```

1. Create a MySQL database and set its name, username and password in `config/app_local.php`.
2. Import the schema and sample data from `config/schema/arborist_tre.sql`.
3. Start the development server:

```bash
bin/cake server
```

Then open http://localhost:8765.

## Project structure

```
src/Controller/        controllers, including Admin/ and Employee/ dashboards
src/Model/             tables and entities
src/Mailer/            password reset emails
templates/             page and email templates
config/schema/         database schema and sample data
```

Sample data uses placeholder names, emails and phone numbers.
