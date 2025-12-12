# Student Leave Request Application

A web application built with Laravel for managing student leave requests. This application allows students to submit leave requests, and faculty or administrators to approve or reject them.

## Features

-   **User Authentication**: Secure login and registration for students, faculty, and administrators.
-   **Role-Based Access Control**: Different permissions for Admin, Faculty, and Student roles.
-   **Leave Request Management**: Create, view, update, and delete leave requests.
-   **Request Approval Workflow**: Admins and Faculty can approve or reject pending requests.
-   **User Management**: Admins can create and manage faculty accounts.
-   **Profile Management**: Users can update their profile information.

## User Roles

There are three user roles in this application:

-   **Admin**: Has full control over the application. Can manage users, and all leave requests.
-   **Faculty**: Can view and manage leave requests submitted by students.
-   **Student**: Can create and manage their own leave requests. (Students can register for an account).

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

-   PHP (>= 8.1)
-   Composer
-   Node.js & npm
-   A database server (e.g., MySQL, PostgreSQL)

## Installation and Setup

Follow these steps to get the application up and running on your local machine.

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/Pengajuan-Izin-Mahasiswa-App.git
    cd Pengajuan-Izin-Mahasiswa-App
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Set up your environment file:**
    
    Create a `.env` file by copying the `.env.example` file. If `.env.example` does not exist, create a new `.env` file.
    ```bash
    cp .env.example .env
    ```
    *Note: If `.env.example` does not exist, you can create a new `.env` file and fill it with the necessary configuration based on the `config/*.php` files.*

4.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure your database:**
    
    Open the `.env` file and update the database connection details:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```

7.  **Seed the database:**
    
    This will create the default admin and faculty users.
    ```bash
    php artisan db:seed
    ```

8.  **Start the development servers:**
    
    You need to run two commands in separate terminal windows.
    ```bash
    # Terminal 1: Start the PHP server
    php artisan serve
    
    # Terminal 2: Start the Vite development server for frontend assets
    npm run dev
    ```

    The application should now be accessible at `http://localhost:8000`.

## Usage

### Default Login Credentials

The database seeder creates the following users with a default password of `password`:

-   **Admin**:
    -   **Email**: `admin@gmail.com`
    -   **Password**: `password`
-   **Faculty**:
    -   **Email**: `fakultas@gmail.com`
    -   **Password**: `password`

### Student Registration

Students can register for a new account by navigating to the registration page and filling out the required information.

### Creating a Leave Request (as a Student)

1.  Log in with a student account.
2.  Navigate to the dashboard.
3.  Click on the "Create Leave Request" button.
4.  Fill out the form with the details of the leave and submit.
5.  You can view the status of your request on your dashboard.

<!-- ![Student Dashboard Screenshot](path/to/student_dashboard_screenshot.png) -->
*Placeholder for Student Dashboard Screenshot*

### Managing Leave Requests (as Admin/Faculty)

1.  Log in with an Admin or Faculty account.
2.  Navigate to the "Manage Leave Requests" section.
3.  Here you can view all pending requests.
4.  You can approve or reject requests. The student will be notified of the status change.

<!-- ![Admin Dashboard Screenshot](path/to/admin_dashboard_screenshot.png) -->
*Placeholder for Admin Dashboard Screenshot*

### Creating a new Faculty Member (as Admin)

1.  Log in as an Admin.
2.  Navigate to the "Create new Faculty Member" section.
3.  Fill in the faculty member's details and create the account.

---

This README provides a comprehensive guide for setting up and using the Student Leave Request Application.