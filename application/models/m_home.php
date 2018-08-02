<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_home extends CI_Model {

		public function add_data($table, $data)
		{
			$query = $this->db->insert($table, $data);
			return $query;
		}

		public function get_data_by_id($table, $where, $w2, $id2, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where, $id);
			$this->db->where($w2, $id2);
			return $this->db->get()->result();
		}

		public function get_data_gambar($table, $where, $id)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where, $id);
			return $this->db->get()->result();
		}

		public function get_all_data($table)
		{
			$this->db->select('*');
			$this->db->from($table);
			return $this->db->get()->result();
		}

		public function update_data($id_data, $id, $table, $data){
			$this->db->where($id_data, $id);
		    $this->db->update($table,$data);
		    return $this->db->affected_rows();
		}

		public function data_foto(){
			$this->db->select('*');
			$this->db->from('data_properti dp');
			$this->db->join('gambar_properti gp','dp.id_properti = gp.id_properti');
			return $this->db->get()->result();
		}
	}