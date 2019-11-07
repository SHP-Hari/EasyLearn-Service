<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
	}
	

	public function initialfunction()
	{
		$this->load->view('welcome_message');
	}

	function getLettersAssignment(){
		$response = array();
		$questions = $this->DataModel->getLettersAssignmentQuestionAnswers();
		if (isset($questions) && !empty($questions)){
			$response["questions"] = array();
			foreach ($questions as $question){
				$ques = array();
				$ques["id"] = $question->question_id;
				$ques["question"] = "$question->question";
				$ques["answer1"] = "$question->ans1";
				$ques["answer2"] = "$question->ans2";
				$ques["answer3"] = "$question->ans3";
				$ques["answer4"] = "$question->ans4";
				$ques["correctAnswer"] = $question->correct_answer;
				array_push($response['questions'], $ques);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No questions found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getWordsAssignment(){
		$response = array();
		$questions = $this->DataModel->getWordsAssignmentQuestionAnswers();
		if (isset($questions) && !empty($questions)){
			$response["questions"] = array();
			foreach ($questions as $question){
				$ques = array();
				$ques["id"] = $question->question_id;
				$ques["question"] = $question->question;
				$ques["answer1"] = $question->ans1;
				$ques["answer2"] = $question->ans2;
				$ques["answer3"] = $question->ans3;
				$ques["answer4"] = $question->ans4;
				$ques["correctAnswer"] = $question->correct_answer;
				array_push($response['questions'], $ques);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No questions found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getBeginnerAssignment(){
		$response = array();
		$questions = $this->DataModel->getBeginnerAssignmentQuestionAnswers();
		if (isset($questions) && !empty($questions)){
			$response["questions"] = array();
			foreach ($questions as $question){
				$ques = array();
				$ques["id"] = $question->question_id;
				$ques["question"] = $question->question;
				$ques["answer1"] = $question->ans1;
				$ques["answer2"] = $question->ans2;
				$ques["answer3"] = $question->ans3;
				$ques["answer4"] = $question->ans4;
				$ques["correctAnswer"] = $question->correct_answer;
				array_push($response['questions'], $ques);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No questions found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getAdvancedAssignment(){
		$response = array();
		$questions = $this->DataModel->getAdvancedAssignmentQuestionAnswers();
		if (isset($questions) && !empty($questions)){
			$response["questions"] = array();
			foreach ($questions as $question){
				$ques = array();
				$ques["id"] = $question->question_id;
				$ques["question"] = $question->question;
				$ques["answer1"] = $question->ans1;
				$ques["answer2"] = $question->ans2;
				$ques["answer3"] = $question->ans3;
				$ques["answer4"] = $question->ans4;
				$ques["correctAnswer"] = $question->correct_answer;
				array_push($response['questions'], $ques);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No questions found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getTranslatedWord(){
		$response = array();
		$word = $this->DataModel->findRelatedWord($this->input->post('translatedWord'));
		// $word = $this->DataModel->findRelatedWord("අම්මා");
		if (isset($word) && !empty($word)){
			$response["word"] = array();
				$words["id"] = $word->id;
				$words["question"] = $word->category_id;
				$words["tamil"] = $word->tamil_word;
				$words["sinhala"] = $word->sinhala_word;
			array_push($response['word'], $words);
			$response["success"] = true;
		}else{
			$response["success"] = false;
			$response["message"] = "No words found";
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getAllWordsCategories(){
		$response = array();
		$categories = $this->DataModel->getCategories();
		if (isset($categories) && !empty($categories)){
			$response["categories"] = array();
			foreach ($categories as $category){
				$catArray = array();
				$catArray["id"] = $category->category_id;
				$catArray["categoryName"] = $category->category_name;
				$catArray["status"] = $category->status;
				$catArray["image"] = $category->img_url;
				array_push($response['categories'], $catArray);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No categories found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	function getWordsByCategories($catId){
		$response = array();
		$words = $this->DataModel->getWordsbyCat($catId);
		if (isset($words) && !empty($words)){
			$response["words"] = array();
			foreach ($words as $word){
				$wordArray = array();
				$wordArray["id"] = $word->id;
				$wordArray["categoryId"] = $word->category_id;
				$wordArray["wordSinhala"] = $word->sinhala_word;
				$wordArray["wordTamil"] = $word->tamil_word;
				$wordArray["prSinhala"] = $word->sinhala_pronounciation;
				$wordArray["prTamil"] = $word->tamil_pronounciation;
				array_push($response['words'], $wordArray);
			}
			$response["success"] = true;
			// echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "No words found";
			// echo json_encode($response);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


}