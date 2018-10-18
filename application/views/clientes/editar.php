<div class="row">
  <h3>Datos Cliente</h3>
  <div class="container">
    <form action="<?php echo base_url()?>clientes/editar/?id=<?php echo $cliente['id']?>" method="post">
    <label for="basic-url">Nombre</label>
    <div class="input-group mb-3">      
      <input type="text" name="nombre" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['nombre']?>" >
    </div>
    <label for="basic-url">Primer apellido</label>
    <div class="input-group mb-3">    
        <input type="text" name="apellido1" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['apellido1']?>" >
    </div>
    <label for="basic-url">Segundo apellido</label>
    <div class="input-group mb-3">    
      <input type="text" name=apellido2 class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['apellido2']?>" >
    </div>
    <label for="basic-url">DNI</label>
    <div class="input-group mb-3">    
      <input type="text" name="dni" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['dni']?>" >
    </div>
    <label for="basic-url">Dirección</label>
    <div class="input-group mb-3">    
      <input type="text" name="direccion" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['direccion']?>" >
    </div>
    <label for="basic-url">Teléfono</label>
    <div class="input-group mb-3">   
      <input type="text" name="telefono" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['telefono']?>">
    </div>
    <label for="basic-url">email</label>
    <div class="input-group mb-3">   
      <input type="text" name="email" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cliente['email']?>" >
    </div>
    <input type="submit" class="btn btn-primary" value="Guardar">
  </form> 
  </div>
</div>