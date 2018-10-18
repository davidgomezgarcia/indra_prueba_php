<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
        $this->load->model('productos_model');
    }
	public function index()
	{
		
		if($this->input->get('buscar')!==null){
			$data['productos']=$this->productos_model->search_producto($this->input->get('buscar'));
			$data['buscar']=$this->input->get('buscar');
		}else{
			$data['buscar']='';
			$data['productos']=$this->productos_model->get_productos();
		}
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('productos/body',$data);
		$this->load->view('footer');
	}
	public function editar()
	{
		$id=$this->input->get('id');
		$data['mensaje']='';

		if($this->input->post('codigo')!==null){
			$codigo=$this->input->post('codigo');
			$nombre=$this->input->post('nombre');
			$descripcion=$this->input->post('descripcion');
			$resp=$this->productos_model->put_producto($id,$codigo,$nombre, $descripcion);
			$data['mensaje']=$resp?'Se ha añadido correctamente':'Hay algún error, por favor verifique los datos';
			redirect('productos');
		}else{
			$data['producto']=$this->productos_model->get_producto($id);
			$this->load->view('head');
			$this->load->view('header');
			$this->load->view('productos/editar',$data);
			$this->load->view('footer');
		}
	}
	public function borrar()
	{
		$id=$this->input->get('id');
		$res=$this->productos_model->delete_producto($id);
		redirect('productos');
	}
	
	public function importar()
	{
		$data['url']=$this->input->post('url');
		//comprobamos que devuelve algo
		$data['mensaje']='';
		if($str = @file_get_contents($data['url'])){
			$data['mensaje']=$this->productos_model->save_json_productos($str)?"La importacion se ha realizado con éxito":"Error en la importación";}
		$data['productos']=$this->productos_model->get_productos();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('productos/body',$data);
		$this->load->view('footer');
	}

}//fin de la clase