<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_model {
    function getLettersAssignmentQuestionAnswers(){
		$this->db->select("*");
		$this->db->from('letters_quentionanswers');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
    }
    
    function getWordsAssignmentQuestionAnswers(){
		$this->db->select("*");
		$this->db->from('words_quentionanswers');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
    }
    
    function getBeginnerAssignmentQuestionAnswers(){
		$this->db->select("*");
		$this->db->from('beginner_quentionanswers');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
    }
    
    function getAdvancedAssignmentQuestionAnswers(){
		$this->db->select("*");
		$this->db->from('advanced_quentionanswers');
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
	}

	function findRelatedWord($data){
		if(isset($data) && !empty($data)){
			$this->db->select("*");
			$this->db->from('words_by_categories');
			$this->db->like('sinhala_word', $data);
			$query = $this->db->get();
			return ($query->num_rows() > 0) ? $query->row() : null;
		}else{
			return null;
		}
	
	}

	function getCategories(){
		$this->db->select("*");
		$this->db->from('word_main_categories');
		$this->db->where('status', 1);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
	}

	function getWordsbyCat($catId){
		$this->db->select("*");
		$this->db->from('words_by_categories');
		$this->db->where('category_id', $catId);
		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
	}
}