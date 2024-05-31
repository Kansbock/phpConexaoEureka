<?php
include 'conn2.php';

if(isset($_GET['email'], $_GET['nova_senha'])){

    $email = $_GET['email'];
    $nova_senha = $_GET['nova_senha'];

    $sql = $conn2->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
    $sql->bind_param("ss", $nova_senha, $email);

    $sql->execute();

    if ($sql->affected_rows > 0) {
        echo json_encode(array("message" => "Senha atualizada com sucesso"));
    } else {
        echo json_encode(array("message" => "Falha ao atualizar a senha. Verifique o email fornecido."));
    }

} else {
    echo "Parâmetros não fornecidos.";
}
?>
