<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function record_count(){
		return $this->db->count_all('doctors');
	}
/*
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
*/

	function teamrewards_list(){
				 $this->db->order_by('id', 'desc');
		$query = $this->db->get('team_rewards');
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

	function view($id){
        $query = $this->db
                    ->where('id',$id)
                    ->get('team_rewards')->result();
        return $query;
    }

    //count total rows of press releases
    function get_total_releases(){
    	return $this->db->count_all_results('press_releases');
    }

    //press release in media for pagination
    function releases($limit, $offset){
    		   //$this->db->limit(2);
    			 $this->db->limit($limit, $offset);
				 $this->db->order_by('id', 'desc'); 
		$query = $this->db->get('press_releases');
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

	// press release in home page
	function home_press_releases(){
    		     $this->db->limit(5);
				 $this->db->order_by('id', 'desc'); 
		$query = $this->db->get('press_releases');
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

	function view_article($uri_title){
        $query = $this->db
                    ->where('uri_title',$uri_title)
                    ->get('press_releases')->result();
        return $query;
    }
    
    
    function get_autocomplete($search_data){
    	$this->db->select('title, id, uri_title');
    	$this->db->order_by('title', 'asc');
    	$this->db->like('title', $search_data);

    	return $this->db->get('sitemap', 15)->result();
	}









































}
