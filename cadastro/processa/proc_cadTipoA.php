<?php 
    include_once("../../conn.php");

    $tipo = $_POST['txtTipo'];

    $result_tipoA = "INSERT INTO tbtipoanimal(tipoAnimal) VALUES ('$tipo')";
    $resltado_tipoA = mysqli_query($conn, $result_tipoA);

    if(mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.html'>
            <script type=\"text/javascript\">
                alert(\"Tipo de animal cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadTipoA.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar Tipo de Animal!\");
            </script>
        ";
    }
?>