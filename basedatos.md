# Creación de base de datos PHPMyAdmin

phpMyAdmin es una herramienta de administración web para gestionar bases de datos MySQL de forma gráfica. Para crear una base de datos en PHP podemos seguir estos pasos:

### 1. Acceder a phpMyAdmin
- Abrimos el navegador y nos dirígimos a la URL donde tenemos phpMyAdmin instalado. En nuestro caso en un entorno local por lo tanto la url seria:

```bash
http://localhost/phpmyadmin
```

### 2. Iniciar sesión
- Introducimos nuestro nombre de usuario y su contraseña.
  
### 3. Crear una nueva base de datos
- En la página principal de phpMyAdmin, hacemos click en la pestaña Bases de datos en la parte superior.
- Veremos un campo para crear una base de datos. Intoducimos el nombre de la nueva base de datos.

### 4. Seleccionar el cotejamiento 
- En el menú desplegable cotejamiento, podemos elegir el tipo de cotejamiento para nuestra base de datos, esto define el conjunto de caracteres y la clasificación. Para bases de datos en español, lo común es seleccionar `utf8_general_ci` o `utf8mb4_spanish_ci`.

### 5. Crear la base de datos
- Hacemos click en el botón crear. phpMyAdmin creará la base de datos y te nos llevará a una pantalla donde podemos comenzar a crear tablas dentro de ella.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd1.png?raw=true)

### 6. Crear una tabla
- Si deseamos agregar una tabla de inmediato, introducimos el nombre de la tabla y el número de columnas.
- Luego, definimos las columnas: nombre, tipo de datos (`INT`, `VARCHAR`, `DATE`), longitud y atributos adicionales como `PRIMARY KEY` o `AUTO_INCREMENT`.
- Finalmente, hacemos click en guardar para crear la tabla.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd2.png?raw=true)

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd3.png?raw=true)

### 7. Conectar con la base de datos
Para conectar con la base de datos y asi poder manipularla creamos un archivo, por ejemplo conexion.php, y escribimos lo siguiente. No te olvides de colocar los archivos PHP en la carpeta htdocs de XAMPP.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd4.png?raw=true)

### 8. Manipular la base de datos

Una vez conecatados con la base de datos podemos manipularla a nuestra necesidad usando consultas de mysql de la siguiente manera:

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd5.png?raw=true)
![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/bbdd6.png?raw=true)
