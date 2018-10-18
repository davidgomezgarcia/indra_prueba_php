 <form action="<?php echo base_url()?>tienda/venta" method="POST">
 <div class="row">
 	<div class="col col-sm-12 col-md-2">
 		<label for="buscacliente">Filtar clientes</label>
 		<input type="text" id="buscacliente" class="form-control">
 	</div>
 	<div class="col col-sm-12 col-md-2">
 		<div class="form-group">
		  	<label for="cliente">Seleccione cliente</label>
		  	<select class="form-control" id="cliente" name="cliente">
		    <?php
		    foreach ($clientes as $key ) {
		    	echo '<option value="'.$key['id'].'">'.$key['nombre'].' '.$key['apellido1'].' '.$key['apellido2'].'</option>';
		    }
		    ?>
		  	</select>
		</div> 
</div>
<div class="col col-sm-12 col-md-2">
 		<label for="buscaproducto">Filtar productos</label>
 		<input type="text" id="buscaproducto" class="form-control">
 	</div>
<div class="col col-sm-12 col-md-2">
 <div class="form-group">
  <label for="producto">Seleccione producto</label>
  <select class="form-control" id="producto" name="producto">
    <?php
    foreach ($productos as $key ) {
    	echo '<option value="'.$key['id'].'">'.$key['codigo'].'-'.$key['nombre'].'</option>';
    }
    ?>
  </select>
</div>
</div>
</div>
 <input type="submit" class="btn btn-primary" value="Realizar venta">
</form>
<hr/>
<h3>Ventas</h3>
<?php if($ventas){?>
	<table id="ventas" class="table table-striped">
  <thead>
    <tr>
      <th>Código producto</th>
      <th>Producto</th>
      <th>Cliente</th>
      <th>Dni</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   foreach ($ventas as $key) {
     echo '<tr><td>'.$key['codigo'].'</td><td>'.$key['producto'].'</td><td>'.$key['nombre'].' '.$key['apellido1'].' '.$key['apellido2'].'</td><td>'.$key['dni'].'</td></tr>';
   }
   ?>
  </tbody>
</table>
<?php }else{
	echo '<p>No hay ventas</p>';
}?>
<script>
  $(document).ready(function() 
    { 
        $("#ventas").tablesorter(); 
    } 
); 

$(function() { 
    var opts = $('#cliente option').map(function(){ 
    return [[this.value, $(this).text()]]; 
    }); 

    $('#buscacliente').keyup(function(){ 
    var rxp = new RegExp($('#buscacliente').val(), 'i'); 
    var optlist = $('#cliente').empty(); 
    opts.each(function(){ 
     if (rxp.test(this[1])) { 
     optlist.append($('<option/>').attr('value', this[0]).text(this[1])); 
     } 
    }); 
    }); 
}); 
$(function() { 
    var opts = $('#producto option').map(function(){ 
    return [[this.value, $(this).text()]]; 
    }); 

    $('#buscaproducto').keyup(function(){ 
    var rxp = new RegExp($('#buscaproducto').val(), 'i'); 
    var optlist = $('#producto').empty(); 
    opts.each(function(){ 
     if (rxp.test(this[1])) { 
     optlist.append($('<option/>').attr('value', this[0]).text(this[1])); 
     } 
    }); 
    }); 
});
</script> 

