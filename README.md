# 🚗 Car Rental System

![PHP](https://img.shields.io/badge/PHP-7.4-blue) 
![MySQL](https://img.shields.io/badge/MySQL-5.7-orange) 
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple) 
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow) 
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📖 About the Project

**Car Rental System** is a complete web application built with **PHP & MySQL** that allows customers to browse and reserve cars online while administrators manage cars, brands, reservations, users, and more through a secured dashboard.  

The project is divided into two main modules:  

- **Client Module** – browse cars, make reservations, leave testimonials, receive PDF confirmation via email.  
- **Admin Module** – manage cars, brands, reservations, testimonials, users, CMS pages, and more.  

---

## ✨ Features

### 🔹 Client Side
- User registration & login (with Gmail support).  
- Password recovery via email.  
- Browse available cars and check availability.  
- Reserve cars online.  
- Submit testimonials.  
- Receive booking confirmation in **PDF format** via Gmail after admin approval.  

### 🔹 Admin Side
- Secure admin authentication.  
- Manage car brands (add, edit, delete).  
- Manage cars (post, edit, delete).  
- Manage reservations (approve/reject).  
- Manage registered users & subscribers.  
- Manage testimonials & contact queries.  
- Manage CMS pages.  
- Dashboard with quick statistics (cars, brands, users, reservations, etc.).  

---

## 🛠️ Technologies Used
- **Frontend:** HTML5, CSS3, Bootstrap, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL (phpMyAdmin)  
- **UI Enhancements:** SweetAlert, AOS (Animate on Scroll)  
- **Email Service:** PHPMailer  
- **PDF Generation:** TCPDF  

---

## 📂 Project Structure

Car-Rental/
│── admin/ # Admin panel files
│── assets/ # CSS, JS, and images
│── database/ # Database connection and SQL schema
│── includes/ # Reusable PHP scripts
│── PHPMailer/ # Email service
│── TCPDF-main/ # PDF generation library
│── uploads/ # Uploaded files (car images, etc.)
│── car-listing.php # Car listing page
│── cars-details.php # Car details page
│── check_availability.php
│── contact-us.php
│── generate_pdf.php
│── index.php # Homepage
│── login.php / logout.php
│── my-reservation.php
│── my-testimonials.php
│── page.php


## Getting Started

1. Clone the repository:
   ```bash
   git clone https://github.com/Lahcen-Ouhassou/Car-Rental.git
   
---

## ⚙️ Setup the Database

1. Import the SQL file from `/database/` into your MySQL server.  
2. Update the database credentials in `includes/config.php`.  

---

## 🚀 Run the Project

1. Place the project folder inside your web server (`htdocs` for XAMPP).  
2. Start **Apache & MySQL**.  
3. Open in browser:  http://localhost/Car-Rental



---

## 👨‍💻 Author

Developed by **[Lahcen Ouhassou](https://github.com/Lahcen-Ouhassou)**  

---

