# Instalación de Certificado SSL en Apache para mi Sitio Web

Voy a detallar cómo instalé un certificado SSL en Apache para un sitio web que configuré en un host virtual con Apache2. Este proceso asegura que mi página sea accesible de forma segura mediante HTTPS.

## Preparativos Iniciales

Antes de comenzar, me aseguré de que todo estuviera listo:

1. Instale el modulo SSL.

```bash
sudo apt install openssl
```

2. Habilité el módulo SSL en Apache: Para ello, ejecuté los siguientes comandos:

```bash
sudo a2enmod ssl
sudo systemctl restart apache2
```

Nos decantamos por la siguiente opción:
Usar un certificado autofirmado (para pruebas locales).

## Instalación del Certificado SSL

Como paso inicial, generé un certificado autofirmado utilizando los siguientes comandos:

- Ejecuté este comando para crear la clave privada:

```bash
sudo openssl gernsa -out server.key 2024
```

- Con el siguiente comando generamos un CSR (Certificate Signing Request) o Solicitud de Firma de Certificado.

```bash
openssl req -new -key server.key -out server.csr
```

Llené la información solicitada, como:
nombre del dominio, organización, país, pero lo más importante es el 'common name', nuestro localhost, en nuestro caso 'prueba1.com'.

- Este comando genera un certificado autofirmado (self-signed certificate). Este tipo de certificado no está validado por una autoridad certificadora, pero puede ser útil para pruebas internas o entornos de desarrollo

```bash
openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt
```

## Configuración del Host Virtual SSL

Edité el archivo de configuración del host virtual que estaba en /etc/apache2/sites-available/prueba1.com.conf. Aquí está el contenido de mi configuración:

```bash
<VirtualHost *:443>
    ServerName prueba1.com
    ServerAlias www.prueba1.com

    DocumentRoot /var/www/html/prueba1.com

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/server.crt
    SSLCertificateKeyFile /etc/ssl/certs/server.key

    <Directory /var/www/prueba1.com>
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

## Verificación y Reinicio de Apache

- Me aseguré de que la configuración de Apache era válida ejecutando:

```bash
sudo apache2ctl configtest
```

Recibí el mensaje Syntax OK, lo que confirmó que todo estaba bien.

- Reinicié Apache para aplicar los cambios:

```bash
sudo systemctl restart apache2
```

Probé el sitio accediendo a https://prueba1.com en mi navegador. Debería aparecer un aviso (warning) indicando que la página utiliza un certificado autofirmado y, por lo tanto, podría considerarse poco confiable. Sin embargo, al aceptar continuar, se carga correctamente nuestra página HTML.

## Resultado Final

El sitio web está ahora configurado con HTTPS y funciona correctamente, proporcionando seguridad y confianza a los usuarios.

### Observaciones

Si el certificado SSL no funciona correctamente, hay varias áreas que puedes revisar para solucionar el problema.

1. Verifica la configuración de Apache (dentro de prueba1.com.conf)

2. Revisa los permisos de los archivos

```bash
sudo chmod 600 /etc/ssl/private/server.key
sudo chmod 644 /etc/ssl/certs/server.crt
```

3. Reinicia Apache

```bash
sudo systemctl restart apache2
```

4. Verifica el firewall, Desactiva temporalmente el firewall

```bash
sudo ufw disable
## si funciono permitir el tráfico HTTPS antes de volver a activarlo
sudo ufw allow 443
sudo ufw enable
```

5. Verifica los logs de apache

```bash
sudo tail -f /var/log/apache2/error.log
```
