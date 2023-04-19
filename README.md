Pyrol and HR System
This is a Pyrol and HR System built using Laravel and Bootstrap 5.

Getting Started
Prerequisites
PHP 7.4 or higher
Composer
Node.js and NPM
Installation
Clone the repository:
bash
Copy code
git clone https://github.com/yourusername/pyrol-hr-system.git
Install dependencies:
Copy code
composer install
npm install
Set up environment variables:
Create a copy of .env.example and rename it to .env. Modify the database credentials and any other relevant settings.

Generate application key:
vbnet
Copy code
php artisan key:generate
Run migrations and seeders:
css
Copy code
php artisan migrate --seed
Compile assets:
arduino
Copy code
npm run dev
Start the server:
Copy code
php artisan serve
Usage
Once the server is running, you can access the Pyrol and HR System at http://localhost:8000.

Contributing
If you find any issues with the Pyrol and HR System or would like to contribute to its development, please feel free to open an issue or submit a pull request.

License
This project is licensed under the MIT License. See the LICENSE file for more information.
