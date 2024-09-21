# Laravel API Project

## Description
This project is a Laravel-based API for managing users, projects, and timesheets. It allows users to perform CRUD operations and track timesheet entries linked to specific projects.

## Requirements
- **PHP Version:** 8.2
- **Laravel Version:** 11
- **Database:** MySQL

## Installation

1. **Clone the Repository:**
   git clone https://github.com/saifullahsahibole/laravel-api.git

2. **Navigate to the Project Directory:**
   cd laravel-api

3. **Install Dependencies:**
   composer install

4. **Set Up Environment File:**
   - Copy the `.env.example` to `.env`:
   cp .env.example .env
   - Update the `.env` file with your database credentials.

5. **Generate Application Key:**
   php artisan key:generate

6. **Run Migrations (if applicable):**
   php artisan migrate

## API Endpoints

### Authentication
- **Register User:** POST /api/register
- **Login User:** POST /api/login
- **Logout User:** POST /api/logout

### User Endpoints
- **Get All Users:** GET /api/users
- **Get User by ID:** GET /api/users/{id}
- **Create User:** POST /api/users
- **Update User:** POST /api/users/{id}
- **Delete User:** DELETE /api/users/{id}

### Project Endpoints
- **Get All Projects:** GET /api/projects
- **Get Project by ID:** GET /api/projects/{id}
- **Create Project:** POST /api/projects
- **Update Project:** POST /api/projects/{id}
- **Delete Project:** DELETE /api/projects/{id}

### Timesheet Endpoints
- **Get All Timesheets:** GET /api/timesheets
- **Get Timesheet by ID:** GET /api/timesheets/{id}
- **Create Timesheet:** POST /api/timesheets
- **Update Timesheet:** POST /api/timesheets/{id}
- **Delete Timesheet:** DELETE /api/timesheets/{id}

## Database
- The database structure is included in the `database/laravel_project.sql`.

## Instructions to Access the API
1. **Run the Project:**
   php artisan serve

2. **Access the API:**
   Use Postman or any API client to interact with the API endpoints listed above.

3. **Authentication:**
   - Register a new user via the `/api/register` endpoint.
   - Log in to receive a token for authentication.
   - Use this token in the `Authorization` header for subsequent requests:
   Authorization: Bearer {your_token}

## Example Credentials
For testing, you can register a user with the following example credentials:
- **Username:** john.doe@example.com
- **Password:** password

## License
This project is open-source and available under the [MIT License](LICENSE).
