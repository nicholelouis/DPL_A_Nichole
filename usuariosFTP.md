# Informe de Configuración del Servidor FTP con Usuarios Específicos

En este documento se detalla la configuración y creación de usuarios específicos en un servidor

FTP utilizando vsftpd, cumpliendo con los siguientes requisitos:

- Enjaular a los usuarios 'usuario1' y 'usuario6'.
- Permitir que los usuarios 'usuario2' y 'usuario5' no estén enjaulados.
- Denegar el acceso a los usuarios 'usuario3' y 'usuario4'.
- Activar el registro de usuarios (log).
- Cerrar la conexión tras cinco minutos de inactividad.
- Cifrar las conexiones SSL.

1. Creación de Usuarios

Se han creado los usuarios especificados utilizando el comando `adduser` y se les asignaron contraseñas:

- `usuario1`
- `usuario2`
- `usuario3`
- `usuario4`
- `usuario5`
- `usuario6`

2. Configuración de Usuarios Enjaulados

Para enjaular a 'usuario1' y 'usuario6', se habilitaron las siguientes directivas en el archivo de configuración

```bash
`/etc/vsftpd.conf`:
- `chroot_local_user=YES`
- `chroot_list_enable=YES`
- `chroot_list_file=/etc/vsftpd.chroot_list`
```

En el archivo `/etc/vsftpd.chroot_list` se incluyeron los usuarios que no estarán enjaulados:
'usuario2' y 'usuario5'.

- Se verificó que 'allow_writeable_chroot=YES' esté habilitado para permitir escritura en directorios enjaulados.

3. Denegación de Acceso

Para denegar el acceso a 'usuario3' y 'usuario4', se agregó la configuración siguiente al archivo

```bash
`/etc/vsftpd.user_list`:
```

- Se añadieron los usuarios 'usuario3' y 'usuario4' al archivo y se verificó que `userlist_deny=NO`
  estuviera configurado en `/etc/vsftpd.conf`.
  Esto asegura que solo los usuarios listados en `vsftpd.user_list` tengan acceso al servidor.

4. Activación del Log de Usuarios

Para activar el registro de usuarios conectados, se habilitó la directiva:

```bash
- `xferlog_enable=YES`
```

Los registros se almacenan en `/var/log/vsftpd.log` para conexiones y actividades en el servidor.

5. Tiempo de Inactividad

Se configuró el cierre automático de sesiones tras cinco minutos de inactividad mediante la
directiva:

```bash
- `idle_session_timeout=300`
```

Esto asegura que las sesiones inactivas no permanezcan abiertas por tiempo prolongado.

6. Configuración de Conexiones SSL

Se habilitaron conexiones cifradas SSL para garantizar la seguridad de las transferencias de datos.

Los pasos fueron:

1. Instalación de OpenSSL con `sudo apt-get install openssl`.
2. Generación de certificados:

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:1024 \
-keyout /etc/ssl/private/vsftpd.key \
-out /etc/ssl/certs/vsftpd.pem
```

3. Configuración en `/etc/vsftpd.conf`:

```bash
- `ssl_enable=YES`
- `rsa_cert_file=/etc/ssl/certs/vsftpd.pem`
- `rsa_private_key_file=/etc/ssl/private/vsftpd.key`
- `force_local_data_ssl=YES`
- `force_local_login_ssl=YES`
- `ssl_tlsv1=YES`
- `ssl_tlsv2=NO`
- `ssl_ciphers=HIGH`
```

Se verificó la conexión desde un cliente FTP compatible con SSL.

## Conclusión

El servidor FTP se configuró exitosamente cumpliendo con los requisitos especificados. Se validaron las configuraciones mediante pruebas de conexión y transferencias seguras, asegurando un entorno funcional y seguro.
