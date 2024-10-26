# Informe sobre Cómo Alojar Páginas en Infinity Free desde XAMPP

## Introducción

En este informe, detallaremos los pasos que seguimos para alojar nuestras páginas web desarrolladas en XAMPP en un servidor remoto utilizando Infinity Free. A lo largo de este proceso, cubriremos la descarga e instalación de XAMPP, la preparación de nuestro proyecto, la creación de una cuenta en Infinity Free, la descarga de FileZilla, la conexión a Infinity Free, y finalmente, la subida de nuestros archivos.

## Pasos

### Paso 1: Descargar e Instalar XAMPP

1. **Descargar XAMPP**
   - Comenzamos visitando el sitio web oficial de [Apache Friends](https://www.apachefriends.org/index.html).
   - En la página principal, seleccionamos la versión adecuada para nuestro sistema operativo  y hicimos clic en el botón de descarga.

2. **Instalar XAMPP**
   - Una vez descargado el archivo, ejecutamos el instalador.
   - Seguimos las instrucciones en pantalla, eligiendo los componentes que deseábamos instalar (normalmente seleccionamos Apache y MySQL).
   - Finalizamos la instalación y abrimos el **Panel de Control de XAMPP**.

### Paso 2: Preparar el Proyecto en XAMPP

1. **Colocar Archivos en `htdocs`**
   - Navegamos a la carpeta de instalación de XAMPP, que generalmente se encuentra.
   - Abrimos la carpeta `htdocs` y creamos una nueva carpeta llamada `proyectoDPL`.
   - Copiamos todos nuestros archivos CRUD (operacion básicas en una base de datos) a esta nueva carpeta.

2. **Verificar el Proyecto**
   - Abrimos un navegador web y accedimos a `http://localhost/proyectoDPL`.
   - Verificamos que nuestro sitio se cargara correctamente y que todos los enlaces funcionaran como se esperaba.

### Paso 3: Crear una Cuenta en Infinity Free

1. **Registro en Infinity Free**
   - Luego, nos dirigimos a [Infinity Free](https://infinityfree.net/) y hicimos click en sign up para registrarnos.
   - Completamos el formulario con nuestra información, incluyendo nuestro de email y contraseña.

2. **Confirmar Correo Electrónico**
   - Revisamos nuestra bandeja de entrada y confirmamos nuestra cuenta a través del enlace que nos enviaron.

### Paso 4: Crear un Nuevo Dominio

1. **Acceder al Panel de Control**
   - Iniciamos sesión en nuestra cuenta de Infinity Free.
   - En el panel de control, hicimos click en create account para generar un nuevo dominio gratuito.

2. **Configurar el Dominio**
   - Seguimos las instrucciones para elegir y configurar nuestro dominio.
   - Al finalizar, recibimos detalles sobre nuestro nuevo dominio, incluida la URL que utilizaríamos para acceder a nuestro sitio.

### Paso 5: Descargar e Instalar FileZilla

1. **Descargar FileZilla**
   - Visitamos el sitio web oficial de [FileZilla](https://filezilla-project.org/).
   - Hicimos clic en download FileZilla client y seleccionamos la versión adecuada para nuestro sistema operativo.

2. **Instalar FileZilla**
   - Una vez descargado el instalador, lo ejecutamos y seguimos las instrucciones en pantalla para completar la instalación.

### Paso 6: Conectar FileZilla a Infinity Free

1. **Obtener Detalles de Conexión**
   - Regresamos al panel de control de Infinity Free y buscamos la sección "FTP Details".
   - Tomamos nota del **host FTP**, **nombre de usuario** y **contraseña**.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/Captura%20de%20pantalla%202024-10-27%20a%20la(s)%200.44.34.png?raw=true)

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/Captura%20de%20pantalla%202024-10-27%20a%20la(s)%200.43.59.png?raw=true)

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/Captura%20de%20pantalla%202024-10-27%20a%20la(s)%200.44.22.png?raw=true)

2. **Configurar FileZilla**
   - Abrimos FileZilla y, en la parte superior, introdujimos los siguientes datos en los campos correspondientes:
     - **Host**: ingresamos el host FTP proporcionado por Infinity Free.
     - **Username**: ingresamos el nombre de usuario FTP.
     - **Password**: ingresamos la contraseña FTP.
     - **Port**: dejamos este campo vacío (FileZilla usará el puerto predeterminado 21).
   - Hicimos clic en "Quickconnect" para establecer la conexión.

3. **Verificar la Conexión**
   - Una vez conectados, deberíamos ver dos paneles: el de la izquierda muestra los archivos de nuestra computadora, y el de la derecha muestra los archivos en el servidor de Infinity Free.
   - Si la conexión es exitosa, veremos mensajes de estado en la parte superior que indican que estamos conectados.

### Paso 7: Subir Archivos al Servidor

1. **Subir Archivos**
   - Navegamos en el panel izquierdo hasta la carpeta donde tenemos nuestros archivos de proyecto.
   - Seleccionamos todos los archivos y carpetas de nuestro proyecto que están en la carpeta `htdocs` de XAMPP y los arrastramos al panel derecho (la carpeta `htdocs` de Infinity Free).

2. **Verificar la Carga**
   - Nos aseguramos de que todos los archivos se hubieran subido correctamente y que estuvieran organizados en la carpeta adecuada.

### Paso 8: Verificar el Sitio Web

1. **Acceder al Sitio**
   - Una vez que subimos todos los archivos, abrimos nuestro dominio en un navegador web.
   - Verificamos que el sitio funcionara correctamente, asegurándonos de que todos los enlaces y recursos se cargaran sin problemas.

2. **Resolver Problemas**
   - Si encontramos algún problema, revisamos los archivos y las rutas de acceso. Nos aseguramos de que los nombres de los archivos y carpetas fueran correctos y que no hubiera errores tipográficos.

## Conclusión

Alojar nuestras páginas web desarrolladas en XAMPP en un servidor remoto como Infinity Free fue un proceso accesible y satisfactorio que permitió que nuestro proyecto estuviera disponible en la web. Siguiendo estos pasos, garantizamos que nuestro sitio esté bien configurado y accesible para los usuarios.

---

### Referencias

- [Infinity Free - Hosting gratuito](https://infinityfree.net/)
- [XAMPP - Apache Friends](https://www.apachefriends.org/index.html)
- [FileZilla - Cliente FTP](https://filezilla-project.org/)
