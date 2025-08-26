<?php

include '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $nacionalidade = $_POST['nacionalidade'];
    $ano_nascimento = $_POST['ano_nascimento'];

    $sql = " INSERT INTO autores (nome,nacionalidade,ano_nascimento) VALUE ('$name','$nacionalidade','$ano_nascimento')";

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

    <form method="POST" action="create_autor.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="nacionalidade">nascionalidade:</label>
        <input type="text" name="nacionalidade">

        <label for="ano_nascimento">data de nascimento:</label>
        <input type="date" name="ano_nascimento" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_autor.php">Ver registros.</a>

</body>

</html>