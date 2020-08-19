<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function record_count(){
		return $this->db->count_all('doctors');
	}

	function doctors_list1($limit, $start){
		$this->db->limit($limit, $start);
		
				 $this->db->order_by('lname', 'asc');
		$query = $this->db->get('doctors');
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
			else{
				return false;
			}
	}

	function doctors_list(){
				 $this->db->order_by('lname', 'asc');
		$query = $this->db->get('doctors');
			if($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
			else{
				return false;
			}
	}

	function profile($id){
        $query = $this->db
                    ->where('id',$id)
                    ->get('doctors')->result();
        return $query;
    }

    function schedule($id){
        $query = $this->db
                    ->where('doc_id',$id)
                    ->get('doctorschedule')->result();
        return $query;
    }











































}
