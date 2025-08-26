<?php

include '../../config/db.php';

$sql = "SELECT * FROM livros";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> titulo </th>
            <th> genero </th>
            <th> ano publicado </th>
            <th> id do autor </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['titulo']} </td>
                <td> {$row['genero']} </td>
                <td> {$row['ano_publicacao']} </td>
                <td> {$row['autor_id']} </td>
                <td> 
                    <a href='update_livro.php?id={$row['id']}'>Editar<a>
                    <a href='delete_livro.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='create_livro.php'>Inserir novo Registro</a>";

echo "<br>";

echo "<a href='../index.php'> home page</a>";