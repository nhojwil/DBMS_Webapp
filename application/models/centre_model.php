<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Centre_model extends SAP_Model
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a centre information to the centres table
 	* @scope	public
	* @param	array		centre_info
	* @return	string		error (if there's any)
	 */
	function add($a_centre_info)
	{
		$s_errors['error'] = '';
		if ($this->db->insert(TBL_CENTRES, $a_centre_info)) {
			return $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add_centre_info

/**
	* Updates a centre image in the centres table
 	* @scope	public
	* @param	string		file_name
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update_image($s_file_name, $i_centre_id)
	{
		$s_errors['error'] = '';
		$this->db->where('id', $i_centre_id);
		$a_upadate_array = array(
			'filename'		=> $s_file_name
			);
		if ($r_result = $this->db->update(TBL_CENTRES, $a_upadate_array))
		{
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function update_centre_image

/**
	* Updates the centre int in the centres table
 	* @scope	public
	* @param	array		centre_info
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update($a_centre_info, $i_centre_id)
	{
		$s_errors['error'] = '';
		$this->db->where('id', $i_centre_id);
		if ($r_result = $this->db->update(TBL_CENTRES, $a_centre_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function update_centre_info


	function get_slug_update($i_centre_id)
	{
		$this->db->where('id', $i_centre_id);
		$r_query = $this->db->get(TBL_CENTRES);

		return $r_query->row()->slug;
	}

/**
	* Returns the number of slug with the same slug name prefix
 	* @scope	public
	* @param	string		slug
	* @return	int			number of rows
	 */
	function get_slug_counts($s_slug)
	{
		$this->db->like('slug', $s_slug, 'after');
		$r_query = $this->db->get(TBL_CENTRES);

		return $r_query->num_rows();
	} //end of function get_slug_counts

/**
	* Checks if branch already exists
 	* @scope	public
	* @param	string		centre
	* @param	string		branch
	* @return	boolean		number of rows
	 */
	function check_if_branch_exists($s_centre_name, $s_branch_name)
	{
		$this->db->where('name', $s_centre_name);
		$this->db->where('branch', $s_branch_name);
		$r_query = $this->db->get(TBL_CENTRES);

		return ($r_query->num_rows() > 0 ? TRUE : FALSE);
	} //end of function check_if_branch_exists

/**
	* Gets all information about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_info($i_centre_id)
	{
		$this->db->select(' 
			sap_centres.name AS centre_name,
			sap_centres.branch AS centre_branch,
			sap_centres.area AS centre_area,
			sap_centres.description AS centre_description, 
			sap_centres.contact AS centre_contact, 
			sap_centres.rating AS centre_rating, 
			sap_centres.filename AS centre_image,
			sap_centres.contact_user_id AS centre_user_id,
			sap_centres.date_added AS centre_date_added,
			sap_centres.date_updated AS centre_date_updated, 
			sap_centres.region AS centre_region,
			sap_users.name AS pic_name, 
			sap_users.email AS pic_email,
			sap_users.salutation AS pic_salutation, 
			sap_centre_locations.location_name AS billing_address
			');
		$this->db->where('sap_centres.id', $i_centre_id);
		$this->db->join(TBL_USERS, 'sap_users.id = sap_centres.contact_user_id');
		$this->db->join(TBL_CENTRE_LOCATIONS, 'sap_centre_locations.centre_id = sap_centres.id');
		$r_query = $this->db->get(TBL_CENTRES);

		return $r_query->row();
	}

/**
	* Counts the number of rows in sap_centres table
	* @scope 	public
	* @return 	int
	*/
	function count()
	{
		return $this->db->count_all(TBL_CENTRES);
	} // end of function count

/**
	* Get all centre data for the centres management page list
	* @scope 	public
	* @param 	int 	limit
	* @param	int		offset
	* @return 	r_query Result Set	
	*/
	function get_list($i_limit, $i_offset)
	{
		$this->db->select('
			sap_centres.id AS centre_id, 
			sap_centres.name AS centre_name, 
			sap_users.name AS pic_name, 
			sap_users.email AS pic_email, 
			sap_centres.date_added AS centre_date_added'
			);
		$this->db->join('sap_users', 'sap_users.id = sap_centres.contact_user_id');
		$this->db->order_by('centre_id', 'ASC');
		$this->db->limit($i_limit, $i_offset);
		$r_query = $this->db->get(TBL_CENTRES);

		return $r_query->result();
	} // end of function get_list

/**
	* Checks if a centre already exists
	* @scope 	public
	* @param 	int 	centre id
	* @return 	boolean TRUE if there exist at least 1, FALSE if nothing	
	*/
	function check_if_exists($i_centre_id)
	{
		$this->db->where('id', $i_centre_id);

		$r_query = $this->db->get(TBL_CENTRES);

		return ($r_query->num_rows() == 0 ? TRUE : FALSE);
	} // end of function check_if_exists

}
