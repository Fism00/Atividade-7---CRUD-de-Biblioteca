<?php

include '../../config/db.php';

$sql = "SELECT * FROM leitores";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> nome </th>
            <th> email(se tiver) </th>
            <th> telefone </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['nome']} </td>
                <td> {$row['email']} </td>
                <td> {$row['telefone']} </td>
                <td> 
                    <a href='update_leitor.php?id={$row['id']}'>Editar<a>
                    <a href='delete_leitor.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create_leitor.php'>Inserir novo Registro</a>";

echo "<br>";

echo "<a href='../index.php'> home page</a>";