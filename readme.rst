########################
Prueba conocimientos PHP
########################


Para esta prueba he utilizado "Codeigniter" un framework de PHP orientado a objetos.
Sigue una estructura MVC (modelo-vista-contolador), donde los modelos (consultas a la base de datos) se situan en la ruta /application/models/, las vistas en /application/views/ y los controladores en /application/controllers/

La motivación de utilizar este framework, es que es ligero, ofrece la estructura MVC, permite RAD (desarrollo rápido de aplicaciones).
He utilizado también para el estilo el framework css "Bootstrap", el cual permite realizar el diseño responsive de forma rápida.

Para configurar la base de dados, hay que modificar el fichero /application/config/database.php
modificando los valores de 'hostname','username','password' y	'database'.
La aplicación va a comprobar si existen tablas en la base de datos, en caso que no existan las creará.

La aplicación es muy sencilla, con tres áreas: clientes, productos y tienda. Se accede a cada una de ellas mediante un menú.
Al acceder a la parte de clientes, muestra una tabla con la información de los clientes que están guardados en la base de datos, también las acciones CRUD (Crear, leer, actualizar y eliminar) que afectan al cliente. He puesto un botón para crear nuevos registros de cliente, al pulsarlo aparece un modal con un formulario con los datos relativos al cliente. He puesto un buscador, el cual buscará el texto indicado entre los campos de la tabla de clientes. Con la opción 'ver' de un cliente determinado, abre una nueva página donde muestra datos relativos al cliente, asi como las 'compras' que hubiera realizado. Al pulsar 'editar' abre una página, con un formulario con los valores actuales del cliente, permite modificar datos del cliente.
En la parte de productos, he puesto un botón que despliega un modal donde introducir la URL donde leerá un json con los datos de los productos, esta función realiza dos comprobaciones básicas, que la URL introducida devuelva algo, y que lo que devuelva contenga al menos los valores de codigo, nombre y descripcion. He puesto un buscador, que buscará en la tabla de productos el texto introducido en cualquiera de los campos de esta tabla. En el listado de productos, he añadido las opciones de editar un producto y de eliminarlo.
En parte de la tienda, hay dos desplegables uno con los clientes y otro con los productos, al seleccionar un cliente y un producto y pulsando el botón 'Realizar venta', creará la relación en la base de datos. He puesto también dos campos, uno para clientes y otro para productos, de texto para realizar el filtrado de los datos del selector mediante JQuery, al introducir texto en cada uno de ellos, limitará los valores del desplegable a las opciones que contengan el texto indicado. Mostrará también las ventas que se han realizado. 
Todas las tablas se pueden ordenar alfabéticamente pulsando en el texto de su cabecera. Para ello he utilizado la librería 'tablesorter.js'

