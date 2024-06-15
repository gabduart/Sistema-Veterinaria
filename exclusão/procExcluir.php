<?php 
  $cod = $_POST['codAtendimento'];
  $btn = $_POST['btn'];

  require_once('../conn.php');
  $sql = mysqli_query($conn, "SELECT * FROM tbatendimento");
  if ($btn!='')
	{
			mysqli_query($conn,"DELETE FROM tbatendimento WHERE codAtendimento='$cod'") or die("Erro na Exclusão");
			
      if(mysqli_affected_rows($conn) != 0) {
        echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=excluir.php'>
          <script type=\"text/javascript\">
              alert(\"Atendimento exluído com sucesso!\");
          </script>
        ";
        } else {
          echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=excluir.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao excluir atendimento!\");
            </script>
          ";
        }
	}

?>