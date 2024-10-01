## Trabajando con el VisualStudio y nuestro repositotio de git.

### 1. Crear un repositorio llamado banco
El primer paso es crear un repositorio en nuestro GitHub desde la página web.

- Ingresar a nuestro gitHub y hacemos click en New Repository.
- Nombrar el repositorio como banco.

### 2. Clonar el repositorio desde la línea de comandos

```bash
git clone https://github.com/tu-usuario/banco.git
```
Este comando clona el repositorio de GitHub en una carpeta local.

### 3. Crear un proyecto banco en otra carpeta
Aquí creamos la estructura del proyecto en otra ubicación diferente, para posteriormente copiarlo en la carpeta donde clonamos el repositorio.

#### Ejemplo:
```bash
mkdir banco-proyecto
cd banco-proyecto
```

### 4. Copiar el proyecto en la carpeta del repositorio clonado

```bash
cp -R ../banco/* ../banco_repo/
```

### 5. Hacer un commit y push desde Visual Studio

- Abrimos el repositorio clonado en visual studio.
- Vamos a la pestaña Team Explorer y seleccionar los archivos cambiados.
- Añadir los cambios staging y escribir un mensaje.
- Realizar el Commit.
- Hacer un Push para subir el commit al repositorio remoto.

### 6. Borrar del disco duro el código del proyecto
Una vez hemos confirmado que el código está guardado en GitHub, podemos eliminar el código localmente.

```bash
rm -rf ../banco_repo
```

### 7. Clonar el proyecto nuevamente desde GitHub

```bash
git clone https://github.com/tu-usuario/banco.git
```

### 8. Hacer una modificación del código y subirla a github
Una vez clonado el proyecto, se pueden hacer modificaciones. Después de realizar cambios en el código, se sigue el proceso habitual de versionado para subir los cambios a github.

```bash
git add .
git commit -m "Descripción de la modificación"
git push origin main
```
