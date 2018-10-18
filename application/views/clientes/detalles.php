

  <div class="row">
    <div class="col col-xs-12 col-md-6">
      <h3>Datos Cliente</h3>
      <div class="container">
        <label for="basic-url">Nombre</label>
        <div class="input-group mb-3">      
          <input type="text" name="nombre" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['nombre']?>" disabled>
        </div>
        <label for="basic-url">Primer apellido</label>
        <div class="input-group mb-3">    
            <input type="text" name="apellido1" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['apellido1']?>" disabled>
        </div>
        <label for="basic-url">Segundo apellido</label>
        <div class="input-group mb-3">    
          <input type="text" name=apellido2 class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['apellido2']?>" disabled>
        </div>
        <label for="basic-url">DNI</label>
        <div class="input-group mb-3">    
          <input type="text" name="dni" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['dni']?>" disabled>
        </div>
        <label for="basic-url">Dirección</label>
        <div class="input-group mb-3">    
          <input type="text" name="direccion" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['direccion']?>" disabled>
        </div>
        <label for="basic-url">Teléfono</label>
        <div class="input-group mb-3">   
          <input type="text" name="telefono" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['telefono']?>" disabled>
        </div>
        <label for="basic-url">email</label>
        <div class="input-group mb-3">   
          <input type="text" name="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['email']?>" disabled>
        </div>
      </div>
    </div>
    <div class="col col-xs-12 col-md-6">
      <div class="container">
        <h3>Datos Productos</h3>
        <?php if($productos){
          echo '<table class="table table-striped"><thead><tr><th>Código</th><th>Nombre</th><th>Descripción</th></thead><tbody>';
          foreach ($productos as $key) {
              echo '<tr><th>'.$key['codigo'].'</th><th>'.$key['nombre'].'</th><th>'.$key['descripcion'].'</th></tr>';
          }
          echo '</tbody></table>';
        }else{
          echo '<p>Aún no ha adquirido ningún producto</p>';
        }
        ?>
      </div>
    </div>
  </div>
   <a href="<?php echo base_url()?>clientes/"><button class="btn btn-primary">Volver</button></a>
</div>
