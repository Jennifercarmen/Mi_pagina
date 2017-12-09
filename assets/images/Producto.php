<?php

class Producto extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("mProducto");
      $this->load->library('form_validation');
	}

	public function index(){
		$datos['ac']=1;
		$this->load->view('cabecera');
		$this->load->view('Producto',$datos);
		$this->load->view('pie');
	}

	public function regcat()
	{
		$datos['ac']=2;
		$this->load->view('cabecera');
		$this->load->view('Producto',$datos);
		$this->load->view('pie');
	}
		public function lis()
	{
		$datos['ac']=3;
		$this->load->view('cabecera');
		$this->load->view('producto',$datos);
		$this->load->view('pie');
	}
	public function doreg(){

$this->form_validation->set_rules('txtDescripcion', 'txtDescripcion', 'required|min_length[2]|max_length[45]');
$respuesta = array();
$respuesta['error']	= "";
		if ($this->form_validation->run() == FALSE)
                {
              $respuesta['error']=validation_errors();
                }
        else
            {

         $desc= $this->security->xss_clean(strip_tags($this->input->post('txtDescripcion')));
        	$data = array($desc);

        	if($this->mProducto->registrar($data)){
        		$respuesta['ok']="Registro correcto";

        	}else{
			$respuesta['error']="No se pudo grabar";
        	}

        	
        	}

header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));

		
	}
}