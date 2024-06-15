
# Admin Dashboard

An admin dashboard, that display data from excel file. admin can import and export the data using the excel file system.


## Screenshots

Login Form
![Login Form](https://github.com/MRgrav/nic_assignment_2024/assets/67511840/94e2f8ad-7da2-4af5-9de0-08d2598f24b7)


## Run Locally

Clone the project

```bash
  git clone https://github.com/MRgrav/nic_assignment_2024.git
```

Go to the project directory

```bash
  cd nic_assignment_2024
```

Install dependencies

```bash
  composer Install
```

Create .env file

```bash
  cp .env.example .env
```

Setup Database

```bash
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

Run migrations

```bash
  php artisan migrate
```

Start the server

```bash
  php artisan serve
```
## Tech Stack

**Client:** Laravel Blade Template, TailwindCSS

**Server:** Laravel 10, PostgreSQL, PHP

