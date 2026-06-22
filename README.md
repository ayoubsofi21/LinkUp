# 🚀 LinkUp – Professional Networking Platform (LinkedIn Clone)

> LinkUp is a Laravel-based professional networking platform inspired by LinkedIn, designed to connect professionals and share career-related posts using a clean MVC architecture.

---

## 📌 Table of Contents

- About the Project
- Features
- Tech Stack
- Architecture
- Database Design
- Installation
- Usage
- Routes
- Roadmap
- Author

---

## 📖 About the Project

LinkUp is a simplified professional social network that allows users to create profiles, publish posts, and view a global feed.

The project focuses on:

- Laravel MVC architecture
- Eloquent relationships
- Clean database design
- Blade templating system

---

## ✨ Features

- 👤 User profiles (name, headline, company, image)
- 📝 Create and display posts
- 📰 Global feed (latest posts first)
- 🧑‍💼 Display post author details
- 🔗 One-to-many relationships (User → Posts)
- 🧱 Clean Laravel MVC structure

---

## 🛠️ Tech Stack

- Laravel (PHP Framework)
- MySQL
- Eloquent ORM
- Blade Templates
- HTML / CSS
- MVC Architecture

---

## 🏗️ Architecture

This project follows the MVC pattern:

- **Models** → User, Post (data + relationships)
- **Controllers** → PostController (logic handling)
- **Views** → Blade templates (UI)
- **Routes** → Web routes only (no logic inside)

### Relationships:

- User hasMany Posts
- Post belongsTo User

---

## 🗄️ Database Design

### 👤 Users Table

- id
- name
- email
- password
- headline
- company (nullable)
- image_url
- timestamps

### 📝 Posts Table

- id
- user_id (foreign key, cascade delete)
- content (text)
- timestamps

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/linkup.git
cd linkup
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
