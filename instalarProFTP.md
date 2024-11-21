# Informe de Instalación y Configuración de un Servidor FTP con ProFTPD

### Instalación del servidor FTP

1. Acceso a privilegios root:

- Uso sudo -i para elevar los privilegios a root.

2. Actualización de repositorios:

- Ejecuto apt-get update para actualizar la lista de paquetes.

3. Instalación de ProFTPD:

- Uso apt-get install proftpd. Durante la instalación, selecciono el modo independiente
  en el entorno gráfico.

4. Verificación de estado:

- Ejecuto service proftpd status y confirmo que el servidor está activo y funcionando.

5. Verificación de versión y usuarios:

- Uso proftpd -v para verificar la versión instalada.
- Compruebo los usuarios creados durante la instalación con cat /etc/passwd.

6. Archivos generados:

- Listo los archivos de configuración con ls /etc/proftpd, identificando el archivo principal: proftpd.conf.

### Configuración inicial del servidor

1. Copia de seguridad de proftpd.conf:

- Realizo una copia con cp /etc/proftpd/proftpd.conf /etc/proftpd/proftpd.conf.copia.

2. Optimización del archivo:

- Uso vi para eliminar comentarios (:g/^\s\*#/d) y líneas en blanco (:g/^$/d).
- Finalizo la edición básica con nano para asegurar que el archivo está listo para trabajar.

3. Usuarios restringidos:

- Reviso la lista de usuarios restringidos en cat /etc/ftpusers.

### Conexión al servidor FTP

1. Conexión desde terminal:

- Uso ftp ip_servidor.
- Inicio sesión con usuario y contraseña locales del sistema.
- Ejecuto comandos básicos como ls, pwd y quit.

2. Conexión desde navegador:

- Accedo mediante ftp://ip_servidor e ingreso credenciales.

3. Conexión con FileZilla:

- Instalo FileZilla (apt-get install filezilla).
- Inicio sesión con dirección del servidor, usuario, contraseña y puerto 21.

### Modificaciones en la configuración del servidor

1. Edición de parámetros importantes en proftpd.conf:

- Cambio ServerName a "Mi servidor FTP".
- Mantengo parámetros como DeferWelcome off, Port 21, y TimeoutIdle 1200.
- Configuro Umask 022 022 y verifico los archivos de registro:
  - /var/log/proftpd/xferlog para conexiones.
  - /var/log/proftpd/proftpd.log para respuestas del servidor.

2. Mensajes personalizados:

- Añadí las directivas:

```bash
AccessGrantMSG "Bienvenido al servidor FTP de mi_nombre"
AccessDenyMSG "Error de entrada a mi servidor FTP"
```

- Refresco la configuración con service proftpd reload.

3. Restricción de acceso a /home del usuario:

- Modifico DefaultRoot ~ en el archivo y confirmo la restricción desde el cliente.

### Configuración de permisos (Umask)

1. Cálculo de permisos:

- Verifico Umask 022 022, que asigna permisos 644 a archivos (666-022) y 755 a directorios (777-022).

2. Prueba práctica:

- Desde el cliente:
  - Creo una carpeta (mkdir carpeta_prueba) y verifico permisos drwxr-xr-x.
  - Subo un archivo (put apuntes.txt) y verifico permisos -rw-r--r--.

3. Modificación para permisos específicos:

- Configuro Umask 077 077 para que los archivos tengan permisos -rw------- y los directorios drwx------.

### Creación de usuarios virtuales

1. Configuración en proftpd.conf:

Agrego:

```bash
Include /etc/proftpd/modules.conf
RequireValidShell off
AuthUserFile /etc/proftpd/ftpd.passwd
```

2. Preparación del entorno:

- Creo una carpeta home para el usuario en /var/ftp/carpetauser1JSR.

3. Creación del usuario virtual:

- Uso ftpasswd para crear user1JSR con UID y GID 3000, y asigno una contraseña.
- Desbloqueo al usuario (ftpasswd --passwd --name=user1JSR --unlock).

4. Prueba de conexión:

- Accedo con FileZilla usando el nuevo usuario y confirmo la conexión al servidor.

## Conclusión

El servidor FTP con ProFTPD se instaló y configuró correctamente. Se realizaron pruebas de conectividad y transferencia desde diversos clientes. Además, se personalizaron los permisos y mensajes, y se crearon usuarios virtuales para mayor flexibilidad en el acceso.
