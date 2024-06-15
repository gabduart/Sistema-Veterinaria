<?php 
    include_once("../conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Veterinária | Cadastrar Animal</title>

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark p-3" data-bs-theme="dark">
    <form action="processa/proc_cadAnimal.php" method="post" class="col-3">
        <div class="mb-3">
            <label for="txtNomeA" class="form-label">Nome do Animal</label>
            <input type="text" class="form-control" id="txtNomeA" name="txtNomeA" required>
        </div>

        <div class="mb-3">
            <label for="fileFoto" class="form-label">Foto do Animal</label>
            <input class="form-control" type="file" id="fileFoto" name="fileFoto">
        </div>

        <div class="mb-3">
            <label for="slctTipoA" class="form-label">Selecione o Tipo do Animal</label>
            <select class="form-select" id="ID_slctTipoA" name="slctTipoA" required>
                <option selected>Nada Selecionado</option>
                <?php 
                    $result_animal = "SELECT * FROM tbtipoanimal";
                    $resultado_animal = mysqli_query($conn, $result_animal);
                    while ($row_animal = mysqli_fetch_assoc($resultado_animal)) { ?>
                        <option value="<?php echo $row_animal['codTipoAnimal'];?>">
                            <?php echo $row_animal['tipoAnimal'];?>
                        </option> <?php 
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="slctCliente" class="form-label">Selecione o Cliente</label>
            <select class="form-select" id="ID_slctCliente" name="slctCliente" required>
                <option selected>Nada Selecionado</option>
                <?php 
                    $result_cliente = "SELECT * FROM tbcliente";
                    $resultado_cliente = mysqli_query($conn, $result_cliente);
                    while ($row_cliente = mysqli_fetch_assoc($resultado_cliente)) { ?>
                        <option value="<?php echo $row_cliente['codCliente'];?>">
                            <?php echo $row_cliente['nomeCliente'];?>
                        </option> <?php 
                    }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>