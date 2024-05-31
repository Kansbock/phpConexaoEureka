<?php
include 'conn2.php';

if(isset($_GET['email'])){
    $email = $_GET['email'];

    $stmt = $conn2->prepare("SELECT email, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
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
    echo "email não encontrado";
}
?>
