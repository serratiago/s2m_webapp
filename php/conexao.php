<?
//Conexão com o banco de dados
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_banco", $db_usuario, $db_senha);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>