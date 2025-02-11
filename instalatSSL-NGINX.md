# Guía para Instalar un Certificado SSL en Nginx

## Requisitos previos
Antes de comenzar, asegúrate de tener:

1. Un servidor con Nginx instalado.
2. Acceso al servidor con privilegios de administrador.
3. Un dominio apuntado a la dirección IP del servidor.
4. OpenSSL instalado en el servidor.

---

## Paso 1: Generar un certificado SSL autofirmado con OpenSSL
Si no tienes un certificado SSL de una autoridad certificadora (CA), puedes generar un certificado autofirmado usando OpenSSL. Este tipo de certificado es adecuado para pruebas o entornos internos.

### Crear un par de claves y un certificado autofirmado
Ejecuta el siguiente comando para generar una clave privada y un certificado SSL:

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/tu-dominio.key -out /etc/ssl/certs/tu-dominio.crt
```

Durante el proceso, OpenSSL te pedirá información como:

- **Country Name** (Código de dos letras del país, ej. `US` para Estados Unidos, `ES` para España).
- **State or Province Name** (Provincia o estado).
- **Locality Name** (Ciudad).
- **Organization Name** (Nombre de tu organización).
- **Common Name** (El dominio del certificado, ej. `tu-dominio.com`).

Esto generará:

- Una clave privada en `/etc/ssl/private/tu-dominio.key`
- Un certificado en `/etc/ssl/certs/tu-dominio.crt`

---

## Paso 2: Configurar Nginx para usar el certificado SSL
Edita el archivo de configuración de tu servidor en Nginx. Normalmente se encuentra en:

```
/etc/nginx/sites-available/default
```

Agrega o edita el bloque `server` para que quede así:

```nginx
server {
    listen 80;
    server_name tu-dominio.com www.tu-dominio.com;

    # Redirigir HTTP a HTTPS
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name tu-dominio.com www.tu-dominio.com;

    ssl_certificate /etc/ssl/certs/tu-dominio.crt;
    ssl_certificate_key /etc/ssl/private/tu-dominio.key;

    location / {
        root /var/www/html;
        index index.html index.htm;
    }
}
```

Guarda los cambios y cierra el archivo.

---

## Paso 3: Verificar la Configuración de Nginx
Antes de reiniciar Nginx, verifica que la configuración sea correcta:

```bash
sudo nginx -t
```

Si no hay errores, reinicia Nginx para aplicar los cambios:

```bash
sudo systemctl restart nginx
```

---

## Paso 4: Verificar la Instalación SSL
1. Abre un navegador y accede a tu dominio con `https://`.

---

## Paso 5: Obtener un certificado de una autoridad certificadora (CA)
Aunque un certificado autofirmado es útil para pruebas, no es confiable para producción.

Para instalarlo:

1. Guarda los archivos del certificado proporcionados por la CA (normalmente incluyen el certificado principal y el intermedio).
2. Actualiza las rutas en el archivo de configuración de Nginx:

```nginx
ssl_certificate /ruta/al/certificado_proporcionado.crt;
ssl_certificate_key /ruta/a/tu-clave-privada.key;
```

3. Reinicia Nginx.