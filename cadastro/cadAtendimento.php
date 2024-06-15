<?php 
    include_once("../conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Veterinária | Cadastrar Atendimento</title>

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark p-3" data-bs-theme="dark">
    <form class="col-3" action="processa/proc_cadAtd.php" method="post">
        <div class="mb-3">
            <label for="dtDataAtd" class="form-label">Data do Atendimento</label>
            <input type="date" class="form-control" id="dtDataAtd" name="dtData" required>
        </div>
        <div class="mb-3">
            <label for="tmHoraAtd" class="form-label">Hora do Atendimento</label>
            <input type="time" class="form-control" id="tmHoraAtd" name="tmHora" min="09:00" max="18:00" required>
        </div>
        <div class="mb-3">
            <label for="slctAnimal" class="form-label">Selecione o Animal</label>
            <select class="form-select" id="ID_slctAnimal" name="slctAnimal" required>
                <option selected>Nada Selecionado</option>
                <?php 
                    $result_animal = "SELECT * FROM tbanimal";
                    $resultado_animal = mysqli_query($conn, $result_animal);
                    while ($row_animal = mysqli_fetch_assoc($resultado_animal)) { ?>
                        <option value="<?php echo $row_animal['codAnimal'];?>">
                            <?php echo $row_animal['nomeAnimal'];?>
                        </option> <?php 
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="slctVet" class="form-label">Selecione o Veterinário</label>
            <select class="form-select" id="ID_slctVet" name="slctVet">
                <option selected>Nada Selecionado</option>
                <?php 
                    $result_veterinario = "SELECT * FROM tbveterinario";
                    $resultado_veterinario = mysqli_query($conn, $result_veterinario);
                    while ($row_veterinario = mysqli_fetch_assoc($resultado_veterinario)) { ?>
                        <option value="<?php echo $row_veterinario['codVet'];?>">
                            <?php echo $row_veterinario['nomeVet'];?>
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