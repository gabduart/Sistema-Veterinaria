<?php 
    include_once("../../conn.php");

    $txtNomeA = $_POST['txtNomeA'];
    $fileFoto = $_POST['fileFoto'];
    $slctTipoA = $_POST['slctTipoA'];
    $slctCliente = $_POST['slctCliente'];

    $result_Animal = "INSERT INTO tbanimal(nomeAnimal, fotoAnimal, codTipoAnimal, codCliente) VALUES ('$txtNomeA', '$fileFoto', '$slctTipoA', '$slctCliente')";
    $resultado_Animal = mysqli_query($conn, $result_Animal);

    if(mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.html'>
            <script type=\"text/javascript\">
                alert(\"Animal cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadAnimal.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar animal!\");
            </script>
        ";
    }
?>