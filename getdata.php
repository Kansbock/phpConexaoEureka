<?php
include 'conn.php';

// Verifica se o parâmetro "nome" está presente na URL
if(isset($_GET['nome'])) {
    // Obtém o nome da URL e evita injeção de SQL
    $nome = $conn->real_escape_string($_GET['nome']);

    // Consulta SQL modificada para incluir a condição do nome
    $sql = $conn->query("
        SELECT
            Eureka_2023.trabalhos.idTrabalho AS idTrabalho,
            Eureka_2023.trabalhos.numeroEstande AS numeroEstande,
            CONCAT(
                b.codigoHabilitacao,
                Eureka_2023.trabalhos.periodo,
                CONVERT(
                    IF(
                        (Eureka_2023.trabalhos.numeroTG < 10),
                        CONCAT('0', Eureka_2023.trabalhos.numeroTG),
                        Eureka_2023.trabalhos.numeroTG
                    )
                    USING latin1
                )
            ) AS grupoTrabalho,
            b.codigoHabilitacao AS curTrabalho,
            Eureka_2023.usuarios.idUsuario AS idAluno,
            Eureka_2023.usuarios.nome AS nomeAluno,
            Eureka_2023.usuarios.registro AS raAluno,
            hab_alu.codigoHabilitacao AS curAluno,
            orientadores.idUsuario AS idOrientador,
            orientadores.nome AS nomeOrientador,
            orientadores.registro AS rfOrientador,
            Eureka_2023.trabalhos.titulo AS tituloTrabalho,
            Eureka_2023.trabalhos.Descricao AS descricaoTrabalho,
            CAST(
                RIGHT(
                    DATABASE(),
                    4
                ) AS UNSIGNED
            ) AS anoLetivo
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
            Eureka_2023.usuarios orientadores
        ON
            orientadores.idUsuario = Eureka_2023.trabalhos.orientador
        JOIN
            Eureka_2023.habilitacoes b
        ON
            Eureka_2023.trabalhos.idHabilitacao = b.idHabilitacao
        JOIN
            Eureka_2023.habilitacoes hab_alu
        ON
            Eureka_2023.usuarios.idHabilitacao = hab_alu.idHabilitacao
        WHERE
            Eureka_2023.trabalhos.ativo = 1
            AND b.codigoHabilitacao NOT IN ('IMT', 'IE')
            AND Eureka_2023.usuarios.nome LIKE '%$nome%'
    ");

    // Array para armazenar os resultados
    $res = array();
    
    // Loop para recuperar os resultados da consulta
    while($row = $sql->fetch_assoc()){
        $res[] = $row;
    }

    // Retorna os resultados em formato JSON
    echo json_encode($res);
} else {
    // Se o parâmetro "nome" não estiver presente na URL, retorna uma mensagem de erro
    echo "Por favor, forneça um nome na URL.";
}
?>
