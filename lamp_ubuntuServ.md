# Instalación de LAMP en Ubuntu Server

1. Actualización del repositorio y paquetes
Ejecutamos los siguientes comandos para actualizar los repositorios y paquetes:

```bash
sudo apt update
sudo apt upgrade
```

2. Instalación del servidor Apache
Instalamos el servidor web Apache:

```bash
sudo apt install apache2
```

Verificamos que el servicio está activo:

```bash
sudo systemctl status apache2
```

3. Instalación del servidor de base de datos MariaDB

3.1 Instalación de MariaDB

Ejecutamos el comando para instalar MariaDB:
```bash
sudo apt install mariadb-server mariadb-client
```

Verificamos el estado del servicio:
```bash
sudo systemctl status mariadb
```

Habilitamos que MariaDB se inicie automáticamente en el arranque:
```bash
sudo systemctl enable mariadb
```

3.2 Verificación de la versión de MariaDB

Comprobamos la versión de MariaDB instalada:
```bash
mysql --version
```

3.3 Configuración de seguridad de MariaDB

Ejecutamos el script de configuración de seguridad:
```bash
sudo mysql_secure_installation
```

3.4 Explicación sobre la autenticación unix_socket

Por defecto, el paquete MariaDB en Ubuntu utiliza unix_socket para autenticar los inicios de sesión de usuarios. Esto significa que el usuario autenticado en el sistema operativo puede acceder a MariaDB sin necesidad de proporcionar contraseña, siempre que tenga los permisos adecuados. Esto mejora la seguridad al limitar el acceso al sistema local.

3.5 Prueba de acceso a la base de datos

Accedemos a la base de datos con la nueva contraseña configurada:
```bash
mysql -u root -p
```

3.6 Creación de un usuario nuevo

Creamos un nuevo usuario developer con la contraseña 5t6y7u8i:

CREATE USER 'developer'@'localhost' IDENTIFIED BY '5t6y7u8i';
GRANT ALL PRIVILEGES ON *.* TO 'developer'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
Probamos el acceso con el nuevo usuario:
```bash
mysql -u developer -p
```

4. Instalación de la última versión de PHP
4.1 Instalación de PHP y módulos necesarios

Instalamos PHP 7.4 y los módulos comunes:
```bash
sudo apt install php7.4 libapache2-mod-php7.4 php7.4-mysql php-common php7.4-cli php7.4-common php7.4-json php7.4-opcache php7.4-readline
```

Activamos el módulo PHP para Apache:
```bash
sudo a2enmod php7.4
sudo systemctl restart apache2
```

Verificamos la versión de PHP instalada:
```bash
php --version
```

4.2 Creación de un archivo PHP para prueba

Creamos el archivo info.php en el directorio raíz de Apache:
```bash
sudo vim /var/www/html/info.php
```
Código dentro del archivo:

<?php phpinfo(); ?>
Abrimos el navegador y accedemos a http://129.0.0.1/info.php.


4.3 Configuración para ejecutar código PHP con PHP-FPM

Deshabilitamos el módulo Apache PHP 7.4:
```bash
sudo a2dismod php7.4
```
Instalamos PHP-FPM:
```bash
sudo apt install php7.4-fpm
```
Habilitamos los módulos y configuraciones necesarias:
```bash
sudo a2enmod proxy_fcgi setenvif
sudo a2enconf php7.4-fpm
sudo systemctl restart apache2
```
Actualizamos la página info.php en el navegador para verificar el cambio en la API del servidor de Apache 2.0 Handler a FPM/FastCGI.