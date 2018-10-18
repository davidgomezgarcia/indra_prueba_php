<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_clientes() {
        $sql = "SELECT * FROM clientes WHERE 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }
    }
    function get_cliente($id) {
        $sql = "SELECT * FROM clientes WHERE clientes.id=$id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row[0];
        } else {
            return false;
        }
    }
    function delete_cliente($id) {
        $sql = "DELETE FROM clientes WHERE clientes.id=$id";
        $this->db->query($sql);
        $query=$this->db->affected_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
    function get_productos($id) {
        $sql = "SELECT p.* FROM ventas as v INNER JOIN productos as p ON v.producto_id=p.id WHERE v.cliente_id=$id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }
    }
    function search_cliente($texto) {
        $sql = "SELECT * FROM clientes WHERE 
        clientes.nombre like '%$texto%' OR
        clientes.apellido1 like '%$texto%' OR
        clientes.apellido2 like '%$texto%' OR
        clientes.dni like '%$texto%' OR
        clientes.direccion like '%$texto%' OR
        clientes.telefono like '%$texto%' OR
        clientes.email like '%$texto%'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return false;
        }
    }
    function post_cliente($nombre, $apellido1, $apellido2, $dni, $direccion, $telefono, $email) {
        $sql = "INSERT INTO clientes (nombre, apellido1, apellido2, dni, direccion, telefono, email) VALUES ('$nombre', '$apellido1', '$apellido2', '$dni', '$direccion', $telefono, '$email')";
            $this->db->query($sql);
            $query=$this->db->affected_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
    function put_cliente($id,$nombre, $apellido1, $apellido2, $dni, $direccion, $telefono, $email) {
        $sql = "UPDATE clientes SET clientes.nombre='$nombre', clientes.apellido1='$apellido1', clientes.apellido2='$apellido2', clientes.dni='$dni', clientes.direccion='$direccion', clientes.telefono=$telefono, clientes.email='$email' WHERE clientes.id=$id";
            $this->db->query($sql);
            $query=$this->db->affected_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
    
}
