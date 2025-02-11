# Instalación de Certificado Let's Encrypt con Certbot en Nginx con Hosts Virtuales

## Paso 1: Instalación de Certbot y el Plugin para Nginx

Lo primero que hago es actualizar el sistema e instalar Certbot junto con el plugin de Nginx. En mi terminal ejecuto:

```bash
sudo apt update && sudo apt upgrade -y
sudo apt install certbot python3-certbot-nginx -y
```

Esto instala Certbot y el complemento necesario para automatizar la configuración del certificado SSL en Nginx.

---

## Paso 2: Configuración de los Hosts Virtuales en Nginx

Antes de generar el certificado, me aseguro de que mi servidor tenga configurados los hosts virtuales correctamente. Accedo a la configuración con:

```bash
sudo nano /etc/nginx/sites-available/midominio.com
```

El archivo de configuración de mi host virtual se ve algo así:

```nginx
server {
    listen 80;
    server_name midominio.com www.midominio.com;
    root /var/www/midominio.com/html;
    index index.html index.htm index.php;

    location / {
        try_files $uri $uri/ =404;
    }
}
```

Guardo los cambios y verifico que no haya errores con:

```bash
sudo nginx -t
```

Si todo está correcto, recargo la configuración:

```bash
sudo systemctl reload nginx
```

---

## Paso 3: Generación y Configuración del Certificado SSL

Ejecutando el siguiente comando, obtengo e instalo un certificado SSL para mi dominio:

```bash
sudo certbot --nginx -d midominio.com -d www.midominio.com
```

Certbot me hará algunas preguntas, como el correo electrónico para notificaciones y si quiero redirigir todo el tráfico HTTP a HTTPS. Selecciono la opción de redirección automática.

Una vez que Certbot termina, reviso la configuración generada en mi host virtual:

```bash
sudo nano /etc/nginx/sites-available/midominio.com
```

Ahora el bloque del servidor se verá algo así:

```bash
server {
    listen 80;
    server_name midominio.com www.midominio.com;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name midominio.com www.midominio.com;

    ssl_certificate /etc/letsencrypt/live/midominio.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/midominio.com/privkey.pem;
    include /etc/letsencrypt/options-ssl-nginx.conf;
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;

    root /var/www/midominio.com/html;
    index index.html index.htm index.php;
    location / {
        try_files $uri $uri/ =404;
    }
}
```

Verifico nuevamente la configuración de Nginx:

```bash
sudo nginx -t
```

Si no hay errores, aplico los cambios:

```bash
sudo systemctl reload nginx
```

---

## Paso 4: Configurar la Renovación Automática del Certificado

Let's Encrypt emite certificados con una validez de 90 días, por lo que configuro la renovación automática con un cron job. Para comprobar que la renovación funciona correctamente, ejecuto:

```bash
sudo certbot renew --dry-run
```

Si todo está bien, agrego una tarea en cron para que la renovación se ejecute automáticamente. Abro el crontab:

```bash
sudo crontab -e
```

Añado la siguiente línea al final del archivo:

```bash
0 3 * * * certbot renew --quiet && systemctl reload nginx
```

Esto ejecutará la renovación cada día a las 3 AM.

---

## Paso 5: Verificación Final

Finalmente, abro mi navegador y accedo a `https://midominio.com` para verificar que el certificado SSL está funcionando correctamente. También puedo comprobarlo con:

```bash
sudo certbot certificates
```

Si veo la información del certificado sin problemas, la instalación ha sido exitosa.

