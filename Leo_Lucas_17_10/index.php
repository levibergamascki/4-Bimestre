<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Projeto</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1"/> 
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet icon" href=""/>
  <?php include 'conexao.php';?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
    
<body>
<form name="maikon" method="get" action="">
<div class="row">
<div class='col'>
<label class="form-label">Cargo</label>
<select class="form-select" name="sltCargo">
  <option selected value="">Selecione</option>
  <?php
    $consulta = $cn->query("select cargo from tbl_empregos group by cargo");
    while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
      echo "<option value='".$exibe['cargo']."'>".$exibe['cargo']."</option>";
    } 
  ?>
</select>
</div>
<div class='col'>
<label for="exampleInputEmail1" class="form-label">Area</label>
<select class="form-select" name="sltArea">
  <option selected value="">Selecione</option>
  <?php
    $consulta = $cn->query("select area from tbl_empregos group by area");
    while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
      echo "<option value='".$exibe['area']."'>".$exibe['area']."</option>";
    } 
  ?>
</select>   
</div>
<br><br>
<br><br>
<button type="submit" class="btn btn-primary">Buscar</button>
</div>
</form>
<br>
<div class="row">

  <?php 
  $cargo=$_GET['sltCargo'];
  $area=$_GET['sltArea'];
  if($cargo === "" || $area === ""){
    
  }
  else{
    $consulta = $cn->query("select * from tbl_empregos where Cargo = '$cargo' and Area = '$area'");
    $campos = ['Registro','Nome','Cargo','Area','Salario','Status'];
    echo "<table class='table'> <thead> <tr>";
    foreach($campos as &$nome)
      echo"<th scope='col'>$nome</th>";
    echo "<th scope='col'>Alterar</th> <th scope='col'>Excluir</th> </tr> </thead>";
    while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      foreach($campos as &$nome)
        echo "<th>".$exibe[$nome]."</th>";
      echo "<th><img style='width:35px; height:auto;' src='https://www.d-velop.de/wp-content/uploads/sites/10/2020/09/icon-digital-signieren-lila.png'></th>";
      echo "<th><img style='width:35px; height:auto;' src='https://images.vexels.com/media/users/3/153297/isolated/preview/b394f1c0280879beb70bc51813fe1f41---cone-de-tra--o-colorido-de-lixeira-by-vexels.png'></th>";
      echo "</tr>";
    }
    echo "</table>";
  }
  ?>
  

</div>

</body>
</html>
<style>

body{
  flex-direction:column;
}
</style>