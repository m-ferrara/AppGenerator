<?php defined("BASEPATH") OR exit("No direct script access allowed");require APPPATH."/libraries/REST_Controller.php";class Attribute extends REST_Controller {	function __construct() 	{ 	parent::__construct();	$this->load->model("attribute_model"); 	}  function collection_get() { $modelResult = $this->attribute_model->get_all();if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute does not exist."), 200);} else {    $this->response($modelResult, 200); }}function index_get() { $getArray = $this->assembleRequestPayload('get');$validData = $this->attribute_model->validate( $getArray, "get" );if	(!$validData["isValid"]){$this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->get( $sanatizedPayload );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute does not exist."), 200);} else {    $this->response($modelResult, 200); }}}function index_put() { $whereArray = array("id"=> $this->put("id"));$putArray = $this->assembleRequestPayload('put');$validData = $this->attribute_model->validate( $putArray, "put" );if	(!$validData["isValid"]){ $this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->put( $sanatizedPayload, $whereArray );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute put request failure."), 200);} else {    $this->response($modelResult, 200); }}}function index_post() { $postArray = $this->assembleRequestPayload('post');$validData = $this->attribute_model->validate( $postArray, "post" );if	(!$validData["isValid"]){$this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->post( $sanatizedPayload );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute post request failure."), 200);} else {    $this->response($modelResult, 200); }}}function index_delete( $idKey = null, $idVal = null,$nameKey = null, $nameVal = null,$typeKey = null, $typeVal = null,$lengthKey = null, $lengthVal = null,$regex_patternKey = null, $regex_patternVal = null,$is_primary_keyKey = null, $is_primary_keyVal = null,$is_uniqueKey = null, $is_uniqueVal = null){











