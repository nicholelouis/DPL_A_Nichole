# Instalación y configuración básica de nginx

### nginx
Nginx es un servidor web de código abierto que también puede funcionar como proxy inverso, equilibrador de carga y servidor de caché.Nginx es ampliamente utilizado en la industria para alojar sitios web, aplicaciones y servicios en la nube.

### Instalación y configuración

- Para instalar el nginx en nuestro Linux mint, solo necesitamos utilizar este comando:
```bash
apt install nginx
```
- Para verificar que todo ha ido bien y nuestro servicio esta activo
```bash
sudo systemctl status nginx
```
- Tambien podemos verificar la sintaxis y configuración con el siguiente comando y nos deberia indicar que todo esta bien
```bash
sudo nginx -t
```
Dentro de /etc/nginx podemos encontrar todos los archivo y configuraciones del mismo
