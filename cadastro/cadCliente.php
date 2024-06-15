<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Veterinária | Cadastrar Cliente</title>

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark p-3" data-bs-theme="dark">
    <form action="processa/proc_cadCliente.php" method="post" class="col-3">
        <div class="mb-3">
            <label for="txtNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="txtNome" name="txtNome" required>
        </div>

        <div class="mb-3">
            <label for="telCelular" class="form-label">Telefone Celular</label>
            <input type="tel" class="form-control" id="telCelular" name="telCelular" placeholder="XX 9XXXX-XXXX" pattern="[0-9]{2}\s9[0-9]{4}-[0-9]{4}" required aria-describedby="telHelp">
            <div id="telHelp" class="form-text">Nunca compartilharemos seu número com mais ninguém.</div>
        </div>

        <div class="mb-3">
            <label for="emEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="emEmail" aria-describedby="emailHelp" name="emEmail" required>
            <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('telCelular').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d)/g, '$1 $2');
            }
            if (value.length > 7) {
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }
            e.target.value = value;
        });
    </script>
</body>
</html>