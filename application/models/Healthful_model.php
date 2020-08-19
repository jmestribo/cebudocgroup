<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Healthful_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function view_article($uri_title){
        $query = $this->db
                    ->where('uri_title',$uri_title)
                    ->get('healthful')->result();
        return $query;
    }

    //count total rows of stories
    function get_total_stories(){
    	return $this->db->count_all_results('healthful');
    }

    //stories in media for pagination
    function stories($limit, $offset){
    		   //$this->db->limit(2);
    			 $this->db->limit($limit, $offset); 
		$query = $this->db->get('healthful');
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




	//count total rows of stories
    function get_total_profiles(){
    		$this->db->where('type', 'profiles');
    	return $this->db->count_all_results('healthful');
    }

	 //profiles in media for pagination
    function profiles($limit, $offset){
    		   //$this->db->limit(2);
    			 $this->db->limit($limit, $offset);
    			 $this->db->where('type', 'profiles');
		$query = $this->db->get('healthful');
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


	//count total rows of community
    function get_total_community(){
    		$this->db->where('type', 'community');
    	return $this->db->count_all_results('healthful');
    }

	 //community in media for pagination
    function community($limit, $offset){
    		   //$this->db->limit(2);
    			 $this->db->limit($limit, $offset);
    			 $this->db->where('type', 'community');
		$query = $this->db->get('healthful');
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


	function get_autocomplete($search_data){
    	$this->db->select('title, id, uri_title');
    	$this->db->order_by('title', 'asc');
    	$this->db->like('title', $search_data);

    	return $this->db->get('healthful', 10)->result();
	}

	function get_latest_autocomplete($search_data){
    	$this->db->select('title, id, url');
    	$this->db->order_by('title', 'asc');
    	$this->db->like('title', $search_data);

    	return $this->db->get('latest_healthfulsitemap', 10)->result();
	}

	 //New add Jucel 07-06-2020
	 //count total rows of stories

	function view_latest_article($uri_title){
        $query = $this->db
                    ->where('uri_title',$uri_title)
                    ->get('healthful_edition2')->result();
        return $query;
    }

	function latest_stories($limit, $offset){
		   //$this->db->limit(2);
		$this->db->limit($limit, $offset); 
		$query = $this->db->get('healthful_edition2');
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

	function save_stories($data){

		$field['uri_title'] = $data['uri_title'];
		$field['thumbnail'] = $data['thumbnail'];
		$field['image'] = $data['image'];
		$field['keywords'] = $data['keywords'];
		$field['title'] = $data['title'];
		$field['sub'] = $data['sub'];
		$field['content'] = $data['content'];
		$field['slider'] = $data['slider'];
		$field['date'] = $data['date'];
		$field['type'] = $data['type'];

		return $this->db->insert("healthful_edition2",$field);

	}

	function get_total_latest_stories(){
    	return $this->db->count_all_results('healthful_edition2');
    }


	function latest_Profiles($limit, $offset){
		   //$this->db->limit(2);
		$this->db->limit($limit, $offset); 
		$this->db->where("type","Profiles");
    	$this->db->order_by("id","DESC");
		$query = $this->db->get('healthful_edition2');
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


    function get_total_latest_Profile(){
    		$this->db->where("type","Profiles");
    	return $this->db->count_all_results('healthful_edition2');
    }

    function latest_updates($limit, $offset){
		   //$this->db->limit(2);
		$this->db->limit($limit, $offset); 
		$this->db->where("type","Updates");
		$query = $this->db->get('healthful_edition2');
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


    function get_total_latest_updates(){
    		   $this->db->where("type","Updates");
    	return $this->db->count_all_results('healthful_edition2');
    }


	function latest_community($limit, $offset){
		   //$this->db->limit(2);
		$this->db->limit($limit, $offset); 
		$this->db->where("type","Community");
		$query = $this->db->get('healthful_edition2');
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


    function get_total_latest_community(){
    		   $this->db->where("type","Community");
    	return $this->db->count_all_results('healthful_edition2');
    }






























}
