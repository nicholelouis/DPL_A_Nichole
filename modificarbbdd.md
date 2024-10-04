# Insertar, leer, modificar y borrar registros de la base de datos

![img](https://banner2.cleanpng.com/20180904/xhu/kisspng-logo-image-computer-icons-php-portable-network-gra-william-davies-meng-mongodb-1713944344684.webp)

Este informe describe los pasos necesarios para realizar las cuatro operaciones básicas en una base de datos: insertar, leer, modificar y borrar utilizando PHP para interactuar con la base de datos a través de phpMyAdmin. La base de datos de ejemplo se llamará prueba y la tabla sobre la que operaremos es users.

### 1. Insertar registros

Para agregar un nuevo usuario a la tabla users, se requiere un formulario HTML y un script PHP que procese los datos ingresados. El siguiente código inserta un nuevo registro en la tabla.

Formulario HTML:
```bash
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

Script PHP: 
```bash
<?php
$conn = new mysqli("localhost", "root", "", "prueba");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro insertado correctamente";
    } else {
        echo "Error al insertar: " . $conn->error;
    }

    $conn->close();
}
?>
```

### 2. Leer Registros

Para leer todos los registros de la tabla users ejecutamos una consulta SQL que muestre los datos en formato de tabla HTML.

```bash
php
<?php
$conn = new mysqli("localhost", "root", "", "prueba");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Contraseña</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la tabla";
}

$conn->close();
?>
```

### 3. Modificar Registros 
Para modificar un registro necesitamos capturar el id del usuario a modificar, y luego actualizar los valores de name y email.

Formulario HTML:
```bash
<form action="update.php" method="POST">
    <label for="id">ID del usuario a modificar:</label>
    <input type="number" name="id" required>
    <br>
    <label for="name">Nuevo nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Nuevo correo:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Modificar">
</form>
```

Script PHP:
```bash
php
<?php
$conn = new mysqli("localhost", "root", "", "prueba");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

    $conn->close();
}
?>
```

### 4. Borrar Registros 
Para eliminar un registro, es necesario especificar el id del usuario que se desea borrar.

Formulario HTML:
```bash
<form action="delete.php" method="POST">
    <label for="id">ID del usuario a eliminar:</label>
    <input type="number" name="id" required>
    <br>
    <input type="submit" value="Eliminar">
</form>
```

Script PHP: 
```bash
php
<?php
$conn = new mysqli("localhost", "root", "", "prueba");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }

    $conn->close();
}
?>
```

### Conclusión
Este informe se mostraron los pasos para insertar, leer, modificar y eliminar registros en la tabla users dentro de la base de datos prueba, proporcionando el código utilizado de PHP y explicando cada paso.