<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
    }
    function start_db() {
        //funcion que comprueba si estan creadas las tablas
        $query = $this->db->list_tables();
        
        if(count($query)<3){
            if (!$this->db->table_exists('productos'))
            {
                //se crea la tabla para los productos
                $fields = array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                        ),
                        'nombre' => array(
                                'type' => 'TEXT',
                                'null' => FALSE,
                        )
                        ,
                        'descripcion' => array(
                                'type' =>'VARCHAR',
                                'constraint' => '1000',
                                'null'=>TRUE
                        ),
                );
                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('productos');
            }
                   
            if (!$this->db->table_exists('clientes'))
            {
                
                    //se crea la tabla para los clientes
                    $fields = array(
                            'id' => array(
                                    'type' => 'INT',
                                    'constraint' => 5,
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE,
                            ),
                            'nombre' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '100',
                            ),
                            'apellido1' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '100',
                            ),
                            'apellido2' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '100',
                            )                            ,
                            'dni' => array(
                                    'type' =>'VARCHAR',
                                    'constraint' => '10',
                                    'unique' => TRUE,
                            ),
                            'direccion' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '100',
                            ),
                            'telefono' => array(
                                    'type' => 'INT',
                                    'constraint' => 9,
                                    'unsigned' => TRUE,
                                    'unique' => TRUE,
                            ),
                            'email' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '100',
                                    'unique' => TRUE,
                            )
                    );
                    $this->dbforge->add_field($fields);
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('clientes');
                }
                 if (!$this->db->table_exists('ventas'))
            {
                
                    //se crea la tabla para los clientes
                    $fields = array(
                            'id' => array(
                                    'type' => 'INT',
                                    'constraint' => 5,
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE,
                            ),
                            'producto_id' => array(
                                    'type' => 'INT',
                                    'constraint' => 5,
                                    'unsigned' => TRUE,
                                   
                            ),
                            'cliente_id' => array(
                                    'type' => 'INT',
                                    'constraint' => 5,
                                    'unsigned' => TRUE,
                                    
                            )
                    );
                    $this->dbforge->add_field($fields);
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('ventas');
                    $this->db->query("ALTER TABLE `ventas` ADD CONSTRAINT `FK_ventas_productos` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;");
                    $this->db->query("ALTER TABLE `ventas` ADD CONSTRAINT `FK_ventas_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;");
                }
        }




        
   
    }
}
