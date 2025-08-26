<?php

include '../../config/db.php';

$autores = $conn->query("SELECT id, nome FROM autores");

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $autor_id = $_POST['autor_id'];

    $sql = "UPDATE livros SET titulo ='$titulo',genero ='$genero', ano_publicacao ='$ano_publicacao', autor_id='$autor_id' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='read_livro.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM livros WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="update_livro.php?id=<?php echo $row['id'];?>">

        <label for="titulo">titulo:</label>
        <input type="text" name="titulo" value="<?php echo $row['titulo'];?>" required>

        <label for="genero">genero:</label>
        <input type="text" name="genero" value="<?php echo $row['genero'];?>" required>

        <label for="ano_publicacao">data publicado:</label>
        <input type="date" name="ano_publicacao" value="<?php echo $row['ano_publicacao'];?>" required >

        <label for="autor_id">autor:</label>
        <select name="autor_id" required>

            <option value="">Selecione</option>
            <?php while ($row = $autores->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= ($row['nome']) ?></option>
            <?php endwhile; ?>

        </select>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read_livro.php">Ver registros.</a>

</body>

</html>