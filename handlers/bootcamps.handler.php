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

//eliminar un bootcamp

function deletebootcamp($id){
  $conn = conectarbase();

  $sql = "DELETE FROM bootcamps WHERE id_bootcamp = '$id'";

  $resulta = mysqli_query($conn, $sql);

  if (!$resulta) {

    die("error al borrar un bootcamp;".mysqli_error($conn));

  }
  mysqli_close($conn);
  return $resulta;

}

//FUNCION MODIFICAR UN BOOTCAMP

function modificar($data){
$conn = conectarbase();

  $id = $data['slug'];
  $title = $data['title'];
  $description = $data['description'];
  $start_bootcamp = $data['start_bootcamp'];
  $end_bootcamp = $data['end_bootcamp'];
  $modules = $data['modules'];

  $sql = "UPDATE bootcamps SET title= '$title', description= '$description', start_bootcamp= '$start_bootcamp', end_bootcamp= '$end_bootcamp', modules= '$modules' WHERE id_bootcamp = '$id'";

  $resulta = mysqli_query($conn, $sql);

  if (!$resulta) {
    die("error al modificar el bootcamp".mysqli_error($conn));
  }

  mysqli_close($conn);
  return $resulta;

}







?>