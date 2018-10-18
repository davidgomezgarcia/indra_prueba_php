<div class="row">
  <div class="col col-xs-12 col-md-1">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
     Nuevo cliente
    </button>
  </div>
  <div class="col col-xs-12 col-md-2">
    <form methos="post">
      <div class="input-group mb-3">
        <input type="text" name="buscar" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $buscar?>" >
         <input type="submit" class="btn btn-primary" value="Buscar">
      </div>
    </form>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url()?>clientes/nuevo" method="post">
      <div class="modal-body">
        
          <label for="basic-url">Nombre</label>
          <div class="input-group mb-3">
            
            <input type="text" name="nombre" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
          </div>
          <label for="basic-url">Primer apellido</label>
          <div class="input-group mb-3">
            
            <input type="text" name="apellido1" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
          </div>
          <label for="basic-url">Segundo apellido</label>
          <div class="input-group mb-3">
            
            <input type="text" name=apellido2 class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
          </div>
          <label for="basic-url">DNI</label>
          <div class="input-group mb-3">
            
            <input type="text" name="dni" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
          </div>
          <label for="basic-url">Dirección</label>
          <div class="input-group mb-3">
            
            <input type="text" name="direccion" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div>
          <label for="basic-url">Teléfono</label>
          <div class="input-group mb-3">
           
            <input type="text" name="telefono" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div>
           <label for="basic-url">email</label>
          <div class="input-group mb-3">
           
            <input type="text" name="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container">
  <?php if($clientes>0){?>
<table id="clientes" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">DNI</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">email</th>
      <th scope="col">acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   foreach ($clientes as $key) {
     echo '<tr><td>'.$key['nombre'].'</td><td>'.$key['apellido1'].' '.$key['apellido2'].'</td><td>'.$key['dni'].'</td><td>'.$key['direccion'].'</td><td>'.$key['telefono'].'</td><td>'.$key['email'].'</td><td><a href="'.base_url().'clientes/detalles/?id='.$key['id'].'">ver</a>, <a href="'.base_url().'clientes/editar/?id='.$key['id'].'">editar</a>, <a href="'.base_url().'clientes/borrar/?id='.$key['id'].'">borrar</a></td></tr>';
   }
   ?>
  </tbody>
</table>
</div>
<?php }else{?>
<h3>No hay clientes</h3>
<?php } ?>
<script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });
</script>
<script>
  $(document).ready(function() 
    { 
        $("#clientes").tablesorter(); 
    } 
); 
</script>