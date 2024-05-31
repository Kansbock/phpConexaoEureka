<?php
include 'conn2.php';


if(isset($_GET['estandes'])){
    $estande = $_GET['estandes'];

    $sql = $conn2->query("select x, y from coordenadas where estandes=$estande;
");

    $res = array();
    while ($row = $sql->fetch_assoc()) {
        $res[] = $row;
    }
    echo json_encode($res);
} else {
    echo "Estande não fornecido na URL.";
}
?>
