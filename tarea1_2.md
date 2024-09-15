# Tarea 1.2- Trabajando con Git y MarkDown II
Para la entrega de esta y las sucesivas tareas/prácticas que hagamos durante el curso haremos uso de GitHub, deberán enviarme a través de Campus el enlace a la práctica así como el commit que indique la fecha de entrega. Este commit debe reflejar una fecha que se encuentre dentro del plazo establecido para la realización de la práctica marcado a través de la plataforma Campus, en caso contrario se dará por suspendida la práctica.

Este ejercicio es continuación del anterior por lo que tendremos el mismo repositorio.

Se deben incluir todos los comandos que se usen durante el ejercicio, las explicaciones y capturas de pantalla en el fichero README.me del repositorio.

### CREAR UNA RAMA  v0.2(1 PUNTO)
- Crear una rama v0.2.
- Posiciona tu carpeta de trabaja en esta rama.
```bash
git checkout -b v0.2
```

### AÑADIR  EL FICHERO 2.txt  (1 PUNTO)
- Añadir un fichero 2.txt en la rama v0.2
```bash
touch 2.txt
git add .
git commit -m "se añade fichero 2.txt"
```

### CREAR UNA RAMA REMOTA v0.2 (1 PUNTO)
- Subir los cambios al repositorio remoto.
```bash
git push origin v0.2
```

### MERGE DIRECTO (1 PUNTO)
- Posicionarse en la rama master.
- Hacer un merge de la rama v0.2 en la rama master.
```bash
git checkout main
git merge v0.2
git push origin main
```

### MERGE CON CONFLICTO (1 PUNTO)
- En la rama master poner Hola  en el fichero 1.txt y hacer commit.
```bash
echo "hola" > 1.txt
git add .
git commit -m "se añade fichero 1.txt"
```
- Posicionarse en la rama v0.2 y poner Adios en el fichero 1.txt y hacer commit.
```bash
git checkout v0.2
echo "adios" > 1.txt
git add .
git commit -m "se añade adios en el fichero 1.txt"
```
- Posicionarse de nuevo en la rama master y hacer un merge con la rama v0.2
```bash
git checkout main
git merge v0.2
```

### LISTADO DE RAMAS (1 PUNTO)
Listar las ramas con merge y las ramas sin merge.
```bash
git branch --merged
git branch --no-merged
```

### ARREGLAR  CONFLICTO (1 PUNTO)
Arreglar el conflicto anterior y hacer un commit. Explicar como lo has arreglado incluyendo capturas de pantalla.

CAPTURE

```bash
git add 1.txt
git commit -m "Se arregla conflicto de ramas en el archivo 1.txt"
```

### BORRAR RAMA (1 PUNTO)
- Crear un tag v0.2
- Borrar la rama v0.2
```bash
git tag v0.2
git branch -m v0.2
git push origin --delete v0.2
```

### LISTADO DE CAMBIOS (1 PUNTO)
Listar los distintos commits con sus ramas y sus tags.
```bash
git log --oneline --decorate --all --graph
```

### CREAR UNA ORGANIZACIÓN (1 PUNTO)
Crea una organización llamada orgdpl-tunombredeusuariodegithub ( ejemplo orgdpl-amarzar )
![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/Captura%20de%20pantalla%202024-09-13%20a%20la(s)%2016.07.19.png?raw=true)

## CREAR EQUIPOS 
- Crear dos equipos en la organización orgdpl-tunombredeusuariodegithub, uno llamado administradores con más permisos y otro colaboradores con menos permisos
![img]()
- Meter a github.com/radav453 y a 2 de vuestros compañeros de clase en el equipo de administradores.
![img]()
- Meter a github.com/radav453 y a 2 de vuestros compañeros de clase en el equipo de colaboradores.
![img]()

### CREAR UN index.html
Crear un index.html que se pueda ver como página web en la organización.
```bash
touch index.html
git add .
git commit -m "Se sube index.html"
git push
```
![img]()
![img]()
![img]()
![img]()
![img]()

### CREAR PULL REQUESTS
Hacer 2 forks de 2 repositorios orgdpl-tunombredeusuariodegithub.github.io de 2 organizaciones de las que sean ni administradores ni colaboradores.
Crear una rama en cada fork.
En cada rama modificar el fichero index.html añadiendo vuestro nombre.
Con cada rama hacer un pull request.

![img]()
![img]()
![img]()
![img]()
![img]()
```bash
git checkout -b modificacion-nichole
```

### GESTIONAR PULL REQUESTS
Aceptar los pull request que lleguen a los repositorios de tu organización.
```bash

```
![img]()
![img]()
![img]()
![img]()
