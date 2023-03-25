<?php
    $title ="Reportes | ";
    include "head.php";
    include "sidebar.php";

    $priorities = mysqli_query($con,  "select * from priority");
    $statuses = mysqli_query($con, "select * from status");
    $users =mysqli_query($con, "select * from user");
    $categories =mysqli_query($con, "select * from category");
    $gorila="jeje"
?>  


    <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Reportes</h2>


 <p class="respuesta">

    <p>

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <!-- form search -->
                        <form id="reports_id" name="reports_id" class="form-horizontal" role="form" method="post" action="">
                            <input type="hidden" name="view" value="reports">
                            <div class="form-group">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                    <select id="users_id" name="users_id" class="form-control">
                                    <option value="todos">Todos los responsables</option>
                                      <?php foreach($users as $p):?>
                                        <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["users_id"]) && $_GET["users_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-support"></i></span>
                                    <select id="category_id" name="category_id" class="form-control">
                                    <option value="todos">Todas las categorias</option>
                                      <?php foreach($categories as $p):?>
                                        <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["priority_id"]) && $_GET["priority_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                  <span class="input-group-addon">INICIO</span>
                                  <input type="date" id="start_at" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                  <span class="input-group-addon">FIN</span>
                                  <input type="date" id="finish_at"  name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">ESTADO</span>
                                        <select id="status_id" name="status_id" class="form-control">
                                            <option value="todos">Todos</option>
                                          <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p['id']){ echo "selected"; } ?>><?php echo $p['name']; ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-lg-3">
                                    <input  id="procesar"  type=""  name="procesar" class="btn btn-primary" id="procesar" value="Procesar"/>
                                </div>
                            </div>
                        </form>
                        <!-- end form search -->

     <?php

 $users= array();
     ?>

       
    
        <div class="x_content">

     <table id="mytable" class="display" cellspacing="0" width="100%">
  <thead>
    <tr class="table-file">
      <th>Titulo</th>
      <th >Categoria</th>
      <th>Descripcion</th>
      <th>Responsable</th>
      <th>Fecha de creacion</th>
      <th>Estado </th>
    </tr>
  </thead>
 

</table>

            <div class="table-responsive">

        

    <!-- </table>-->
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>

<script type="text/javascript">
    $(document).ready(function () {
   console.log("se ejecuto la funcion datatable")
       datatable = $("#mytable").DataTable({
    dom: 'Bfrtip',

 buttons: [
                {
                    extend: 'pdf',
                    text: "<image class='transparente' src='dataTables/images/pdf.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'excel',
                    text: "<image class='transparente' src='dataTables/images/excel.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'csv',
                    text: "<image class='transparente' src='dataTables/images/csv.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'print',
                    text: "<image class='transparente' src='dataTables/images/print.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'copy',
                    text: "<image class='transparente' src='dataTables/images/copy.png' width='40px' height='40px'> </image>"
                }
            ],


  });

});

/*
    var datatable = $("#mytable").DataTable({
    ajax: "data.php",
    columns: [{ data: "name" }, { data: "lastname" }, { data: "city" }, { data: "gender" }],
    dom: 'Bfrtip',

 buttons: [
                {
                    extend: 'pdf',
                    text: "<image class='transparente' src='dataTables/images/pdf.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'excel',
                    text: "<image class='transparente' src='dataTables/images/excel.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'csv',
                    text: "<image class='transparente' src='dataTables/images/csv.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'print',
                    text: "<image class='transparente' src='dataTables/images/print.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'copy',
                    text: "<image class='transparente' src='dataTables/images/copy.png' width='40px' height='40px'> </image>"
                }
            ],


  });
*/


 /*   var nombre = document.getElementById("users_id");
    var category_id =document.getElementById("category_id");
    var status_id = document.getElementById("status_id");
    var start_at  = document.getElementById("start_at");
    var finish_at = document.getElementById("finish_at");   
 */

/*

  $('#procesar').click(function(){
     console.log("Se pico el ajax");
        $.ajax({
            type: "POST",
            url: 'data.php',
            data: "nombre="+nombre+"&category_id="+category_id,

            success: function(response)
            {
                console.log("Se ejecuto el ajax");
                var jsonData = JSON.parse(response);
                // user is logged in successfully in the back-end 
                // let's redirect 

              
           }
       });
     });

*/


$('#procesar').on('click',function(e){

    var users_id = document.getElementById("users_id").value;
    var category_id =document.getElementById("category_id").value;
    var status_id = document.getElementById("status_id").value;
    var start_at = document.getElementById("start_at").value;
    var finish_at = document.getElementById("finish_at").value;

    console.log("users_id :",users_id);
    console.log("category_id :",category_id);
    console.log("status_id :",status_id);
    console.log("start_at :",start_at);
    console.log("finish_at :",finish_at);
    //e.preventDefault();
    $.ajax({
        beforeSend: function(){
        console.log("aun no se ha mandado")
        },
        url:'data.php',
        type:'POST',
        cache:false,
        async: true,
        data:{usuarios:users_id,categoria:category_id,status_id:status_id,start_at:start_at,finish_at:finish_at},

        sucess: function (data){


            console.log("ok correcto")
            console.log(data.message)
        },
        error:function(jqXHR,estado,error){
            console.log(estado);
            console.log(error);
        },
        complete: function(jqXHR,estado){
            console.log(estado)
            console.log(jqXHR);
            console.log("Se ha completado el envio")

        },
        timeout:10000

    }).done(function(data){
        console.log("Se ejecuto el done.")
        console.log(data)
        var lista2= document.getElementById("mytable");    // antiguo id :  repo_tares
        var i=0,cadena_final="";
        cadena_final += "<thead>" + "<tr class='table-file'>" +"<td>"+ "Titulo"  +"<td>" + "Categoria" +"<td>"+ "Descripcion" +"<td>"+
          "Responsable"  +"<td>"+"Fecha de creacion"  +"<td>"+ "Estado" + "</tr>"+"</thead>";
    
         while(i<data.length)
                 {
                  cadena_final += "<tr class='table-content'>" +"<td>" + data[i].titulo   +"<td>"+ data[i].responsable +"<td>"+ data[i].categoria + "<td>"+ data[i].descripcion  + "<td>"+
                  data[i].prioridad  +"<td>" + data[i].estado + "</tr>";
                  i++;
                 }
               lista2.innerHTML = cadena_final;
        datatable.destroy();
       datatable = $("#mytable").DataTable({
    dom: 'Bfrtip',

 buttons: [
                {
                    extend: 'pdf',
                    text: "<image class='transparente' src='dataTables/images/pdf.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'excel',
                    text: "<image class='transparente' src='dataTables/images/excel.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'csv',
                    text: "<image class='transparente' src='dataTables/images/csv.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'print',
                    text: "<image class='transparente' src='dataTables/images/print.png' width='40px' height='40px'> </image>"
                },
                {
                    extend: 'copy',
                    text: "<image class='transparente' src='dataTables/images/copy.png' width='40px' height='40px'> </image>"
                }
            ],


  });
      





    });

})

    
    <!-- INCLUIR LAS LIBRERIAS QUE FALTAN -->

</script>
