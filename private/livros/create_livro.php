<?php

include '../../config/db.php';

$autores = $conn->query("SELECT id, nome FROM autores");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $autor_id = $_POST['autor_id'];

    $sql = " INSERT INTO livros (titulo,genero,ano_publicacao,autor_id) VALUE ('$titulo','$genero','$ano_publicacao','$autor_id')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="create_livro.php">

        <label for="titulo">titulo:</label>
        <input type="text" name="titulo" required>

        <label for="genero">genero:</label>
        <input type="text" name="genero">

        <label for="ano_publicacao">data de publicação:</label>
        <input type="date" name="ano_publicacao" required>

        <label for="autor_id">autor:</label>
        <select name="autor_id" required>
            <option value="">Selecione</option>
            <?php while ($row = $autores->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= ($row['nome']) ?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_livro.php">Ver registros.</a>

</body>

</html>