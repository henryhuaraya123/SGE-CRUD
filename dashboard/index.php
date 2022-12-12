<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, num_exp , materia_exp, nom_procesado, nom_agraviado, encargado, estado_exp, ubicacion, folios FROM expedientes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Registrar Expediente</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center" >
                            <tr>
                                <th>Id</th>
                                <th>Expediente</th>
                                <th>Materia</th>                                
                                <th>Procesado</th>  
                                <th>Agraviado</th>
                                <th>Encargado</th>
                                <th>Estado</th>
                                <th>Ubicación</th>
                                <th>Folios</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['num_exp'] ?></td>
                                <td><?php echo $dat['materia_exp'] ?></td>
                                <td><?php echo $dat['nom_procesado'] ?></td>
                                <td><?php echo $dat['nom_agraviado'] ?></td>
                                <td><?php echo $dat['encargado'] ?></td>
                                <td><?php echo $dat['estado_exp'] ?></td>    
                                <td><?php echo $dat['ubicacion'] ?></td>
                                <td><?php echo $dat['folios'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="formPersonas" >    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="num_exp" class="col-form-label">N° expediente:</label>
                    <input type="text" class="form-control" id="num_exp">
                    </div>
                    <div class="form-group">
                    <label for="materia_exp" class="col-form-label">Materia:</label>
                    <input type="text" class="form-control" id="materia_exp">
                    </div>                
                    <div class="form-group">
                    <label for="nom_procesado" class="col-form-label">Procesado:</label>
                    <input type="text" class="form-control" id="nom_procesado">
                    </div>
                    <div class="form-group">
                    <label for="nom_agraviado" class="col-form-label">Agraviado:</label>
                    <input type="text" class="form-control" id="nom_agraviado">
                    </div>
                    <div class="form-group">
                    <label for="encargado" class="col-form-label">Encargado:</label>
                    <input type="text" class="form-control" id="encargado">
                    </div>
                    <div class="form-group">
                    <label for="estado_exp" class="col-form-label">Estado del Expediente:</label>
                    <input type="text" class="form-control" id="estado_exp">
                    </div>
                    <div class="form-group">
                    <label for="ubicacion" class="col-form-label">Ubicación:</label>
                    <input type="text" class="form-control" id="ubicacion">
                    </div>
                    <div class="form-group">
                    <label for="folios" class="col-form-label">Folios:</label>
                    <input type="number" class="form-control" id="folios">
                    </div> 
           
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>