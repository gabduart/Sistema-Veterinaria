<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Veterinária | Consultar Veterinário</title>

  <!--BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark p-3" data-bs-theme="dark">
  <main class="col-4">
    <form action="javascript:void(0);">
      <div class="mb-3">
        <label for="txtNome" class="form-label">Buscar por Nome</label>
        <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Nome do Veterinário" onkeyup="search()" required>
      </div>
    </form>

    <table class="table" id="tableDate">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          include_once("../conn.php");
          $sql = mysqli_query($conn, "SELECT * FROM tbveterinario");
          while ($row = mysqli_fetch_array($sql)) {
            $cod = $row['codVet'];
            $nome = $row['nomeVet'];
            echo "<p>";
              echo "
                <tr>
                  <th scope=\"row\">$cod</th>
                  <td>$nome</td>
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
      var input = document.getElementById("txtNome");
      var filter = input.value.toUpperCase();
      var table = document.getElementById("tableDate");
      var rows = table.getElementsByTagName("tr");

      for (var i = 1; i < rows.length; i++) {
        var name = rows[i].getElementsByTagName("td")[0];
        if (name) {
          var textValue = name.textContent || name.innerText;
          if (textValue.toUpperCase().indexOf(filter) > -1) {
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