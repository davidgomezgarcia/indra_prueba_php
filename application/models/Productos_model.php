<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_productos() {
        $sql = "SELECT * FROM productos WHERE 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }
    }
    function get_producto($id) {
        $sql = "SELECT * FROM productos WHERE id=$id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row[0];
        } else {
            return false;
        }
    }
    function delete_producto($id) {
        $relacionado=false;
        $sql="SELECT * FROM ventas WHERE producto_id=$id";
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0) {
            $relacionado=true;
        }
        if(!$relacionado){
            $sql = "DELETE FROM productos WHERE productos.id=$id";
            $this->db->query($sql);
            $query=$this->db->affected_rows();
            if ($query == 1) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
    function put_producto($id,$codigo,$nombre, $descripcion) {
        $sql = "UPDATE productos SET productos.codigo='$codigo',productos.nombre='$nombre', productos.descripcion='$descripcion' WHERE productos.id=$id";
            $this->db->query($sql);
            $query=$this->db->affected_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
    function search_producto($texto) {
        $sql = "SELECT * FROM  productos WHERE codigo LIKE '%$texto%' OR nombre LIKE '%$texto%' OR descripcion LIKE '%$texto%'";
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }
    }
    function venta_producto($cliente_id,$producto_id) {
        $sql = "INSERT INTO ventas (cliente_id, producto_id) VALUES ($cliente_id,$producto_id)";
            $this->db->query($sql);
            $query=$this->db->affected_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
    function get_ventas(){
        $sql="SELECT p.codigo, p.nombre as producto, c.nombre, c.apellido1, c.apellido2, c.dni FROM productos as p INNER JOIN ventas as v ON p.id=v.producto_id
            INNER JOIN clientes as c ON c.id=v.cliente_id
            WHERE 1";
            $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }

    }
    function save_json_productos($str){
    	//decodificamos el json a un array
    	$data = json_decode($str, true);
    	//declaramos variables
    	$com="INSERT INTO productos (codigo, nombre, descripcion) VALUES ";
    	$a=0; //contador para hacer consultas a MySQL de tamaño determinado
    	$sql=""; 
    	$ultimo=count($data); //Numero total de elementos en el JSON 
    	$out=false; //Lo que devolverá la función
    	$error=false; 
    	//preprocesamos el json para ver si es correcto
		foreach ($data as $key) {
			if((!isset($key['codigo']))||(!isset($key['codigo']))||(!isset($key['codigo']))){
				$error=true;
			}
		}
		//si hay errores en el json no guardamos    	
		if(!$error){
	    	foreach ($data as $key) {
	    		if($a==0){
	    			$sql .=$com."('".$key['codigo']."', '".$key['nombre']."', '".$key['descripcion']."'),";
	    			$a++;
	    		}elseif(($a==400)||($a==($ultimo-1))){
	    			$sql .="('".$key['codigo']."', '".$key['nombre']."', '".$key['descripcion']."');";
	    			$a=0;
	    			$query = $this->db->query($sql); //guardo cada consulta para no ocupar mucha memoria
	    		}else{
	    			$sql .="('".$key['codigo']."', '".$key['nombre']."', '".$key['descripcion']."'),";
	    			$a++;
	    		}	
	    	}
	    	$out=true;
    	}
    	return $out;
    }
}
