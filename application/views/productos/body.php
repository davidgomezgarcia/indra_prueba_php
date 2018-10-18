<div class="row">
  <div class="col col-xs-12 col-md-1">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importacion">
        Importar
    </button>
  </div>
  <div class="col col-xs-12 col-md-2">
    <form method="get">
      <div class="input-group mb-3">
        <input type="text" name="buscar" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $buscar?>" >
         <input type="submit" class="btn btn-primary" value="Buscar">
      </div>
    </form>
  </div>
</div>



<?php if(isset($mensaje)){ echo $mensaje; }?>

<!-- Modal -->
<div class="modal fade" id="importacion" tabindex="-1" role="dialog" aria-labelledby="importacionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importación de productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>productos/importar" method="post">
      <div class="modal-body">
        
          <label for="basic-url">URL de importación</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">www</span>
            </div>
            <input type="text" name="url" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Importar">
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container">
  <?php if($productos>0){?>
<table id="productos" class="table table-striped">
  <thead>
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   foreach ($productos as $key) {
     echo '<tr><td>'.$key['codigo'].'</td><td>'.$key['nombre'].'</td><td>'.$key['descripcion'].'</td><td> <a href="'.base_url().'productos/editar/?id='.$key['id'].'">editar</a>, <a href="'.base_url().'productos/borrar/?id='.$key['id'].'">borrar</a></td></tr>';
   }
   ?>
  </tbody>
</table>
</div>
<?php }else{?>
<h3>No hay productos, por favor realize una importación</h3>
<?php } ?>
<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script>
  $(document).ready(function() 
    { 
        $("#productos").tablesorter(); 
    } 
); 

</script>