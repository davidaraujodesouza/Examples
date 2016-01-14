<?php
require_once("../../lib/rest/Rest.inc.php");

class API extends REST {

	public $data = "";

	private $db = NULL;
	private $mysqli = NULL;

	public function __construct(){
		parent::__construct();				// Init parent contructor
	}

	/*
	 * Dynmically call the method based on the query string
	 */
	public function processApi(){
		$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
		if((int)method_exists($this,$func) > 0)
			$this->$func();
		else
			$this->response('',404); // If the method not exist with in this class "Page not found".
	}

	private function getcustomers() {

		$result = array(
				array("code" => "1","name" => "Josh", "birthdate" => "1983-12-08"),
				array("code" => "2","name" => "John", "birthdate" => "1983-09-26"),
				array("code" => "3","name" => "David", "birthdate" => "1983-11-09")

		);
			
		$this->response($this->json($result), 200);
	}

	/*
	 *	Encode array into JSON
		*/
	private function json($data){
		if(is_array($data)){
			return json_encode($data);
		}
	}
}

// Initiiate Library

$api = new API;
$api->processApi();
?>