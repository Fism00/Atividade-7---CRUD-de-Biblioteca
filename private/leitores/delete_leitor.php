<?php

include '../../config/db.php';
$id = $_GET['id'];

$sql = " DELETE FROM leitores WHERE id=$id ";

if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.
        <a href='read_leitor.php'>Ver registros.</a>
        ";
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();