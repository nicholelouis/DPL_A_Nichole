# Tarea 1.1

### CREACIÓN DEL REPOSITORIO (1 PUNTO)
Crear una cuenta en GitHub si aún no la tienes.

- Crear un repositorio en vuestro GitHub llamado DPL_A_nombre ( DPL_A_Alejandro )
- Clonar el repositorio en local.
```bash
git clone https://github.com/nicholelouis/DPL_A_Nichole.git
```

### CREACIÓN DEL ARCHIVO README (1 PUNTO)
- Crear ( si no lo habéis hecho ya ) en vuestro repositorio local un documento tarea1_1.md, en este documento  tendrán que ir poniendo los comandos que han utilizado durante el ejercicio, las explicaciones y capturas de pantalla que consideren necesarias.

### COMMIT INICIAL (1 PUNTO)
- Añadir al tarea1_1.md los  comandos utilizados hasta ahora y hacer un commit inicial con el mensaje commit inicial.
```bash
git add .
git commit -m "Tarea 1.1"
```

### PUSH INICIAL (1 PUNTO)
- Subir los cambios al repositorio remoto
```bash
git push
```

### IGNORAR ARCHIVOS (1 PUNTO)
- Crear en el repositorio local un fichero llamado privado.txt. Crear en el repositorio local una carpeta llamada privada.
```bash
touch privado.txt
mkdir privado
```

- Realizar los cambios oportunos para que tanto el archivo como la carpeta sean ignorados por git. ( Incluir capturas de pantalla )
```bash
echo "privado" >> .gitignore
echo "privado.txt" >> .gitignore
```
### AÑADIR FICHERO 1.txt (1 PUNTO)
- Añadir 1.txt al repositorio local.
```bash
touch 1.txt
git add 1.txt
git commit -m "Se añade el fichero 1.txt"
git push
```

### CREAR EL TAG v0.1 (1 PUNTO)
- Crear un tag v0.1
```bash
git tag v0.1
```

### SUBIR EL TAG v0.1 (1 PUNTO)
- Subir los cambios al repositorio remoto.
```bash
git push origin v0.1
```

###  CONFIGURACIÓN Y USO SOCIAL DE  GITHUB (1 PUNTO)
- Poner una foto en vuestro perfil de GitHub.
- Poner el doble factor de autentificación en vuestra cuenta de GitHub.
- Seguir los repositorios  de vuestros compañeros.
- Añadir una estrella a los repositorios  del resto de tus compañeros.

### CREAR UNA TABLA (1 PUNTO)
- Crear una tabla de este estilo en el fichero tarea1_1.md con la información de varios de tus compañeros de clase:

## Compañeros

| Nombre       | Email                | Clase               |
|--------------|----------------------|---------------------|
| Cesar        | cesar1233@mail.com   | 2DAW                |
| jose         | josed@gmail.com      | 2DAW                |
| Juan         | juan899@hotmail.com  | 2DAW                |