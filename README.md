# 🎟️ Movie Ticket Booking System - PHP

<div align="center">

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?logo=mysql)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript)
![jQuery](https://img.shields.io/badge/jQuery-3.x-0769AD?logo=jquery)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple?logo=bootstrap)
![Status](https://img.shields.io/badge/Status-Active-brightgreen)
![License](https://img.shields.io/badge/License-Open%20Source-green)

**Movie Theater Seat Booking System**

A web-based movie ticket reservation application built with PHP, MySQL, JavaScript, and jQuery. Users can browse movies, select theaters, reserve seats, and manage bookings through a simple admin interface.

[Features](#-features) • [Tech Stack](#-tech-stack) • [Installation](#-installation-guide) • [Architecture](#-system-architecture) • [Database](#-database) • [Workflow](#-booking-workflow)

</div>

---

## Overview

This project is a movie seat booking system designed to help users:

- browse available movies
- choose theater, date, and time
- select seats interactively
- reserve tickets
- view booking details
- manage reservations through admin dashboard

It follows a lightweight PHP-based architecture and includes an admin panel for managing movies, shows, and theater settings.

---

## Features

### User Features
- ✅ Browse movies and show listings
- ✅ Choose theater and seat layout
- ✅ Reserve tickets with contact details
- ✅ Booking confirmation flow
- ✅ Login-based access for users
- ✅ Booking history and simple operation flow

### Admin Features
- ✅ Manage movies
- ✅ Manage theater settings
- ✅ Manage seat groups and availability
- ✅ View and manage bookings
- ✅ User and admin authentication
- ✅ Dashboard-based operations

---

## Tech Stack

### Backend
- PHP
- MySQL
- PDO / MySQLi style database access
- Session-based authentication

### Frontend
- HTML5
- CSS3
- JavaScript
- jQuery
- Bootstrap 4

### Tools
- Apache / XAMPP / WAMP
- MySQL database
- Browser-based UI

---

## Language Composition

```text
JavaScript  ████████████████████████████  63%
CSS         ██████████████████████       31%
PHP         █████                        5%
HTML        ██                           1%
Hack        ▌                            0.2%
```

---

## System Architecture

```text
┌──────────────────────────────────────────────────┐
│                  User Interface                  │
│  Home | Movies | Reservation | Admin Panel      │
└──────────────────────┬───────────────────────────┘
                       │
┌──────────────────────▼───────────────────────────┐
│              PHP Application Layer               │
│  - index.php                                     │
│  - reserve.php                                    │
│  - movies.php                                     │
│  - admin/                                        │
│  - login/logout/session handling                 │
└──────────────────────┬───────────────────────────┘
                       │
┌──────────────────────▼───────────────────────────┐
│            Database Layer (MySQL)                 │
│  - movies                                         │
│  - theater                                        │
│  - theater_settings                               │
│  - users                                          │
│  - books                                          │
│  - client                                         │
└──────────────────────────────────────────────────┘
```

---

## Requirements

### Software Requirements
- PHP 7.4+
- MySQL 5.7+
- Apache / Nginx / XAMPP
- PDO/MySQL extension enabled
- Browser with JavaScript enabled

---

## Installation Guide

### 1) Clone the repository

```bash
git clone https://github.com/nirav-gajera/movie-ticket-booking-php.git
cd movie-ticket-booking-php
```

### 2) Create and import the database

```bash
mysql -u root -p
CREATE DATABASE theater_db;
USE theater_db;
SOURCE database/theater_db.sql;
```

### 3) Configure database connection

Update the connection details in your PHP configuration file (commonly `admin/db_connect.php` or related config file):

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theater_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### 4) Run the application

Open in browser:

```bash
http://localhost/movie-ticket-booking-php/
```

---

## Project Structure

```text
movie-ticket-booking-php/
├── admin/                     # Admin dashboard and management pages
│   ├── ajax.php
│   ├── db_connect.php
│   ├── index.php
│   ├── login.php
│   ├── navbar.php
│   ├── topbar.php
│   └── ...
├── assets/                    # Images and UI assets
├── css/                       # Stylesheets
├── database/                  # SQL import file
│   └── theater_db.sql
├── js/                        # JavaScript files
├── index.php                  # Main user page
├── home.php                   # Home page content
├── movies.php                 # Movies listing page
├── reserve.php                # Seat reservation page
├── manage_reserve.php         # Booking logic / seat selection handling
├── login.php                  # User login
├── README.md
├── _index.html
├── ajax2.php
├── client_class.php
├── movie_carousel.php
└── ...
```

---

## Database

The project uses MySQL database `theater_db` with tables including:

- `movies`
- `theater`
- `theater_settings`
- `users`
- `books`
- `client`

Sample default login provided in the SQL file:

```sql
INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Nirav', 'admin', 'admin123');
```

This confirms the admin credentials for the application.

---

## Booking Workflow

```text
Login
  ↓
Browse Movies
  ↓
Choose Theater / Date / Time
  ↓
Select Seat(s)
  ↓
Enter Customer Details
  ↓
Confirm Reservation
  ↓
Booking Saved in Database
```

---

## Configuration

### Database Credentials

Use local MySQL credentials such as:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theater_db";
```

### Session Access

The app uses session-based access control on the main pages:

```php
session_start();
if(!isset($_SESSION['login_id']))
    header('location:login.php');
```

---

## Troubleshooting

### Database connection error
```text
Check MySQL service status, verify db name, and ensure credentials match.
```

### Login not working
```text
Verify the `users` table and ensure the username/password are correct.
```

### Booking page not loading
```text
Confirm the `theater` and `theater_settings` tables exist and contain valid data.
```

---

## Contributing

1. Fork this repository
2. Create a new feature branch
3. Commit your changes
4. Push to your branch
5. Open a pull request

---

## Contact

- GitHub: [@nirav-gajera](https://github.com/nirav-gajera)
- Instagram: [@mr._nirav_09](https://www.instagram.com/mr._nirav_09/)

---

## Summary

This repository is a simple but complete movie ticket reservation project created using PHP and MySQL, with a front-end built in HTML, CSS, JavaScript, and jQuery. It is suitable for learning, demonstration, and small-scale theatre booking workflows.

---

<div align="center">

### Made with ❤️ by Nirav Gajera

**If you find this project useful, please give it a ⭐ on GitHub!**

</div>
