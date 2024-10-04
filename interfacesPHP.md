# Interfaces de Contacto con los Ficheros PHP Anteriores

El propósito de este informe es describir la creación de formularios HTML para interactuar con los ficheros PHP previamente desarrollados, en la tarea anterior. Estos formularios enviarán las variables necesarias mediante el método post a los respectivos scripts PHP.

## Formularios HTML:

### 1. Formulario para Insertar Usuarios
Este formulario permite al usuario agregar un nuevo registro en la tabla users, pasando los valores de name, email, y password al archivo insert.php mediante el método POST.

```bash
<h2>Insertar Nuevo Usuario</h2>
<form action="insert.php" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Correo:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Insertar">
</form>
```

### 2. Formulario para Leer Usuarios
Este enlace redirige a read.php, donde se muestran todos los registros de la tabla users. No es necesario enviar datos a través del método POST en este caso.

```bash
<h2>Leer Todos los Usuarios</h2>
<a href="read.php">Ver Usuarios</a>
```

### 3. Formulario para Modificar Usuarios
Este formulario envía el id del usuario que se quiere modificar, junto con los nuevos valores de name y email al archivo update.php.

```bash
<h2>Modificar Usuario</h2>
<form action="update.php" method="POST">
    <label for="id">ID del Usuario a Modificar:</label>
    <input type="number" name="id" required>
    <br>
    <label for="name">Nuevo Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Nuevo Correo:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Modificar">
</form>
```

### 4. Formulario para Eliminar Usuarios
Este formulario permite al usuario introducir el id del registro que se quiere eliminar y envía ese valor a delete.php mediante el método POST.

```bash
<h2>Eliminar Usuario</h2>
<form action="delete.php" method="POST">
    <label for="id">ID del Usuario a Eliminar:</label>
    <input type="number" name="id" required>
    <br>
    <input type="submit" value="Eliminar">
</form>
```

