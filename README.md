# LocalPulse

## Projekt Beschreibung

Dieses Laravel-Projekt wurde entwickelt, um dem Einzelhandelskunden die Möglichkeit zu bieten, das Marketing in den Händen der Mitarbeitenden vor Ort zu platzieren.
Das System ermöglicht es den Filialen, schnell und effizient Botschaften in ein vorgegebenes Format einzupflegen.
Die erstellten Daten sollen anschließend für die Übertragung an das Digital Signage System bereitstehen.

## Technologie Stack

### Software

- Laravel 10
- Jetstream 4
- Inertia
- Precognition
- Vue.js 3
- Tailwind CSS 3
- Font Awesome 6

### Server

- PHP 8.2
- MySQL
- NGINX/Apache
- (Laravel Homestead - for local development)

## Requirements

- PHP: ^8.2
- MySQL: ^8.0.31
- Composer: ^2.5.8
- NPM: ^9.3.0

## Installation

Um die Erstkonfiguration durchzuführen, gehen Sie wie folgt vor:

```bash
# clone the repository using SSH
git clone git@github.com:st-kovalenko/local-pulse.git

# or clone the repository using HTTPS
git clone https://github.com/st-kovalenko/local-pulse.git

cd local-pulse

# install composer dependency (for local development without --no-dev)
composer install --no-dev

# create a environment file (rename or copy .env.example file to .env)
cp .env.example .env

# set your database credentials (all fields with "DB_" prefix) in your .env file
# Set your APP_ENV, APP_DEBUG and APP_URL in your .env file

# set the Application key
php artisan key:generate

# setup the database
php artisan migrate
php artisan storage:link

# run all seeders
php artisan db:seed

# or run seeders manually
php artisan db:seed --class=ShopSeeder

# install the project dependencies and run the build process
npm install && npm run build
```

Der Entwicklungsserver kann lokal mit folgendem Befehl gestartet werden: `php artisan serve`.
Das System sollte nun unter `http://localhost:8000` erreichbar sein.

Wenn Vagrant/Homestead verwendet wird,
kann die offizielle Laravel-Dokumentation ([Laravel Homestead Setup](https://laravel.com/docs/10.x/homestead#installation-and-setup)) befolgt werden.

## Ressourcen

- https://fontawesome.com
- https://tailwindcss.com
- https://flowbite.com
- https://jetstream.laravel.com
- https://laravel.com/docs/10.x
- https://inertiajs.com
