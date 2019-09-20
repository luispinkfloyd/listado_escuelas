# listado_escuelas

# Instalación de componentes necesarios para correr la aplicación

Debian 8( jessie ) o  9( stretch )

# Repositorio de postgresql

$ nano /etc/apt/sources.list.d/pgdg.list

deb http://apt.postgresql.org/pub/repos/apt/ VERSION_DEBIAN-pgdg main

CTRL o

ENTER

CTRL x

$ wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -

# Repositorio de PHP

$ apt-get install apt-transport-https lsb-release ca-certificates

$ wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg

$ echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

# Actualizar repositorios

$ sudo apt-get update

# Apache versión 2.4

$ sudo apt-get install apache2

# PHP versión 7.2

$ sudo apt-get install -y php7.2 php7.2-fpm libapache2-mod-php7.2 php7.2-cli php7.2-curl php7.2-sqlite3 php7.2-gd php7.2-xml php7.2-mbstring php7.2-common php7.2-pgsql php7.2-soap php7.2-json php7.2-opcache php7.2-readline php7.2-mysql

# Postgresql versión 9.6 o más

$ sudo apt-get install postgresql postgresql-contrib

# Configurar postgresql y crear base de datos

$ su - postgres

$ psql

postgres=# alter role postgres with password 'CONTRASEÑA_BASE_QUE_QUIERAS';

postgres=# create database listado_escuelas;


postgres=# CREATE OR REPLACE FUNCTION f_limpiar_acentos(text) RETURNS text AS $BODY$ SELECT translate($1,'àáÁÀèéÉÈìíÌÍóòÓÒùúÙÚ','aaAAeeEEiiIIooOOuuUU'); $BODY$ LANGUAGE sql IMMUTABLE STRICT COST 100;

postgres=# ALTER FUNCTION f_limpiar_acentos(text) OWNER TO postgres;

postgres=# GRANT EXECUTE ON FUNCTION f_limpiar_acentos(text) TO public;

postgres=# GRANT EXECUTE ON FUNCTION f_limpiar_acentos(text) TO postgres;



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

$ cd listado_escuelas

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

Ingresar en http://DIRECCION_IP_SERVIDOR/listado_escuelas 

Registrarse e iniciar










