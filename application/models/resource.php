<?php 
	class Resource extends CI_Model {
		function get_table($table) {
			$this->db->select()->from($table);
			$query = $this->db->get();
			return $query->result_array();
		}

		function get_table_object($table) {
			$this->db->select()->from($table);
			$query = $this->db->get();
			return $query;
		}

		function get_table_name() {
			return $this->db->list_tables();
		}

		function get_num_fields($table) {
			$this->db->select()->from($table);
			$query = $this->db->get();
			return $query->num_fields();
		}

		function get_fields($table) {
			return $this->db->list_fields($table); 
		}

		function get_row($table) {
			$this->db->select()->from($table);
			$query = $this->db->get();
			return $query->row();
		}

		function get_year($table) {
			$this->db->select('year')->from($table);
			$query = $this->db->get();
			return $query->result();
		}

		function get_result($table, $year) {
			$this->db->select()->from($table)->where('year', $year);
			$query = $this->db->get();
			return $query;
		}

		function get_vehicle_numbers($year) {
			$this->db->select()->from('vehicle_numbers')->where('year', $year);
			$query = $this->db->get();
			return $query->result_array();
		}
	}	// end of class
?>