## Informe: Configuración de Hosts Virtuales con Nginx en Linux Mint
A continuación, detallo cómo configuré varios hosts virtuales en mi sistema con Nginx en Linux Mint.

Creación de Directorios para los Sitios Web

Primero, creé los directorios donde estarán los archivos de cada uno de los sitios web:
```bash
mkdir -p /var/www/empresa1
mkdir -p /var/www/empresa2
mkdir -p /var/www/empresa3
```

Después, asigné los permisos y propiedad correspondientes para cada directorio. Me aseguré de que mi usuario tuviera control total sobre ellos:
```bash
chown -R usuario:usuario /var/www/empresa1
chown -R usuario:usuario /var/www/empresa2
chown -R usuario:usuario /var/www/empresa3
chmod -R 755 /var/www/empresa1
chmod -R 755 /var/www/empresa2
chmod -R 755 /var/www/empresa3
```

### Configuración de Archivos en Nginx

Entré al directorio de configuración de Nginx:
```bash
cd /etc/nginx/sites-available
```
Cloné el archivo de configuración por defecto de Nginx para usarlo como base para cada sitio:
```bash
cp default empresal
cp default empresa2
cp default empresa3
``` 
Abrí cada uno de los archivos para editarlos, empezando por empresal:
```bash
nano empresal
``` 
En este archivo realicé los siguientes cambios:

- Al lado de listen:80 y listen [::]:80, eliminé la palabra default_server.

- Modifiqué la línea root /var/www/html para que apunte al directorio de la empresa correspondiente. Por ejemplo, cambié html por empresa1.

- Actualicé el valor de server_name para que coincida con el dominio deseado. Por ejemplo:
server_name empresal.com www.empresal.com;

- Hice los mismos ajustes en los archivos empresa2 y empresa3, apuntando a sus respectivos directorios y dominios (empresa2.com y empresa3.com).

### Activación de las Configuraciones

Volví al directorio principal de configuración de Nginx y creé enlaces simbólicos para activar los sitios:
```bash
ln -s /etc/nginx/sites-available/empresal /etc/nginx/sites-enabled/
ln -s /etc/nginx/sites-available/empresa2 /etc/nginx/sites-enabled/
ln -s /etc/nginx/sites-available/empresa3 /etc/nginx/sites-enabled/
```
Eliminé la configuración por defecto para evitar conflictos:
```bash
rm /etc/nginx/sites-enabled/default
```
### Verificación y Recarga de Nginx

Verifiqué que la configuración no tuviera errores:
```bash
nginx -t
```
Si no hubo errores, recargué el servicio para aplicar los cambios:
```bash
nginx -s reload
``` 
### Configuración del Archivo /etc/hosts

Edité el archivo /etc/hosts para que los nombres de dominio apuntaran al localhost (127.0.0.1):
```bash
nano /etc/hosts
```

Agregué las siguientes líneas:
```bash
127.0.0.1 empresal.com www.empresal.com
127.0.0.1 empresa2.com www.empresa2.com
127.0.0.1 empresa3.com www.empresa3.com
```
### Creación de Páginas de Inicio

Finalmente, creé un archivo index.html para cada sitio para comprobar que los hosts virtuales funcionaban correctamente. Por ejemplo, para empresal:
```bash
cd /var/www/empresa1
nano index.html
```
Escribí algo simple, como:
```bash
<h1>Bienvenido a Empresa 1</h1>
```

Repetí el mismo proceso para empresa2 y empresa3.

### Comprobación Final

Realicé una última recarga de Nginx:
```bash
nginx -s reload
```
Luego abrí los navegadores y verifiqué que los dominios configurados (empresal.com, empresa2.com, y empresa3.com) mostraran las páginas correctas. ¡Todo funcionó perfectamente!