<?php
// MI PRIMER ENDPOINT
//elvin
// HEADER
//prueba de github
header('Content-Type: application/json');

$endpoint = $_SERVER['REQUEST_URI'];

// VAMOS A CREAR LA KODIGO-API

// ENDPOINT - GET ALL BOOTCAMPS
// ENDPINT - CREATE A BOOTCAMP
// ENDPOINT - EDIT A BOOTCAMP
// EDNPOINT - DELETE A BOOTCAMP

//probar base de datos


switch ($endpoint) {
    //GET: OBTENER LOS DATOS
case '/api/v1/bootcamps':
    //200 es ok el estado 
    http_response_code(200);
require_once('./handlers/bootcamps.handler.php');
$bootcamps = getBootcamps();
echo json_encode($bootcamps);
    break;

    //POST: CREAR UN NUEVO DATOS O REGISTRO
case '/api-v1/bootcamps/create':
    //estados 201: es creado
    http_response_code(201);
    require_once('./handlers/bootcamps.handler.php');
    //recibiendo un contenido de algo
    $data = json_decode(file_get_contents('php://input'), true);
   $resulta =  addNewBootcamp($data);
   echo json_encode($resulta);
    break;

    //PUT: MODIFICAR
case '/api-v1/bootcamps/update/4':
    //estado ok
    http_response_code(200);
    require_once './handlers/bootcamps.handler.php';
    $url = $_SERVER['REQUEST_URI'];
    $slug = basename(parse_url($url, PHP_URL_PATH));

    $data['slug']=$slug;

    $resulta = modificar($data);
    echo json_encode([
        'mensaje' => 'bootcamp modificado',
        'operacion' => $resulta
    ]);


    echo json_encode([
            'message' => 'modificar un bootcamps'
    ]);
    break;

    //DELETE: ELIMINAR UN REGISTRO
case '/api-v1/bootcamps/delete/2':
    //estado 200: ok
    http_response_code(200);
    //RECIBE PARA METRO DESDE LA URL 
    $url = $_SERVER['REQUEST_URI'];
    $slug = basename(parse_url($url, PHP_URL_PATH));
    require_once ('./handlers/bootcamps.handler.php');
    $resulta = deletebootcamp($slug);
    echo json_encode([
        "mensaje" => "bootcamp eliminado exitosamente",
        "operacion" =>$resulta
    ]);
    break;
default:
//codigo de gatito para mensajes
http_response_code(404);
echo json_encode([
    'message' => 'empoint no encontrado'
]);
break;
}

?>