<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('clientes_model');
    }
	public function index()
	{
		if($this->input->get('buscar')!==null){

			$data['clientes']=$this->clientes_model->search_cliente($this->input->get('buscar'));
			$data['buscar']=$this->input->get('buscar');
		}else{
			$data['clientes']=$this->clientes_model->get_clientes();
			$data['buscar']='';
		}
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('clientes/body',$data);
		$this->load->view('footer');
	}
	public function nuevo()
	{
		$nombre=$this->input->post('nombre');
		$apellido1=$this->input->post('apellido1');
		$apellido2=$this->input->post('apellido2');
		$dni=$this->input->post('dni');
		$direccion=$this->input->post('direccion');
		$telefono=$this->input->post('telefono');
		$email=$this->input->post('email');
		$resp=$this->clientes_model->post_cliente($nombre, $apellido1, $apellido2, $dni, $direccion, $telefono, $email);
		redirect('clientes');
	}
	public function editar()
	{
		$id=$this->input->get('id');
		$data['mensaje']='';

		if($this->input->post('nombre')!==null){
			$nombre=$this->input->post('nombre');
			$apellido1=$this->input->post('apellido1');
			$apellido2=$this->input->post('apellido2');
			$dni=$this->input->post('dni');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
			$email=$this->input->post('email');
			$resp=$this->clientes_model->put_cliente($id,$nombre, $apellido1, $apellido2, $dni, $direccion, $telefono, $email);
			$data['mensaje']=$resp?'Se ha añadido correctamente':'Hay algún error, por favor verifique los datos';
			redirect('clientes');
		}else{
			$data['cliente']=$this->clientes_model->get_cliente($id);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('clientes/editar',$data);
			$this->load->view('footer');
		}
	}
	public function detalles()
	{
		$id=$this->input->get('id');
		$data['cliente']=$this->clientes_model->get_cliente($id);
		$data['productos']=$this->clientes_model->get_productos($id);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('clientes/detalles',$data);
		$this->load->view('footer');
	}
	public function borrar()
	{
		$id=$this->input->get('id');
		$res=$this->clientes_model->delete_cliente($id);
		redirect('clientes');
	}
}