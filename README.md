🚗 Car Rental System

This is a Car Rental Management System built with PHP & MySQL that allows customers to book cars online and admins to manage reservations, cars, brands, users, and more.

The project is divided into two main modules:

Client Module – where users can browse cars, make reservations, leave testimonials, and receive booking confirmations via email in PDF format.

Admin Module – where administrators can manage cars, brands, users, reservations, testimonials, pages, and more through a secured dashboard.

✨ Features
🔹 Client Side

User registration and login (with Gmail support).

Password recovery via email.

Browse available cars and check availability.

Reserve cars online.

Submit testimonials.

Receive booking confirmation in PDF format via Gmail after admin approval.

🔹 Admin Side

Secure login for admins.

Manage car brands (add, edit, delete).

Manage cars (post a car, edit details, delete).

Manage reservations (approve/reject).

Manage registered users and subscribers.

Manage testimonials and contact queries.

Manage CMS pages.

Dashboard with statistics (cars, brands, users, reservations, etc.).

🛠️ Technologies Used

Frontend: HTML5, CSS3, Bootstrap, JavaScript

Backend: PHP

Database: MySQL (phpMyAdmin)

UI Enhancements: SweetAlert, AOS (Animate on Scroll)

Email Service: PHPMailer

PDF Generation: TCPDF

📂 Project Structure
Car-Rental/
│── admin/              # Admin panel files
│── assets/             # CSS, JS, and images
│── database/           # Database connection and SQL schema
│── includes/           # Reusable PHP scripts
│── PHPMailer/          # Email service
│── TCPDF-main/         # PDF generation library
│── uploads/            # Uploaded files (car images, etc.)
│── car-listing.php     # Car listing page
│── cars-details.php    # Car details page
│── check_availability.php
│── contact-us.php
│── generate_pdf.php
│── index.php           # Homepage
│── login.php / logout.php
│── my-reservation.php
│── my-testimonials.php
│── page.php

⚙️ Requirements

PHP >= 7.4

MySQL >= 5.7

Apache/Nginx server (e.g., XAMPP, WAMP, or LAMP)

PHPMailer (included in project)

TCPDF (included in project)

🚀 Getting Started

Clone the repository

git clone https://github.com/Lahcen-Ouhassou/Car-Rental.git


Setup the database

Import the SQL file from /database/ into your MySQL server.

Update the database credentials in includes/config.php.

Run the project

Place the project folder inside your web server (htdocs for XAMPP).

Start Apache & MySQL.

Open in browser:

http://localhost/Car-Rental

🔑 Demo Credentials
Admin Login

Email: admin@gmail.com

Password: admin123

Client Login

Email: client@gmail.com

Password: client123

📸 Screenshots
🔹 Admin Dashboard

🔹 Car Listing

🔹 Reservation Confirmation

👨‍💻 Author

Developed by Lahcen Ouhassou
