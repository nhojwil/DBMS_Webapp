<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adhoc_programs_model extends SAP_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds an adhoc program
 	* @scope	public
	* @param	array		adhoc_info
	* @return	string		error (if there's any)
	 */
	function add($a_adhoc_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert(TBL_ADHOC_PROGRAMS, $a_adhoc_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Returns the information of a particular Adhoc Program
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	adhoc program id
	* @return 	r_query Result Set	
	*/
	function get_info($i_centre_id, $i_adhoc_id)
	{
		$this->db->where('sap_adhoc_programs.centre_id', $i_centre_id);
		$this->db->where('sap_adhoc_programs.id', $i_adhoc_id);
		$r_query = $this->db->get(TBL_ADHOC_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	}

/**
	* Returs a list of Adhoc Programs about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_list($i_centre_id)
	{
		$this->db->where('centre_id', $i_centre_id);
		$r_query = $this->db->get(TBL_ADHOC_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}

	/**
	* Returs number of rows through location id
	* @scope 	public
	* @param 	int 	location id
	* @return 	int 	number of rows	
	*/
	function count_by_location_id($i_location_id) {
		$this->db->where('location_id', $i_location_id);
		$r_result = $this->db->get(TBL_ADHOC_PROGRAMS);

		return $r_result->num_rows();
	} //end of count_by_location_id
}