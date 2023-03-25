<?php
include "config/config.php";
$test = array(
        "data"=>array(
            array(
                "name"=>"Peter",
                "lastname"=>"Griffin",
                "city"=>"Quahog",
                "gender"=>"male"
            ),
            array(
                "name"=>"Homer",
                "lastname"=>"Simpson",
                "city"=>"Springfield",
                "gender"=>"male"
            ),
            array(
                "name"=>"Turanga",
                "lastname"=>"Leela",
                "city"=>"New New York",
                "gender"=>"female"
            )
        )
);
//header('Content-type: application/json');
//echo json_encode($test);


    $user_id= $_POST['usuarios'];
    $category_id= $_POST['categoria'];
    $status_id= $_POST['status_id'];
                /*....... Datos obligatorios del filtro ....*/
    $start_at= $_POST['start_at'];
    $finish_at= $_POST['finish_at'];
 

                /*.......................... Query base  ..................................*/
                $sql = "SELECT ticket.title as titulo,user.name as responsable,category.name as categoria ,priority.name as prioridad,status.name as estado,ticket.description as descripcion,ticket.created_at as fecha_creacion,ticket.updated_at as fecha_actualizacion FROM ticket INNER JOIN user ON ticket.responsable_id= user.id ";
                $sql .= "INNER JOIN category ON ticket.category_id= category.id ";
                $sql .= "INNER JOIN priority ON ticket.priority_id= priority.id ";
                $sql .= "INNER JOIN status ON ticket.status_id= status.id ";
                $sql .= "where ticket.created_at BETWEEN CAST('".$start_at."' AS datetime)" ;
                $sql .= " AND CAST('".$finish_at."' AS datetime)";
                /* ..........................  Filtro completo  ..............................*/
                if($user_id!="todos"){
                    $sql .= " AND ticket.responsable_id =".$user_id."" ;
                }
                if($category_id!="todos"){
                    $sql .= " AND ticket.category_id = ".$category_id."";
                }
                if($status_id!="todos"){
                    $sql .= " AND ticket.status_id = ".$status_id."";
                }


//$result_array = array();
$data_array = array();
$data = mysqli_query($con, $sql);
$datos = array();
while ($t = mysqli_fetch_assoc($data)) {
      $datos[]=$t;
     //$data_array[] = array($t->nombre,$t->id)
    }

 //$new_array  = array("data"=>$datos);   

/*

if (mysqli_num_rows($data) > 0) {
    $datos = array();

    while($row = mysqli_fetch_assoc($datos)) {
        array_push($result_array, $row);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($result_array);

*/




echo json_encode($datos);


header('Content-type: application/json');



?>