<?php require_once "vistas/parte_superior.php"?>

<?php
include('conexion.php');

$tmp = array();
$res = array();

$sel = $con->query("SELECT * FROM files");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);
}
?>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h1>Subir PDF de Expedientes</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Nuevo PDF
                    </button>
                    <input type="text" name="buscador" id="buscador" placeholder="Buscar...">

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Expediente</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha de subida</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($res as $val) { ?>
                                <tr class = "nexp">
                                    <td><?php echo $val['id'] ?> </td>
                                    <td><?php echo $val['title'] ?></td>
                                    <td><?php echo $val['description'] ?></td>
                                    <td><?php echo $val['fecha'] ?></td>
                                    <td><?php echo $val['usuario'] ?></td>
                                    <td>
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">
                            <div class="form-group">
                                <label for="title">Expediente N°</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="description">archivo</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
                            function onSubmitForm() {
                                var frm = document.getElementById('form1');
                                var data = new FormData(frm);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4) {
                                        var msg = xhttp.responseText;
                                        if (msg == 'success') {
                                            alert(msg);
                                            $('#exampleModal').modal('hide')
                                        } else {
                                            alert(msg);
                                        }

                                    }
                                };
                                xhttp.open("POST", "upload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }
                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/login_dashboard_crud-main/dashboard/'; ?>'+url+'#toolbar=0');
                            }


                            document.addEventListener("keyup", e=>{

                            if (e.target.matches("#buscador")){

                                if (e.key ==="Escape")e.target.value = ""

                                document.querySelectorAll(".nexp").forEach(buscar =>{

                                    buscar.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                                    ?buscar.classList.remove("filtro")
                                    :buscar.classList.add("filtro")
                                })

                            }
                            })
        </script>

        <style>
            .filtro
            {
                display: none;
            }
        </style>

<?php require_once "vistas/parte_inferior.php"?>