# Alfasoft Test

This repository contains the codebase for the Alfasoft test project.

## Requirements

- PHP >= 8.1
- Composer
- Laravel Framework

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd alfasoft-test
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Run Seeders:
   ```bash
   composer seed
   ```

## Usage

Start the development server:
```bash
php artisan serve
```

Access the application at [http://localhost:8000](http://localhost:8000).

## Testing

Run the following command to execute tests and code quality checks:
```bash
composer test
```

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
