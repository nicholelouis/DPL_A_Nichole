<?php
$servername = "sql311.infinityfree.com"; // El servidor somos nosotros es el local
$username = "if0_36580552"; // El usuario
$password = "M7xIXWNzrh4d"; // La contraseña para acceder al administrador. Esto no es seguro hacerlo pero no pasa nada si es solo una prueba
$dbname = "if0_36580552_prueba"; // Nombre de la base de datos

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Conexión no completada: " . $conn->connect_error);
}

// Insertamos el usuario
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generar el hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Agrega el punto y coma

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password); // "sss" indica que son tres strings

    if ($stmt->execute()) { // Ejecuta la declaración
        echo "Nuevo usuario creado exitosamente";
    } else {
        echo "Error: " . $stmt->error; // Muestra el error si ocurre
    }
    $stmt->close(); // Cierra la declaración
}

// Mostramos los usuarios
if (isset($_POST['select'])) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Nombre: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        }
        echo '<br><button onclick="window.location.href=\'index.html\'">Volver al administrador de consultas</button>';
    } else {
        echo "0 resultados";
    }
}

// Actualizamos los usuarios
if (isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $userId); // "ssi" indica que son dos strings y un entero

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente";
        echo '<br><button onclick="window.location.href=\'index.html\'">Volver al administrador de consultas</button>';
    } else {
        echo "Error actualizando usuario: " . $stmt->error;
    }
    $stmt->close(); // Cierra la declaración
}

// Borramos el usuario
if (isset($_POST['delete'])) {
    $userId = $_POST['userId'];

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $userId); // "i" indica que es un entero

    if ($stmt->execute()) {
        echo "Usuario borrado exitosamente";
        echo '<br><button onclick="window.location.href=\' index.html\'">Volver al administrador de consultas</button>';
    } else {
        echo "Error borrando usuario: " . $stmt->error;
    }
    $stmt->close(); // Cierra la declaración
}

mysqli_close($conn); // Cierra la conexión

// Insertamos el usuario admin
$admin_name = "admin"; // Nombre del usuario admin
$admin_email = "admin@gmail.com"; // Correo del usuario admin
$admin_password = "admin"; // Contraseña del usuario admin

// Generar el hash de la contraseña
$hashed_admin_password = password_hash($admin_password, PASSWORD_DEFAULT);

// Usar una declaración preparada para evitar inyecciones SQL
$stmt = $conn->prepare("INSERT INTO users (nombre, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $admin_name, $admin_email, $hashed_admin_password); // "sss" indica que son tres strings

if ($stmt->execute()) { // Ejecuta la declaración
    echo "Usuario admin creado exitosamente<br>";
} else {
    echo "Error creando usuario admin: " . $stmt->error; // Muestra el error si ocurre
}
$stmt->close(); // Cierra la declaración
?>
