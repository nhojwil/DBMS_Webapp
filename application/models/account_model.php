<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a user
 	* @scope	public
	* @param	array		user_credentials
	* @return	string		error (if there's any)
	 */
	function add($a_credentials)
	{
		$s_errors['error'] = '';
		if ($this->db->insert(TBL_USERS, $a_credentials)) {
			return $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Updates the Person-in-charge credentials
 	* @scope	public
	* @param	array		credentials
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update($a_credentials, $i_user_id)
	{
		$s_errors['error'] = '';
		$this->db->where('AccNo', $i_user_id);
		if ($r_result = $this->db->update(TBL_USERS, $a_credentials)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function update

/**
	* Checks if email already exists
 	* @scope	public
	* @param	string		email
	* @return	boolean		number of rows
	 */
	function check_if_email_exists($s_email)
	{
		$this->db->where('email', $s_email);
		$r_query = $this->db->get(TBL_USERS);

		return ($r_query->num_rows() > 0 ? TRUE : FALSE);
	} //end of function check_if_email_exists

}