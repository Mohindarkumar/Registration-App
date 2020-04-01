<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Register Model Class
 */
class Registers extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insertUser($insertData)
	{
		$inasetQuery = $this->db->insert('register',$insertData);  

		if ($inasetQuery)
		{
			return "User Created Successfully!";
		}
		else
		{
			return mysqli_error($this->db);
		}
	}
}