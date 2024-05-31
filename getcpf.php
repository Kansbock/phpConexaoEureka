<?php
include 'conn2.php';

if(isset($_GET['cpf'])){
    $cpf = $_GET['cpf'];

    $stmt = $conn2->prepare("SELECT cpf FROM usuarios WHERE cpf = ?");
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    $res = array();
    while ($row = $result->fetch_assoc()) {
        $res[] = $row;
    }

    echo json_encode($res);

    $stmt->close();
    $conn2->close();
} else {
    echo "cpf não encontrado";
}
?>
