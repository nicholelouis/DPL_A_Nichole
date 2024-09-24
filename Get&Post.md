# Método Get y Post

## Método GET

El metodo **get** envía los datos de los formularios a tráves de las URL, los parametros enviados son visibles en la barra del navegador.

- **Uso típico**: Consultas que no alteran el estado del servidor, como búsquedas o navegación entre páginas.

- **Ventajas**: 
  - Fácil de usar para pruebas y depuración.
  - Se puede marcar en favoritos o compartir la URL.

- **Desventajas**: 
  - Tamaño limitado de datos (la longitud de la URL es limitada).
  - Los datos enviados son visibles y no son seguros para enviar información sensible.


1. **Formulario (index.php)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = get action=get_post.php>
        nombre: <input tape= 'text' name='nombre'>
        <br>
        <input type= 'submit' name='enviar' value='send'>
    </form>
</body>
</html>
```

2. **Archivo PHP (get_post.php)**:
```php
    <?php
        if (isset($_GET['nombre'])) {
            $nombre = htmlspecialchars($_GET['nombre']);
            echo "Nombre recibido: " . $nombre;
        } else {
            echo "No se ha enviado ningún dato.";
        }
    ?>
```

Cuando envíes el formulario, los datos serán enviados como parte de la URL (por ejemplo, `get_post.php?nombre=Nichole`), y el archivo PHP podrá capturarlos usando `$_GET`.

## Método Post

El método **post** envía los datos de forma oculta dentro del cuerpo de la solicitud HTTP, lo que lo hace más seguro que el get.

- **Uso típico**: Envío de formularios con información confidencial o que modifica datos del servidor, como un registro de usuario.
- **Ventajas**:
  - No hay límite en el tamaño de los datos enviados.
  - Los datos no son visibles en la URL.
- **Desventajas**:
  - No es posible marcar la solicitud en favoritos o compartirla.
  - Requiere herramientas adicionales (como herramientas de depuración) para ver el contenido enviado.

1. **Formulario (index.php)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = post action=get_post.php>
        nombre: <input tape= 'text' name='nombre'>
        <br>
        <input type= 'submit' name='enviar' value='send'>
    </form>
</body>
</html>
```

2. **Archivo PHP (get_post.php)**:
```php
    <?php
        if (isset($_POST['nombre'])) {
            $nombre = htmlspecialchars($_POST['nombre']);
            echo "Nombre recibido: " . $nombre;
        } else {
            echo "No se ha enviado ningún dato.";
        }
    ?>
```

- **Funcionamiento**: Cuando envíes el formulario, los datos se enviarán al servidor sin aparecer en la URL. El archivo PHP procesará la información usando la variable `$_POST`.

## Prueba Xammp
1. Colocamos los archivos PHP en la carpeta `htdocs` de XAMPP.
2. En el navegador, accedemos a `http://localhost/nombre_carpeta/index.html` para ejecutar los formularios.
3. Dependiendo del método elegido los datos serán procesados de manera diferente por los archivos PHP.

![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/get.png?raw=true)
![img](https://github.com/nicholelouis/DPL_A_Nichole/blob/main/img/post.png?raw=true)

## Conclusiones
- **GET** es adecuado para consultas donde la seguridad no es crítica y los datos pueden ser visibles.
- **POST** es más seguro y útil para el envío de información sensible.
Ambos métodos son fundamentales para interactuar con aplicaciones web dinámicas que utilicen XAMPP como servidor local.
