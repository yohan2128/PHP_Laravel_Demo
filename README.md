
# TestLaravel CRUD Demo

This project is a personal learning playground for PHP, Laravel, Git, GitHub, and PostgreSQL. It demonstrates a simple CRUD (Create, Read, Update, Delete) application with user authentication and post management, using modern Laravel features and best practices.

## Features

- User registration and login (with validation and error handling)
- Create, edit, and delete posts
- Authentication using Laravel's built-in system
- Custom error messages for registration (e.g., user already exists)
- Responsive UI with Bootstrap and custom styles
- All code versioned with Git and published on GitHub
- Database setup for PostgreSQL (can be adapted for other DBs)

## Learning Goals

- Practice PHP and Laravel fundamentals
- Understand MVC architecture
- Use Eloquent ORM for database operations
- Manage migrations, seeders, and factories
- Handle form validation and display errors in Blade views
- Work with Git for version control and GitHub for remote hosting
- Connect Laravel to PostgreSQL

## Setup Instructions

1. Clone this repository:
	```bash
	git clone https://github.com/yohan2128/TestLaravel.git
	cd TestLaravel/testApp
	```
2. Install dependencies:
	```bash
	composer install
	npm install
	```
3. Configure your `.env` file for PostgreSQL:
	```ini
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=your_db_name
	DB_USERNAME=your_db_user
	DB_PASSWORD=your_db_password
	```
4. Run migrations and seeders:
	```bash
	php artisan migrate --seed
	```
5. Start the development server:
	```bash
	php artisan serve
	```

## Usage

- Visit `/CRUD` in your browser to access the app.
- Register a new user, log in, and create posts.
- Try registering with an existing username/email to see custom error messages.

## Notes

- This project is for learning purposes and may not follow all production best practices.
- Feel free to fork, experiment, and adapt for your own learning journey!

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
