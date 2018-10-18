<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda extends CI_Controller {

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
        $this->load->model('clientes_model');
    }
	public function index()
	{
		$data['clientes']=$this->clientes_model->get_clientes();
		$data['productos']=$this->productos_model->get_productos();
		$data['ventas']=$this->productos_model->get_ventas();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('tienda/body', $data);
		$this->load->view('footer');

	}
	public function venta()
	{
		if(($this->input->post('cliente')!== null)&&($this->input->post('producto')!== null)){
			$cliente_id=$this->input->post('cliente');
			$producto_id=$this->input->post('producto');
			$res=$this->productos_model->venta_producto($cliente_id,$producto_id);
		}
		redirect('tienda');
	}
}