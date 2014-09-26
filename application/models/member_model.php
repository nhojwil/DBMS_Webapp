<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a member
 	* @scope	public
	* @param	array		a_member_info
	* @return	string		error (if there's any)
	 */
	function add($a_member_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert('member', $a_adhoc_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Returns the information of a particular member
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	adhoc program id
	* @return 	r_query Result Set	
	*/
	function get_info($i_member_id)
	{
		$this->db->where('member.Mem_ID', $i_member_id);
		$r_query = $this->db->get('member');

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	}


}