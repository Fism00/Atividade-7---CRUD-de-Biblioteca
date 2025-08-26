<?php

include '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = " INSERT INTO leitores (nome,email,telefone) VALUE ('$name','$email','$telefone')";

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

    <form method="POST" action="create_leitor.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="email">email:</label>
        <input type="text" name="email">

        <label for="telefone">telefone: </label>
        <input type="number" name="telefone" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read_leitor.php">Ver registros.</a>

</body>

</html>