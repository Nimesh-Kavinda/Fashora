 # Fashora 

## Overview

**Fashora** is a modern fashion e-commerce web application built with Laravel. Designed to deliver a smooth shopping experience, Fashora enables customers to browse stylish products, manage their accounts, and complete secure purchases. With an intuitive admin panel, store owners can easily manage inventory, orders, and users. Its responsive layout ensures an elegant look across all devices.

![Full Page Screenshot](./public/images/fashor-full-page.png) <!-- Replace with the actual path to your application's screenshot -->

## Features

- **Product Management**: Admins can add, update, and remove fashion items from the catalog.
- **User & Role Management**: Includes customers and admins with role-based access control.
- **Responsive Design**: Seamlessly adapts to mobile, tablet, and desktop devices.
- **Secure Authentication**: User-friendly login and registration system with role-specific access.
- **Shopping Cart & Checkout**: Fully functional cart system with a smooth checkout experience.
- **Order Management**: Admins can track and manage customer orders efficiently.
- **Laravel-Based Architecture**: Clean, scalable, and secure codebase using the Laravel framework.

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/your-username/fashora.git
    ```

2. **Install Dependencies**:
    ```bash
    cd fashora
    composer install
    npm install && npm run dev
    ```

3. **Set Up Environment File**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure Database** in `.env` and then run:
    ```bash
    php artisan migrate --seed
    ```

5. **Serve the Application**:
    ```bash
    php artisan serve
    ```

## License

This project is open-source and available under the [MIT license](LICENSE).
