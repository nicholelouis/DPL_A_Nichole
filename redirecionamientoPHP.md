# Redirecionamiento de páginas con PHP

El redireccionamiento de páginas es una técnica esencial en el desarrollo web, utilizada para enviar a los usuarios desde una URL a otra de manera automática. En PHP, el redireccionamiento se logra fácilmente utilizando la función `header()`. A continuación, se describen los conceptos clave y los pasos básicos para realizar un redireccionamiento en PHP.


### 1. Métodos de redireccionamiento en PHP

PHP utiliza la función `header()` para redirigir usuarios a otra página. Este método funciona enviando encabezados HTTP al navegador antes de que se cargue el contenido de la página. Es importante que la función `header()` sea utilizada antes de que se envíe cualquier otro contenido al navegador, como texto HTML o espacios en blanco.

```bash
<?php
 echo "página 2";

 print_r($_GET);

 header("location: págino.php?name=" .$_GET["name"]);
```

### 2. Tipos de Redireccionamientos

- Redireccionamiento Permanente: Se utiliza cuando una página ha sido movida de forma permanente.

- Redireccionamiento Temporal: Se usa cuando el redireccionamiento es temporal o condicional. Este es el comportamiento predeterminado de `header("Location: ...")`.

### 3. Redireccionamiento Condicional
A menudo se realiza redireccionamiento basado en ciertas condiciones, como la autenticación del usuario o la validación