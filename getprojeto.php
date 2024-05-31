<?php
include 'conn.php';

// Verifica se o ID do projeto foi passado pela URL
if(isset($_GET['tituloTrabalho'])){
    // Obtém o ID do projeto da URL
    $ProjetoEspecifico = $_GET['tituloTrabalho'];

    // Executa a consulta SQL
    $sql = $conn->query("SELECT
    MAX(Eureka_2023.trabalhos.idTrabalho) AS idTrabalho,
    MAX(Eureka_2023.trabalhos.numeroEstande) AS numeroEstande,
    MAX(CONCAT(
        b.codigoHabilitacao,
        Eureka_2023.trabalhos.periodo,
        LPAD(Eureka_2023.trabalhos.numeroTG, 2, '0')
    )) AS grupoTrabalho,
    MAX(b.codigoHabilitacao) AS curTrabalho,
    MAX(Eureka_2023.trabalhos.titulo) AS tituloTrabalho,
    MAX(Eureka_2023.trabalhos.Descricao) AS descricaoTrabalho,
    MAX(orientadores.nome) AS orientador, -- Adicionando o nome do orientador
    YEAR(CURRENT_DATE()) AS anoLetivo
FROM
    Eureka_2023.usuarios
JOIN
    Eureka_2023.trabalhos_usuarios
ON
    Eureka_2023.usuarios.idUsuario = Eureka_2023.trabalhos_usuarios.idUsuario
JOIN
    Eureka_2023.trabalhos
ON
    Eureka_2023.trabalhos.idTrabalho = Eureka_2023.trabalhos_usuarios.idTrabalho
JOIN
    Eureka_2023.usuarios AS orientadores
ON
    orientadores.idUsuario = Eureka_2023.trabalhos.orientador
JOIN
    Eureka_2023.habilitacoes AS b
ON
    Eureka_2023.trabalhos.idHabilitacao = b.idHabilitacao
JOIN
    Eureka_2023.habilitacoes AS hab_alu
ON
    Eureka_2023.usuarios.idHabilitacao = hab_alu.idHabilitacao
WHERE
    Eureka_2023.trabalhos.ativo = 1
    AND b.codigoHabilitacao NOT IN ('IMT', 'IE')
    AND Eureka_2023.trabalhos.titulo LIKE '%$ProjetoEspecifico%'
GROUP BY
    Eureka_2023.trabalhos.titulo, Eureka_2023.trabalhos.orientador;
"); // Limitar a consulta para buscar apenas a primeira linha

    $res = array();
    while ($row = $sql->fetch_assoc()) {
        $res[] = $row;
    }
    echo json_encode($res);
} else {
    echo "ID do projeto não fornecido na URL.";
}
?>
