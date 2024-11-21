# Informe de Instalación y Configuración de un Servidor FTP con vsftpd

## Instalación de vsftpd

1. Instalación del paquete:

- Ejecuto sudo apt-get install vsftpd para instalar el servidor FTP.

2. Edición del archivo de configuración:

- Abro el archivo principal con sudo gedit /etc/vsftpd.conf.

3. Habilitación de usuario anónimo:

- Descomento las directivas:

```bash
anonymous_enable=YES
local_enable=YES
anon_root=/ftp
```

## Configuración para el usuario anónimo

1. Creación del usuario anónimo:

- Creo el usuario whoever con sudo adduser whoever y asigno una contraseña.

2. Preparación de la carpeta /ftp:

- Creo la carpeta /ftp con sudo mkdir /ftp.
- Asigno como propietario al usuario whoever con sudo chown whoever.whoever -R /ftp.

3. Reinicio del servicio:

- Reinicio el servicio con sudo service vsftpd restart.

4. Conexión desde FileZilla:

- Configuro un nuevo sitio:
  - Protocolo: FTP.
  - Cifrado: Use explicit FTP over TSL if available.
  - Modo de acceso: Anónimo.
- Inicio sesión exitosamente como usuario anónimo.

## Gestión de permisos

1. Problema inicial de permisos:

- Intento crear un archivo anonimo.txt en /ftp:
  - Se deniega la escritura debido a permisos insuficientes.

2. Modificación de permisos:

- Asigno permisos 777 a /ftp (sudo chmod 777 /ftp).
- Creo el archivo exitosamente, pero se detecta un error 500 al intentar conectarme nuevamente.
- Cambio los permisos a 555 con sudo chmod 555 /ftp, resolviendo el error.

3. Habilitación de subida de archivos:

- Creo la carpeta uploads dentro de /ftp (sudo mkdir /ftp/uploads).
- Asigno permisos 777 a la carpeta uploads y la propiedad al usuario whoever (sudo chown whoever.whoever -R /ftp).

4. Habilitación de directivas:

- En vsftpd.conf, descomento:

```bash
write_enable=YES
anon_upload_enable=YES
```

- Reinicio el servicio con sudo service vsftpd restart.

5. Prueba de subida:

- Con FileZilla, verifico que puedo subir archivos a la carpeta uploads.

## Configuración de usuarios enjaulados

1. Creación de usuarios:

- Creo los usuarios enjaulado y noenjaulado.

2. Edición de configuración:

- En vsftpd.conf, habilito:

```bash
chroot_local_user=YES
chroot_list_enable=YES
chroot_list_file=/etc/vsftpd.chroot_list
allow_writeable_chroot=YES
```

- Creo el archivo /etc/vsftpd.chroot_list con noenjaulado como único usuario en la lista.

3. Verificación de acceso:

- El usuario enjaulado solo puede acceder a su directorio.
- El usuario noenjaulado puede navegar fuera de su carpeta.

## Configuración de conexión cifrada

1. Instalación de OpenSSL:

- Instalo OpenSSL con sudo apt-get install openssl.

2. Generación de certificado:

- Creo un certificado de seguridad con:

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:1024 \
-keyout /etc/ssl/private/vsftpd.key \
-out /etc/ssl/certs/vsftpd.pem
```

- Introduzco los datos necesarios para el certificado (país, ciudad, organización, etc.).

3. Edición de configuración:

- En vsftpd.conf, agrego las siguientes directivas:

```bash
ssl_enable=YES
rsa_cert_file=/etc/ssl/certs/vsftpd.pem
rsa_private_key_file=/etc/ssl/private/vsftpd.key
force_local_data_ssl=YES
force_local_login_ssl=YES
ssl_tlsv1=YES
ssl_tlsv2=NO
ssl_ciphers=HIGH
```

4. Prueba de conexión cifrada:

- Desde FileZilla, intento conectar con el servidor FTP.
- Verifico que aparece el certificado y la conexión es segura.

## Conclusión

El servidor FTP con vsftpd quedó instalado y configurado exitosamente. Se habilitaron usuarios anónimos y enjaulados, así como la transferencia segura mediante SSL. Las pruebas realizadas en el cliente confirmaron la funcionalidad de las configuraciones realizadas.
