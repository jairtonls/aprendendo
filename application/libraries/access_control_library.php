<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Access_control_library{
 	protected $ci;
 	public function controle_acesso(){
 		$CI = $this->ci =& get_instance();
 		$user = $CI->session->userdata("usuario_logado");
        if(!isset($user)){
        	redirect('Login','refresh');
        }
 	}
 }
 
 /* End of file access_control_library.php */
 /* Location: ./application/libraries/access_control_library.php */
 ?>