# listado_escuelas

# Instalación de componentes necesarios para correr la aplicación

Debian 8( jessie ) o  9( stretch )

# Repositorio de postgresql

$ nano /etc/apt/sources.list.d/pgdg.list

deb http://apt.postgresql.org/pub/repos/apt/ VERSION_DEBIAN-pgdg main

CTRL o

ENTER

CTRL x

# Repositorio de PHP

$ sudo add-apt-repository -y ppa:ondrej/php

# Actualizar repositorios

$ sudo apt-get update

# PHP versión 7.2

$ sudo apt-get install -y php7.2 php7.2-fpm libapache2-mod-php7.2 php7.2-cli php7.2-curl php7.2-sqlite3 php7.2-gd php7.2-xml php7.2-mcrypt php7.2-mbstring php7.2-iconv php7.2-pgsql php7.2-soap

# Apache versión 2.4

$ sudo apt-get install apache2

# Postgresql versión 9.6 o más

$ sudo apt-get install postgresql postgresql-contrib

# Configurar postgresql y crear base de datos

$ su - postgres

$ psql

postgres=# alter role postgres with password 'CONTRASEÑA_BASE_QUE_QUIERAS';

postgres=# create database listado_escuelas;

postgres=# \q

$ exit

# Git (Úlitma versión)

$ sudo apt-get install git

# Composer (Última versión)

$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

$ php composer-setup.php --install-dir=/usr/local/bin --filename=composer

$ php -r "unlink('composer-setup.php');"

# Activar reescritura del módulo enmod

$ sudo a2enmod rewrite

$ sudo /etc/init.d/apache2 restart

#-----------------------------------------------------------------------------------------------------------#

# Instalación de la aplicación

$ sudo mkdir /var/www/html/apps

$ cd /var/www/html/apps

$ git clone https://github.com/luispinkfloyd/listado_escuelas.git

$ cd listados_escuelas

$ chmod -R 755 ./

$ chmod -R 777 ./public/

$ chmod -R 777 ./storage/

$ composer install

$ cp .env.example .env

$ nano .env 

DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT=5432

DB_DATABASE=listado_escuelas

DB_USERNAME=postgres

DB_PASSWORD=CONTRASEÑA_BASE


CTRL o

ENTER

CTRL x

$ php artisan key:generate

$ php artisan migrate --seed

$ sudo ln -s /var/www/html/apps/listado_escuelas/listado_escuelas.conf /etc/apache2/sites-enabled/

$ sudo /etc/init.d/apache2 restart

Registrarse e iniciar










