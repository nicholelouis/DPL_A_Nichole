## Migración de Infraestructura Dinámica desde XAMPP a un Servidor LAMP

Objetivo

Migrar toda la infraestructura dinámica implementada en XAMPP a un servidor LAMP recién instalado, asegurando el correcto funcionamiento de la página web y su base de datos.

Pasos Realizados
1. Preparativos previos

Revisión del entorno: Verificar que el servidor LAMP esté instalado correctamente. Esto incluye:
Apache: Configurado y en ejecución.
MySQL/MariaDB: Activo y accesible.
PHP: Instalado y compatible con la página web existente.
Práctica anterior: Confirmar que todo lo realizado en la práctica anterior (configuración básica de XAMPP) esté documentado y listo para replicarse en el entorno LAMP.

2. Exportación de la Base de Datos desde phpMyAdmin

Desde el servidor con XAMPP:
Acceder a phpMyAdmin.
Seleccionar la base de datos utilizada por la página web.

- Exportar la base de datos en formato SQL:
Elegir la opción Exportación rápida para una copia básica.
Descargar el archivo SQL generado.

3. Migración de Archivos al Servidor LAMP

Copiar los archivos del proyecto desde la carpeta de XAMPP (htdocs) a la carpeta de Apache en el servidor LAMP:

Ubicar los archivos del proyecto en XAMPP:
```bash
\xampp\htdocs\login.php
```
Transferir los archivos al servidor LAMP, ubicándolos en el directorio:
```bash
/var/www/html/
```

4. Importación de la Base de Datos en el Servidor LAMP

En el servidor LAMP:
Acceder al cliente de MySQL (o phpMyAdmin si está instalado).

Crear una base de datos con el mismo nombre que la exportada:
```bash
CREATE DATABASE users;
```

Importar el archivo SQL:
```bash
mysql -u root -p users /ruta/del/archivo/login.php
```

Comprobar que la base de datos ha sido importada correctamente revisando las tablas y datos.

5. Comprobación de la Configuración en localhost

Abrir un navegador y acceder a la página utilizando la dirección:

http://localhost/login.html

Realizar las siguientes verificaciones:
- Cargar correctamente las páginas web.
- Comprobar la conexión con la base de datos.
- Probar formularios, interacciones dinámicas y funcionalidades principales.
Resultados

Infraestructura migrada: Los archivos del proyecto y la base de datos fueron correctamente trasladados al servidor LAMP.

Verificación exitosa: La página es accesible desde localhost en el servidor LAMP, y todas las funcionalidades dinámicas funcionan como en el entorno XAMPP.

### Conclusión
La migración desde XAMPP a LAMP fue exitosa. El entorno dinámico se replicó sin errores y el servidor LAMP quedó configurado adecuadamente para albergar el proyecto.

