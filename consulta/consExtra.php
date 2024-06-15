<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Veterinária | Consulta Atendimento</title>

  <!--BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark p-3" data-bs-theme="dark">
  <main class="col-6">
    <form action="javascript:void(0);">
      <div class="mb-3 col-6">
          <label for="txtNomeVet" class="form-label">Buscar por Veterinário</label>
          <input type="text" class="form-control" id="txtNomeVet" name="txtNomeVet" placeholder="Nome do Veterinário" onkeyup="search()" required>
        </div>
    </form>

    <table class="table" id="tablenameVet">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Data</th>
          <th scope="col">Hora</th>
          <th scope="col">Nome do Animal</th>
          <th scope="col">Nome do Veterinário</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          include_once("../conn.php");
          $sql = mysqli_query($conn, "SELECT a.codAtendimento, a.dataAtendimento, a.horaAtendimento, an.nomeAnimal, 
          v.nomeVet FROM tbatendimento a INNER JOIN tbanimal an ON an.codAnimal = a.codAnimal INNER JOIN tbveterinario v ON v.codVet = a.codVet ORDER BY a.codAtendimento");
          while ($row = mysqli_fetch_array($sql)) {
            $codAtendimento = $row['codAtendimento'];
            $dataAtendimento = $row['dataAtendimento'];
            $horaAtendimento = $row['horaAtendimento'];
            $nomeAnimal = $row['nomeAnimal'];
            $nomeVet = $row['nomeVet'];
            echo "<tr>
                    <th scope=\"row\">$codAtendimento</th>
                    <td>$dataAtendimento</td>
                    <td>$horaAtendimento</td>
                    <td>$nomeAnimal</td>
                    <td>$nomeVet</td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </main>

  <!--BOOTSTRAP-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function search() {
      var input = document.getElementById("txtNomeVet");
      var filter = input.value.toUpperCase();
      var table = document.getElementById("tablenameVet");
      var rows = table.getElementsByTagName("tr");

      for (var i = 1; i < rows.length; i++) {
        var nameVet = rows[i].getElementsByTagName("td")[3];
        if (nameVet) {
          var nameVetValue = nameVet.textContent || nameVet.innerText;
          if (nameVetValue.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = "";
          } else {
            rows[i].style.display = "none";
          }
        }
      }
    }
  </script>
</body>
</html>