# Instalación de servidor web Apache

1. La arquitectura Web: capas y funciones

La arquitectura Web es un modelo compuesto de tres capas, ¿cuáles son y cuál es la función de cada una de ellas?

La arquitectura web se divide en tres capas principales, cada una con una función específica:

- Capa de presentación (Frontend):
  Es la interfaz gráfica con la que interactúan los usuarios. Su función principal es capturar datos del usuario y mostrar información. Se desarrolla comúnmente utilizando tecnologías como HTML, CSS y JavaScript.

- Capa de lógica de negocio (Backend):
  Es el núcleo de la aplicación, donde se gestionan las reglas de negocio, se procesan los datos y se ejecutan las operaciones. En esta capa se encuentra el servidor de aplicaciones, y se programan en lenguajes como Java, Python o PHP.

- Capa de datos (Base de datos):
  Su función es almacenar, gestionar y recuperar datos. Normalmente se utilizan sistemas de gestión de bases de datos como MySQL, PostgreSQL o MongoDB.

2. Plataformas Web: LAMP y WISA

Una plataforma web es el entorno de desarrollo de software empleado para diseñar y ejecutar un sitio web; destacan dos plataformas web, LAMP y WISA. Explica en qué consiste cada una de ellas.

Plataforma LAMP:
Es un acrónimo que representa un conjunto de tecnologías de código abierto, comúnmente usadas para crear y ejecutar aplicaciones web:

- L: Linux (sistema operativo).
- A: Apache (servidor web).
- M: MySQL (gestor de bases de datos).
- P: PHP/Python/Perl (lenguaje de programación).

Esta plataforma es popular por su flexibilidad, costo cero y comunidad activa.
Plataforma WISA:

Es un conjunto de tecnologías de Microsoft diseñadas para desarrollar aplicaciones web en entornos Windows:

- W: Windows (sistema operativo).
- I: IIS (servidor web de Microsoft).
- S: SQL Server (gestor de bases de datos).
- A: ASP.NET (framework para aplicaciones web).

Es conocida por su integración y soporte oficial de Microsoft, aunque es propietaria y requiere licencias.

3. Pasos para la instalación y configuración de los servicios en Ubuntu

Indica cada uno de los pasos, y comandos implicados en ellos, para conseguir hacer lo siguiente:

3.1. Instalar el servidor web Apache desde terminal

Actualizar los paquetes:

```bash
apt-get update
```

Instalar el servidor Apache:

```bash
apt-get install apache2 -y
3.2. Comprobar que está funcionando el servidor Apache desde terminal
```

Verificar el estado del servicio:

```bash
systemctl status apache2
```

Si el servidor está corriendo, aparecerá el mensaje "active (running)".

3.3. Comprobar que está funcionando el servidor Apache desde navegador

Abrir un navegador web y acceder a:

```bash
http://<IP-de-la-máquina> (o http://localhost si se usa desde la misma máquina).
```

Debería mostrarse la página de inicio de Apache
.
3.4. Cambiar el puerto por el cual está escuchando Apache pasándolo al puerto 82

Editar el archivo de configuración del servidor Apache:

```bash
nano /etc/apache2/ports.conf
```

Cambiar la línea:

Listen 80

por:

Listen 82

Editar los archivos del sitio habilitado (por defecto /etc/apache2/sites-enabled/000-default.conf):

```bash
Cambiar <VirtualHost *:80> por <VirtualHost *:82>.
```

Reiniciar el servidor Apache para aplicar los cambios:

```bash
systemctl restart apache2
```

Comprobar que funciona accediendo a:

```bash
http://<IP-de-la-máquina>:82
```

3.5. Instalar el servidor de aplicaciones Tomcat

Actualizar los paquetes:

```bash
apt-get update
```

Instalar Java si no está previamente instalado (Tomcat requiere Java):

```bash
apt-get install default-jdk -y
```

Descargar la última versión estable de Apache Tomcat desde el sitio oficial o usar wget:

```bash
wget https://downloads.apache.org/tomcat/tomcat-9/v9.0.x/bin/apache-tomcat-9.0.x.tar.gz
```

Descomprimir el archivo descargado:

```bash
tar -xzvf apache-tomcat-9.0.x.tar.gz
```

Mover Tomcat al directorio deseado, por ejemplo /opt:

```bash
mv apache-tomcat-9.0.x /opt/tomcat
```

Iniciar el servidor Tomcat:

```bash
/opt/tomcat/bin/startup.sh
```

Acceder al servidor Tomcat en el navegador:

```bash
http://<IP-de-la-máquina>:8080
```
