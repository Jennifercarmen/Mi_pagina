<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * summary
 */
class MProducto extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
     	parent::__construct();
       	$this->load->helper("url");         	
    }

    public function registrar($data){
    	$this->load->database();
		$this->db->trans_start();
		$this->db->query('call sp_registrar_productocategoria(?,@s)',$data);
		$res=$this->db->query('select @s as ps');
		$this->db->trans_complete();
		$this->db->close();	
		return   $res->row()->ps;
    }
}