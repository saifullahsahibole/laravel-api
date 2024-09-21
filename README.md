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
   - This command will feed 1 dummy entry for each model

6. **Run Migrations along with the seeder:**
   php artisan migrate --seed

## API Endpoints

### Authentication
- **Register User:** `POST /api/register`
  - **Parameters:**
    - `first_name`: First name of the user (string)
    - `last_name`: Last name of the user (string)
    - `date_of_birth`: Date of birth (YYYY-MM-DD)
    - `gender`: Gender of the user (string)
    - `email`: User's email (string, unique)
    - `password`: Password (string)

- **Login User:** `POST /api/login`
  - **Parameters:**
    - `email`: User's email (string)
    - `password`: User's password (string)

- **Logout User:** `POST /api/logout`
  - No parameters required (token must be passed in headers)


### User Endpoints
- **Get All Users:** `GET /api/users`
  - **Optional Query Parameters for Filtering:**
    - `first_name`: First name (string)
    - `gender`: Gender (string)
    - `date_of_birth`: Date of birth (YYYY-MM-DD)

- **Get User by ID:** `GET /api/users/{id}`
  - **Parameters:**
    - `{id}`: ID of the user (integer)

- **Create User:** `POST /api/users`
  - **Parameters:**
    - `first_name`: First name of the user (string)
    - `last_name`: Last name of the user (string)
    - `date_of_birth`: Date of birth (YYYY-MM-DD)
    - `gender`: Gender of the user (string)
    - `email`: User's email (string, unique)
    - `password`: Password (string)

- **Update User:** `POST /api/users/{id}`
  - **Parameters:**
    - `{id}`: ID of the user (integer)
    - Fields that need to be updated (e.g., `first_name`, `last_name`, etc.)

- **Delete User:** `DELETE /api/users/{id}`
  - **Parameters:**
    - `{id}`: ID of the user (integer)


### Project Endpoints
- **Get All Projects:** `GET /api/projects`
  - **Optional Query Parameters for Filtering:**
    - `name`: Name of the project (string)
    - `department`: Department (string)
    - `status`: Status (e.g., "active", "completed") (string)
    - `start_date`: Start date (YYYY-MM-DD)
    - `end_date`: End date (YYYY-MM-DD)

- **Get Project by ID:** `GET /api/projects/{id}`
  - **Parameters:**
    - `{id}`: ID of the project (integer)

- **Create Project:** `POST /api/projects`
  - **Parameters:**
    - `name`: Name of the project (string)
    - `department`: Department (string)
    - `status`: Status (e.g., "active", "completed") (string)
    - `start_date`: Start date (YYYY-MM-DD)
    - `end_date`: End date (YYYY-MM-DD)

- **Update Project:** `POST /api/projects/{id}`
  - **Parameters:**
    - `{id}`: ID of the project (integer)
    - Fields that need to be updated (e.g., `name`, `department`, etc.)

- **Delete Project:** `DELETE /api/projects/{id}`
  - **Parameters:**
    - `{id}`: ID of the project (integer)


### Timesheet Endpoints
- **Get All Timesheets:** `GET /api/timesheets`
  - **Optional Query Parameters for Filtering:**
    - `user_id`: ID of the user (integer)
    - `project_id`: ID of the project (integer)
    - `task_name`: Name of the task (string)
    - `date`: Date of the task (YYYY-MM-DD)

- **Get Timesheet by ID:** `GET /api/timesheets/{id}`
  - **Parameters:**
    - `{id}`: ID of the timesheet (integer)

- **Create Timesheet:** `POST /api/timesheets`
  - **Parameters:**
    - `task_name`: Name of the task (string)
    - `date`: Date of the task (YYYY-MM-DD)
    - `hours`: Number of hours worked (integer)
    - `user_id`: ID of the user (integer)
    - `project_id`: ID of the project (integer)

- **Update Timesheet:** `POST /api/timesheets/{id}`
  - **Parameters:**
    - `{id}`: ID of the timesheet (integer)
    - Fields that need to be updated (e.g., `task_name`, `hours`, etc.)

- **Delete Timesheet:** `DELETE /api/timesheets/{id}`
  - **Parameters:**
    - `{id}`: ID of the timesheet (integer)


## Database
- The database structure is included in the `database/your_database_file.sql`.

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
For testing, you can login a user with the following seeded credentials:
- **email:** john.doe@example.com
- **password:** password

## License
This project is open-source and available under the [MIT License](LICENSE).
