# E-Commerce Project

This project is an e-commerce platform built using Laravel, Vue.js, TailwindCSS, Alpine.js, Stripe, and MailTrap.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- Install Composer
- Install PHP
- Install Node.js
- Install MySQL (XAMPP is recommended and used in this project)

## Installation

1. Clone the repository:
    ```bash
    git clone <repository-url>
    cd <repository-directory>
    ```

2. Install PHP dependencies:
    ```bash
    composer install
    ```

3. Install Node.js dependencies:
    ```bash
    npm install
    ```

4. Set up the database:
    - Create a MySQL database.
    - Update the `.env` file with your database credentials.

5. Migrate the database and seed the `AdminUser`:
    ```bash
    php artisan migrate --seed
    ```

## Running the Application

To run the application, open three terminals and execute the following commands:

1. In the first terminal, start the Laravel server:
    ```bash
    php artisan serve
    ```

2. In the second terminal, compile TailwindCSS:
    ```bash
    npm run dev
    ```

3. In the third terminal, navigate to the backend directory and start the Vue.js development server:
    ```bash
    cd backend
    npm run dev
    ```

## Stripe Integration

To set up Stripe for payment processing:

1. Download and install the Stripe CLI from Stripe's official website.

2. Run the Stripe webhook listener:
    ```bash
    stripe.exe listen --forward-to localhost:8000/webhook/stripe
    ```

3. Update the `.env` file with your Stripe test environment keys:
    ```env
    STRIPE_PUBLISHABLE_KEY=your_publishable_key
    STRIPE_SECRET_KEY=your_secret_key
    WEBHOOK_SECRET_KEY=your_webhook_secret_key
    ```

## Mail Setup

This project uses MailTrap for email testing. Update the `.env` file with your MailTrap credentials or any other mail service you prefer:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=your_email@example.com
MAIL_FROM_NAME="${APP_NAME}"
