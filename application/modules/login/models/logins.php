<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Register Model Class
 */
class Logins extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getuserDetails($getData)
	{
		$this->db->where('email', $getData['email']);
		$selectQuery = $this->db->get('register'); 

		if ($selectQuery)
		{
			return $selectQuery->result_array();
		}
		else
		{
			return mysqli_error($this->db);
		}
	}
}