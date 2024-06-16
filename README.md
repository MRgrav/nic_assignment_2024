
# Admin Dashboard

An admin dashboard, that display data from excel file. admin can import and export the data using the excel file system.


## Screenshots

Login Form
![Login Form](https://github.com/MRgrav/nic_assignment_2024/assets/67511840/94e2f8ad-7da2-4af5-9de0-08d2598f24b7)

Dashboard
![Screenshot_20240616_151839](https://github.com/MRgrav/nic_assignment_2024/assets/67511840/d3b32c25-89a2-4a59-abc9-88849bc8969c)

Schemes
![Screenshot_20240616_151858](https://github.com/MRgrav/nic_assignment_2024/assets/67511840/4e2cc499-12a6-4066-b8c9-8a024c2dc05a)



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

