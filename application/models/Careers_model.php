<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	 //CEBU DOC GROUP HOSPITALS
    function cduhcareersadmin(){
       $query = $this->db
                ->order_by("id", "desc")
                ->where("status", "Open")
                ->where("category", "administrative")
                ->where("hospital", "CDUH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function cduhcareershealth(){
       $query = $this->db
                ->order_by("id", "desc")
                ->where("status", "Open")
                ->where("category", "healthcare")
                ->where("hospital", "CDUH")
                ->get('healthcare')
                ->result();
        return $query;
    }
    function mdhcareersadmin(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status", "Open")
                ->where("category", "administrative")
                ->where("hospital", "MDH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function mdhcareershealth(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status", "Open")
                ->where("category", "healthcare")
                ->where("hospital", "MDH")
                ->get('healthcare')
                ->result();
        return $query;
    }
    function scdhcareersadmin(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "administrative")
                ->where("hospital", "SCDH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function scdhcareershealth(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "healthcare")
                ->where("hospital", "SCDH")
                ->get('healthcare')
                ->result();
        return $query;
    }
    function odhcareersadmin(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "administrative")
                ->where("hospital", "ODH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function odhcareershealth(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "healthcare")
                ->where("hospital", "ODH")
                ->get('healthcare')
                ->result();
        return $query;
    }
    function sghcareersadmin(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "administrative")
                ->where("hospital", "SGH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function sghcareershealth(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "healthcare")
                ->where("hospital", "SGH")
                ->get('healthcare')
                ->result();
        return $query;
    }
    function nghcareersadmin(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "administrative")
                ->where("hospital", "NGH")
                ->get('administrative')
                ->result();
        return $query;
    }
    function nghcareershealth(){
       $query = $this->db
                ->order_by("date", "desc")
                ->order_by("title", "asc")
                ->where("status","Open")
                ->where("category", "healthcare")
                ->where("hospital", "NGH")
                ->get('healthcare')
                ->result();
        return $query;
    }










































}
