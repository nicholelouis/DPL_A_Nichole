# Configuración de usuarios, logs y SSL en vsFTP

### Configuración de usuarios

- Creación de usuarios
  Primero, creé los usuarios necesarios utilizando el siguiente comando para cada uno:

```bash
sudo adduser usuario1
sudo adduser usuario2
sudo adduser usuario3
sudo adduser usuario4
sudo adduser usuario5
sudo adduser usuario6
```

- Configuración de usuarios enjaulados
  Para asegurar que algunos usuarios estuvieran enjaulados en su directorio de trabajo, edité el archivo de configuración de vsFTP:

```bash
sudo nano /etc/vsftpd.conf
```

Habilité las siguientes directivas:

```bash
chroot_local_user=YES
chroot_list_enable=YES
chroot_list_file=/etc/vsftpd.chroot_list
```

Luego, creé el archivo que especifica los usuarios no enjaulados:

```bash
sudo nano /etc/vsftpd.chroot_list
```

Y añadí lo siguiente al archivo:

```bash
usuario2
usuario5
```

De esta forma, los usuarios usuario1 y usuario6 quedaron enjaulados, mientras que usuario2 y usuario5 no lo están.

- Denegar el acceso a ciertos usuarios

Para impedir el acceso al servidor a usuario3 y usuario4, edité el archivo correspondiente:

```bash
sudo nano /etc/ftpusers
```

Añadí las siguientes líneas al archivo:

```bash
usuario3
usuario4
```

### Configuración de logs

Para habilitar los logs, volví a editar el archivo de configuración de vsFTP:

```bash
sudo nano /etc/vsftpd.conf
```

Y descomenté o añadí las siguientes líneas:

```bash
xferlog_enable=YES
log_ftp_protocol=YES
xferlog_file=/var/log/vsftpd.log
```

Esto asegura que las transferencias y eventos del servidor se registren correctamente.

### Configuración de tiempo de inactividad

Ajusté el tiempo de inactividad para que las conexiones se cerraran después de 5 minutos sin actividad. Para ello, modifiqué el archivo de configuración:

```bash
sudo nano /etc/vsftpd.conf
```

Y añadí la directiva:

```bash
idle_session_timeout=300
```

### Configuración de SSL

- Instalación de OpenSSL
  Primero, instalé OpenSSL para habilitar la seguridad en las conexiones:

```bash
sudo apt-get install openssl
```

- Creación del certificado
  Creé un certificado SSL con el siguiente comando:

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/vsftpd.key -out /etc/ssl/certs/vsftpd.pem
```

Rellené los datos solicitados, como país, ciudad y nombre de la organización.

- Configuración del servidor para SSL
  Edité nuevamente el archivo de configuración de vsFTP:

```bash
sudo nano /etc/vsftpd.conf
```

Y añadí las siguientes directivas:

```bash
ssl_enable=YES
allow_anon_ssl=NO
force_local_data_ssl=YES
force_local_logins_ssl=YES
rsa_cert_file=/etc/ssl/certs/vsftpd.pem
rsa_private_key_file=/etc/ssl/private/vsftpd.key
ssl_tlsv1=YES
ssl_tlsv2=NO
ssl_tlsv3=YES
```

### Reinicio del servicio

Reinicié el servicio para aplicar todos los cambios realizados:

```bash
sudo service vsftpd restart
```

### Verificación de logs

Finalmente, verifiqué que los logs estuvieran registrándose correctamente:

```bash
tail -n 20 /var/log/vsftpd.log
```

## Conclusión

Este proceso me permitió configurar usuarios con diferentes niveles de acceso, habilitar logs para monitorear las actividades, establecer tiempos de inactividad, y garantizar la seguridad de las conexiones mediante SSL.
