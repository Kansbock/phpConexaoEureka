<?php
include 'conn2.php';

if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['perfil'], $_POST['email'], $_POST['senha'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $perfil = $_POST['perfil'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $sql = $conn2->prepare("INSERT INTO usuarios (nome_completo, cpf, celular, perfil, email, senha) 
                            VALUES (?, ?, ?, ?, ?, ?)");

    $sql->bind_param("ssssss", $nome, $cpf, $telefone, $perfil, $email, $senha);

    $sql->execute();

    if ($sql) {
        echo json_encode(array("message" => "Data inserted successfully"));
    } else {
        echo json_encode(array("message" => "Failed to insert data"));
    }

} else {
    echo "Parameters not provided.";
}
?>
