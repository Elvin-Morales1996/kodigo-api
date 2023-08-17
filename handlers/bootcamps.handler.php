<?php 

require_once('./conexion.php');

//funcion para obtener los bootcamps

function getBootcamps(){
//conexcio a la base de datos
$conn = conectarbase();

//CONSULTA
$sql = "SELECT * FROM bootcamps";

//RESULTADO DE LA CONSULTA
$resulta = mysqli_query($conn,$sql);


//mostrar el resultado en tabla
//MYSQLI_ASSOC: ARREGLO
$bootcamps = mysqli_fetch_all($resulta, MYSQLI_ASSOC);

mysqli_free_result($resulta);

// no olvidar cerrar la conexion a la base de datos
mysqli_close($conn);

//arreglo a la consuklta de la base de datos
return $bootcamps;

}


/* funcion para agregar un nuevo bootcampo */


function addNewBootcamp($data) {
  $conn = conectarbase();

  $title = $data['title'];
  $description = $data['description'];
  $start_bootcamp = $data['start_bootcamp'];
  $end_bootcamp = $data['end_bootcamp'];
  $modules = $data['modules'];

  $sql = "INSERT INTO bootcamps (title, description, start_bootcamp, end_bootcamp, modules) VALUES ('$title', '$description', '$start_bootcamp', '$end_bootcamp', '$modules')";

  $result = mysqli_query($conn, $sql);
  // handle error
  if (!$result) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);

  return $result;
}











?>