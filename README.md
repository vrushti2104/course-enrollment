
# Course Enrollment Platform

This repository contains a simple **Course Enrollment Platform** built using **Laravel 9**. The platform allows instructors to create and manage courses, and students to enroll in and track their progress through courses. It is a basic, scalable system designed for educational platforms that require course management, lesson creation, and progress tracking.

## Features

### 1. **User Roles and Authentication**
- **User Roles:** There are two user roles—**Instructor** and **Student**.
- **Authentication:** Users can register, log in, and log out securely.
- **Profile:** Students can view the courses they have enrolled in on their profile page.

### 2. **Courses**
- **Create Courses:** Instructors can create and manage courses, including adding cover images, titles, and descriptions.
- **Course Structure:** Each course contains multiple lessons or modules, each with its own title, description, and content.

### 3. **Course Enrollment**
- **Browse Courses:** Students can browse all available courses.
- **Enroll:** Students can enroll in any course and access its lessons/modules.
- **Enrollment Status:** Students can see the status of their enrollment in various courses.

### 4. **Course Progress Tracking**
- **Lesson Progress:** Students can view a list of completed and remaining lessons/modules for each course they are enrolled in.
- **Dashboard:** Students can track their overall progress within a course on their personal dashboard.

### 5. **Instructor Management**
- **Course Management:** Instructors can create, update, and delete courses.
- **Lesson Management:** Instructors can manage the lessons/modules within a course, adding and editing lessons as necessary.

## Technologies Used
- **Laravel 9**: Backend framework for handling course, lesson, and user management.
- **Blade Templates**: For building the frontend views.
- **MySQL**: Database management for storing users, courses, and lessons.
- **Bootstrap 5**: Used for styling and responsive design.
- **Authentication**: Custom-built registration and login system (without using Breeze or Jetstream).

## Installation

To run the platform locally, follow these steps:

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/course-enrollment-platform.git
    cd course-enrollment-platform
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3. **Setup the environment file:**
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your database credentials and application settings.

4. **Generate the application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run database migrations:**
    ```bash
    php artisan migrate
    ```

6. **Run the application:**
    ```bash
    php artisan serve
    ```

7. **Access the platform** at `http://localhost:8000`.

## Contributing

Feel free to fork this repository and submit pull requests to improve functionality, fix bugs, or add new features. Contributions are welcome!

---
