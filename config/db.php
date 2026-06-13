<?php
// Configuración de la base de datos en SQL Server
define('DB_HOST', 'NOTELENOVO\\SQLEXPRESS01'); // instancia de SQL Server
define('DB_NAME', 'gestion_activos');          // nombre de la base de datos
define('DB_USER', '');                         // usuario 
define('DB_PASS', '');                         // contraseña 

// Función para obtener conexión PDO con SQL Server
function getConnection() {
    try {
        $dsn = "sqlsrv:Server=" . DB_HOST . ";Database=" . DB_NAME;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
        exit;
    }
}
?>

