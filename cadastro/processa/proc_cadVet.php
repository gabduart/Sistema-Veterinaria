<?php 
    include_once("../../conn.php");

    $nome = $_POST['txtNome'];

    $result_vet = "INSERT INTO tbveterinario(nomeVet) VALUES ('$nome')";
    $resltado_vet = mysqli_query($conn, $result_vet);

    if(mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.html'>
            <script type=\"text/javascript\">
                alert(\"Veterinário cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadVet.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar veterinário!\");
            </script>
        ";
    }
?>