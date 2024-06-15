<?php 
    include_once("../../conn.php");

    $nome = $_POST['txtNome'];
    $tel = $_POST['telCelular'];
    $email = $_POST['emEmail'];

    $result_cliente = "INSERT INTO tbcliente(nomeCliente, telefoneCliente, emailCliente) VALUES ('$nome', '$tel', '$email')";
    $resltado_cliente = mysqli_query($conn, $result_cliente);

    if(mysqli_affected_rows($conn) != 0) {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../index.html'>
            <script type=\"text/javascript\">
                alert(\"Cliente cadastrado com sucesso!\");
            </script>
        ";
    } else {
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cadCliente.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao cadastrar cliente!\");
            </script>
        ";
    }
?>