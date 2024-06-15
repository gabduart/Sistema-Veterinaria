<?php 
    include_once("../../conn.php");

    $data = $_POST['dtData'];
    $hora = $_POST['tmHora'];
    $codAnimal = $_POST['slctAnimal'];
    $codVet = $_POST['slctVet'];

    $result_Atd = "INSERT INTO tbatendimento(dataAtendimento, horaAtendimento, codAnimal, codVet) VALUES ('$data', '$hora', '$codAnimal', '$codVet')";
    $resultado_Atd = mysqli_query($conn, $result_Atd);

    if(mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.html'>
            <script type=\"text/javascript\">
                alert(\"Atendimento cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadAtendimento.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar atendimento!\");
            </script>
        ";
    }
?>