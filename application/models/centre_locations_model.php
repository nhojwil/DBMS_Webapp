<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Centre_locations_model extends SAP_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a centre location
 	* @scope	public
	* @param	array		location_info
	* @return	string		error (if there's any)
	 */	
	function add($a_location_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert(TBL_CENTRE_LOCATIONS, $a_location_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Adds a batch of centre locations
 	* @scope	public
	* @param	array		location_info
	* @return	string		error (if there's any)
	 */
	function add_batch($a_centre_locations_info)
	{
		$s_errors['error'] = '';
		$a_insert_ids = array();
		foreach ($a_centre_locations_info as $a_centre_location_info) {
			if ($this->db->insert(TBL_CENTRE_LOCATIONS, $a_centre_location_info)) {
				$a_insert_ids[] = $this->db->insert_id();
			} else {
				$s_errors['error'] = $this->db->_error_message();
				return $s_errors;
			}
		}

		return $a_insert_ids;
		
	} // end of function add_batch

/**
	* Adds a locations from Standard Program
 	* @scope	public
	* @param	array		location_info
	* @return	string		error (if there's any)
	 */
	function add_from_standard($a_centre_location_info) {
		$s_errors['error'] = '';
		if ($this->db->insert(TBL_CENTRE_LOCATIONS, $a_centre_location_info)) {
			return $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function add_from_standard

/**
	* Gets all locations through Centre ID
 	* @scope	public
	* @param	array		centre_id
	* @return	string		error (if there's any)
	 */
	function get($i_centre_id) {
		$this->db->where('centre_id', $i_centre_id);
		$r_result = $this->db->get(TBL_CENTRE_LOCATIONS);

		$m_return = array(); 
		if($r_result->num_rows > 0){
			$m_return = $r_result->result();
		}

		return $m_return;
	} //end of function get

/**
	* Gets location through ID
 	* @scope	public
	* @param	array		centre_id
	* @return	string		error (if there's any)
	 */
	function get_program_location($i_id) {
		$this->db->where('id', $i_id);
		$r_result = $this->db->get(TBL_CENTRE_LOCATIONS);

		$m_return = false; 
		if($r_result->num_rows > 0){
			$m_return = $r_result->row();
		}

		return $m_return;
	} //end of function get_program_location
/**
	* Updates a centre locations
 	* @scope	public
	* @param	array		location_info
	* @param	array		centre_id
	* @return	string		error (if there's any)
	 */	
	function update($a_location_info, $i_centre_id) {

		$s_errors['error'] = '';
		$this->db->where('id', $i_centre_id);
		if ($r_result = $this->db->update(TBL_CENTRE_LOCATIONS, $a_location_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function update

/**
	* Updates a batch of centre locations
 	* @scope	public
	* @param	array		locations_info
	* @param	array		locations_id
	* @return	string		error (if there's any)
	 */
	function update_batch($a_centre_locations_info, $a_locations_id)
	{
		$s_errors['error'] = '';
		foreach ($a_centre_locations_info as $i_key => $a_centre_location_info) {
			$this->db->where('id', $a_locations_id[$i_key]);
			if (!$this->db->update(TBL_CENTRE_LOCATIONS, $a_centre_location_info)) {
				$s_errors['error'] = $this->db->_error_message();
				return $s_errors;
			}
		}
	} //end of function update_batch

}