<div class="row">
  <h3>Datos producto</h3>
  <div class="container">
    <form action="<?php echo base_url()?>productos/editar/?id=<?php echo $producto['id']?>" method="post">
    <label for="basic-url">Código</label>
    <div class="input-group mb-3">      
      <input type="text" name="codigo" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $producto['codigo']?>" >
    </div>
    <label for="basic-url">nombre</label>
    <div class="input-group mb-3">    
        <input type="text" name="nombre" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $producto['nombre']?>" >
    </div>
    <label for="basic-url">Descripción</label>
    <div class="input-group mb-3">    
      <input type="text" name="descripcion" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $producto['descripcion']?>" >
    </div>
   
    <input type="submit" class="btn btn-primary" value="Guardar">
  </form>
  </div>
</div>