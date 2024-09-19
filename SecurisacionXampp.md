# Securización Xampp

![img](https://simplecodetips.wordpress.com/wp-content/uploads/2018/06/xampp-logo-banner.png?w=1400)
El presente informe tiene como objetivo proporcionar una serie de recomendaciones y buenas prácticas para securizar XAMPP, un paquete de software que facilita el desarrollo local. Aunque XAMPP es ampliamente utilizado por desarrolladores debido a su simplicidad, su configuración predeterminada no está optimizada lo que puede exponer el sistema a vulnerabilidades. Abordar las medidas necesarias para fortalecer la seguridad de XAMPP, minimizando riesgos y garantizando una infraestructura más protegida frente a posibles ataques.

### 1.- Inicializar XAMPP
Para comenzar, debemos iniciar XAMPP mediante el siguiente comando:

```bash
sudo /opt/lampp/lampp start
```

Este comando arrancará los servicios esenciales, incluyendo Apache y MySQL, que vienen con XAMPP. Una vez que los servicios estén activos, podemos proceder a realizar las configuraciones necesarias para asegurar el entorno.

### 2.- Acceso a phpMyAdmin
Una vez que XAMPP está en funcionamiento, accedemos a la interfaz de administración phpMyAdmin. Para hacerlo, abrimos el navegador web y colocamos la siguiente URL:

```bash
http://localhost/phpmyadmin
```
![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-37.png?raw=true)

Desde phpMyAdmin, podemos administrar bases de datos MySQL y realizar configuraciones adicionales para aumentar la seguridad.

### 3.- Cambiar la contraseña del usuario root
Es fundamental cambiar la contraseña predeterminada del usuario root para evitar accesos no autorizados.

Dentro de phpMyAdmin, seleccionamos la pestaña Cuentas de usuario.
Localizamos al usuario root y hacemos clic en editar privilegios.
Cambiamos la contraseña del usuario root, introduciendo una nueva contraseña segura.

Al intentar realizar este cambio, es posible que se genere un error debido a la configuración de MySQL.

### 4.- Configurar MySQL para aceptar el cambio de contraseña
Para aplicar correctamente el cambio de contraseña, primero debemos detener el servicio de MySQL y modificar su configuración:

Detenemos el servicio de MySQL con el siguiente comando:

```bash
sudo /opt/lampp/lampp stopmysql
```
```bash
cd /opt/lampp
ls
sudo nano config.inc.php
```
Colocamos en este parametro la misma contraseña que en el servidor, guardamos y salimos.

![img](https://github.com/DavidRiccio/DPL_David/raw/main/XAAMP/securizar/img/captura14.png)

## Crear usuario

1. Abrir phpMyAdmin

Abre el navegador y dirígete a: 

```bash
http://localhost/phpmyadmin.
```

Esto te llevará a la interfaz gráfica de MySQL en XAMPP.

2. Acceder a la pestaña "Cuentas de usuario"

Una vez dentro de phpMyAdmin, selecciona la pestaña cuentas de usuario en la parte superior de la página.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-39.png?raw=true)

3. Crear un nuevo usuario

En la sección añadir usuario, haz clic en el enlace añadir cuenta de usuario.

4. Completar la información del nuevo usuario

A continuación, abre un formulario donde hay que proporcionar la siguiente información:

- Nombre de usuario: Introduce el nombre del nuevo usuario.

- Nombre de host: Selecciona la opción local si el usuario solo va a acceder desde el mismo servidor. Esto configurará el host como localhost. Si el usuario accederá remotamente, puedes especificar una IP o usar % para permitir el acceso desde cualquier lugar.

- Contraseña: Introduce y confirma.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-54.png?raw=true)

5. Asignar privilegios globales

En la sección rivilegios globales, seleccionamos los privilegios que queremos asignarle al nuevo usuario.

En nuestro caso:
![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-55.png?raw=true)

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-57.png?raw=true)

6. Crear el usuario

Una vez hayamos completado el formulario, hacemos click en continuar para crear el nuevo usuario con los privilegios asignados.

7. Verificar la creación del usuario

Después de crear el usuario, volverás a la lista de Cuentas de usuario, donde deberías ver al nuevo usuario que hemos creado. Desde esta lista, también puedes gestionar sus permisos o eliminarlos si es necesario.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/2024-09-18_14-58.png?raw=true)

