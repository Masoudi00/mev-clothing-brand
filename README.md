# Mev Clothing Brand E-Commerce

A modern e-commerce web application for the Mev clothing brand, built with Laravel and Vue.js. This project allows users to browse products, add them to a cart, place orders, and for admins to manage products and orders. It also features a downloadable PDF catalogue with promo codes.

---

## Features

- **Product Catalog:** Browse all products, filter by category, and view detailed product pages with images and size selection.
- **Shopping Cart:** Add products (with size), update quantities, and remove items from the cart.
- **Order Checkout:** Secure checkout form for user details and delivery address.
- **Admin Dashboard:**
  - Add, edit, and delete products (with images).
  - View and manage orders.
  - Generate order PDFs.
  - Send emails to users.
- **User Dashboard:**
  - Access a PDF catalogue of products on sale, including a promo code.
- **Authentication:** User and admin roles with protected routes.

---

## Screenshots

> _Add screenshots of your Home, Shop, Cart, Admin, and Catalogue pages here._

---

## Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or compatible database

### Installation
1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/mev-laravel.git
   cd mev-laravel
   ```
2. **Install PHP dependencies:**
   ```bash
   composer install
   ```
3. **Install JS dependencies:**
   ```bash
   npm install
   ```
4. **Copy and configure environment:**
   ```bash
   cp .env.example .env
   # Edit .env to set your database and mail settings
   ```
5. **Generate app key:**
   ```bash
   php artisan key:generate
   ```
6. **Run migrations:**
   ```bash
   php artisan migrate
   ```
7. **(Optional) Seed the database:**
   ```bash
   php artisan db:seed
   ```
8. **Build frontend assets:**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```
9. **Start the server:**
   ```bash
   php artisan serve
   ```

---

## Usage

- Visit `/` for the home page.
- `/Shop` to browse products.
- `/cart` to view your cart.
- `/AdminSpace` for admin dashboard (admin only).
- `/ClientSpace` for user dashboard and PDF catalogue.
- `/orders/store` to place an order (via cart checkout form).

---

## Technologies Used
- **Backend:** Laravel 10, Eloquent ORM
- **Frontend:** Blade, Bootstrap 5, Vue.js (via Vite)
- **PDF Generation:** barryvdh/laravel-dompdf
- **Authentication:** Laravel UI & Sanctum

---



> _Mev Clothing Brand - Mastering Excellence And Versatility!_

