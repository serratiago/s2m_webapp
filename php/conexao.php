<?
try {
    $conn = new PDO("sqlsrv:server = tcp:$db_host; Database = $db_banco", "$db_usuario ", "$db_senha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

?>