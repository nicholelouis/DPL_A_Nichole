# Trabajando con Git Markdown 3

### Introducción

Este informe detalla el proceso de creación de un proyecto web en un directorio específico, incluyendo la inicialización del repositorio, la estructura de archivos y la implementación de cambios mediante control de versiones.

### Pasos Realizados

1. Creación del Directorio y Repositorio. Inicialización del repo
```bash
mkdir /bloggalpon/
cd /bloggalpon/
git init
```

2. Creación del archivo index.html, Estructura Básica del Proyecto y commit de esqueleto básico
Archivo Creado: index.htm.
```bash
touch index.htm
echo "<!DOCTYPE html><html><head></head><body></body></html>" > index.htm
git add index.htm
git commit -m "Creación del esqueleto básico del index.htm"
```

3. Añadir el contenido del Head y commit indicando que se añade la cabecera del index.htm
```bash
echo "<title>Mi Blog</title>" > index.htm
git add index.htm
git commit -m "Se añade la cabecera del index.htm"
```

4. Añade el contenido del Body y commit
```bash
echo "<h1>Bienvenido a mi Blog</h1>" >> index.htm
git add index.htm
git commit -m "Se añade la estructura básica del body"
```

5. Añade el contenido de section y commit
```bash
echo "<section><article><h2>Título del Post</h2><p>Contenido del post...</p></article></section>" >> index.htm
git add index.htm
git commit -m "Se añade toda la estructura de la zona de posts"
```

6. Se añade css al body y al html
Archivo Creado: style.css.
```bash
touch style.css
echo "body { font-family: Arial, sans-serif; }" > style.css
git add style.css
git commit -m "Se añaden las CSS de html y de body"
```

7. Se añade varios elementos de HTML5
```bash
echo "header, section, article, aside, footer { margin: 10px; padding: 10px; }" >> style.css
git add style.css
git commit -m "Se añaden las CSS de varios elementos HTML5: header, section, article, aside y footer"
```

8. Añadir logotipo más commit
Archivo Añadido: logo.png.
```bash
cp ./img/logo.png .
git add logo.png
git commit -m "Se añade el logotipo de Galpón"
2.8 Estilos Adicionales
```

9. Se añaden el css de Section
```bash
echo "section { background-color: #f9f9f9; }" >> style.css
git add style.css
git commit -m "Se añaden las CSS de section"
```

9. Se añaden el css de footer
```bash
echo "footer { font-size: 0.8em; }" >> style.css
git add style.css
git commit -m "Se añaden las CSS del footer"
```

10. Se añaden el css de h1 y los enlaces
```bash
echo "h1 { color: blue; } a { text-decoration: none; }" >> style.css
git add style.css
git commit -m "Se añaden las CSS del H1 y de los enlaces"
2.9 Versionado y Ramas
```

11. Crea una etiqueta v1.0
```bash
git tag v1.0
git branch desarrollo
Tareas en la rama de desarrollo
```

12. Crea una rama de dasarollo

- Crea un directorio imagenes más commit
```bash
mkdir images
mv logo.png images/
git add images/logo.png
git commit -m "Se mueve el logotipo a la carpeta images"
```

- Creación de directorio css más commit
```bash
mkdir CSS
mv style.css CSS/
git add CSS/style.css
git commit -m "Se mueve la CSS a la carpeta CSS"
```

- Cambia las referencias de css en el index.html y logotipo.png más commit
```bash
# Actualizar referencias en index.htm
sed -i 's|style.css|CSS/style.css|' index.htm
sed -i 's|logo.png|images/logo.png|' index.htm
git add index.htm
git commit -m "Se cambian las referencias a las CSS y a las imágenes al reorganizarlas en directorios"
```

8. Crea la rama bugfix, Quitar comentarios en CSS
```bash
git checkout -b bugfix master
git add CSS/style.css
git commit -m "Se introducen los punteados en la barra derecha y en el footer"
```

- Introducir el título en index.htm
```bash
sed -i 's|<h1>Bienvenido a mi Blog</h1>|<h1>Galpón</h1>|' index.htm
git add index.htm
git commit -m "Se introduce el título en la página"
```

- Cambiar 2012 por 2014 en el footer más commit
```bash
sed -i 's|2012|2014|' index.htm
git add index.htm
git commit -m "Se realizan pequeños ajustes en el footer"
2.11 Versionado Final
```

- Crea una etiqueta v1.1, lleva esos cambios a la rama master
```bash
git tag v1.1
git checkout master
git merge bugfix
```

- Borra la rama bigfix, llevar los cambios a la rama de desarollo, resolver conflictos y crea una etiqueta v1.2
```bash
git branch -d bugfix
git merge desarrollo
git tag v1.2
```

3. Conclusiones

Se ha completado con éxito la creación y gestión del proyecto web, aplicando prácticas de control de versiones y estructuración de archivos.