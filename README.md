# Library Management System

### Unix / Linux / Mac Setup

*NOTE:* PHP 5.6 and mcrypt extension are required for this project:

* `apt-get update`

* `apt-get install php5.6 php5.6-mcrypt`

* `git clone https://github.com/AnandAron/library-management-system`

* `cd library-management-system`

* `[sudo] chmod -R 755 app/storage`

* `composer install`

 * Edit [mysql.config.php.sample](app/config/mysql.config.php.sample) according to your MySQL configurations and save it in the same directory as ```mysql.config.php```

* `php artisan migrate`

* `php artisan serve`

### Windows Setup

*Some notes on Windows setup:*

*Obtaining the `mcrypt` extension for PHP 7+ is not trivial and involves compiling your own PHP build.
If your PHP version does not support `mcrypt` (i.e. if you have PHP 7+), then the easiest way to run Laravel 4.2 applications is to [download a compatible version of XAMPP](https://www.apachefriends.org/xampp-files/5.6.33/xampp-win32-5.6.33-0-VC11-installer.exe) and make sure the app is run with it.*

With the above notes in mind, Windows setup is not too tricky:

* Open git shell;

* `cd C:/path/to/xampp/htdocs`;

* `git clone https://github.com/AnandAron/library-management-system`;

* `cd library-management-system`;

* `composer update`;

* **NOTE:** If your PHP version is not compatible with `mcrypt` you will receive an error here. Do not worry, simply perform these additional two steps:
 * `C:/path/to/xampp5.6.33/php/php.exe artisan clear-compiled`
 * `C:/path/to/xampp5.6.33/php/php.exe artisan cache:clear`

* Create a table for the app via phpmyadmin (or however you prefer);

* Edit `app/config/mysql.config.php` according to your MySQL configurations and save it in the same directory as `mysql.config.php`;

* `php artisan migrate`

 **OR IF YOUR PHP IS NOT `mcrypt` COMPATIBLE:**

 `C:/path/to/xampp5.6.33/php/php.exe artisan migrate`

* `php artisan serve`

 **OR IF YOUR PHP IS NOT `mcrypt` COMPATIBLE:**

 `C:/path/to/xampp5.6.33/php/php.exe artisan serve`


