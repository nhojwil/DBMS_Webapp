<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ad_model extends SAP_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	function add($s_file_name, $s_location)
	{
		$s_errors['error'] = '';
		$a_insert_data = array(
			'filename'		=> $s_file_name,
			'ad_location'	=> $s_location
			);
		if ($r_result = $this->db->insert('sap_ads', $a_insert_data))
		{
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	}

	function get($s_location) {
		$s_errors['error'] = '';
		$this->db->where('ad_location', $s_location);
		if ($r_result = $this->db->get('sap_ads'))
		{
			if ($r_result->num_rows() > 0) {
				return $r_result->row();
			}
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	}

	function get_location($s_location)
	{
		$s_errors['error'] = '';
		$this->db->where('ad_location', $s_location);
		if ($r_result = $this->db->get('sap_ads'))
		{
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	}
	/**
	* Updates a centre image in the centres table
 	* @scope	public
	* @param	string		file_name
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update($s_file_name, $s_location, $i_id)
	{
		$s_errors['error'] = '';
		$this->db->where('id', $i_id);
		$a_update_array = array(
			'filename'		=> $s_file_name,
			'ad_location'	=> $s_location
			);
		if ($r_result = $this->db->update('sap_ads', $a_update_array))
		{
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function update_centre_image
}