<?php defined("BASEPATH") OR exit("No direct script access allowed");require APPPATH."/libraries/REST_Controller.php";class Attribute extends REST_Controller {	function __construct() 	{ 	parent::__construct();	$this->load->model("attribute_model"); 	}  function collection_get() { $modelResult = $this->attribute_model->get_all();if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute does not exist."), 200);} else {    $this->response($modelResult, 200); }}function index_get() { $getArray = $this->assembleRequestPayload('get');$validData = $this->attribute_model->validate( $getArray, "get" );if	(!$validData["isValid"]){$this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->get( $sanatizedPayload );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute does not exist."), 200);} else {    $this->response($modelResult, 200); }}}function index_put() { $whereArray = array("id"=> $this->put("id"));$putArray = $this->assembleRequestPayload('put');$validData = $this->attribute_model->validate( $putArray, "put" );if	(!$validData["isValid"]){ $this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->put( $sanatizedPayload, $whereArray );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute put request failure."), 200);} else {    $this->response($modelResult, 200); }}}function index_post() { $postArray = $this->assembleRequestPayload('post');$validData = $this->attribute_model->validate( $postArray, "post" );if	(!$validData["isValid"]){$this->response( json_decode($validData["errorMsg"]) );} else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->post( $sanatizedPayload );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute post request failure."), 200);} else {    $this->response($modelResult, 200); }}}function index_delete() { $deleteArray = $this->assembleRequestPayload('delete');$validData = $this->attribute_model->validate( $deleteArray, "delete" );if	(!$validData["isValid"]){$this->response( json_decode($validData["errorMsg"]) );}else { $sanatizedPayload = $validData["payload"];$modelResult = $this->attribute_model->delete( $sanatizedPayload );if(!$modelResult) {  $this->response(array("success"=>"false","errorMsg"=>"attribute delete request failure."), 200);} else {    $this->response($modelResult, 200); }}}} function assembleRequestPayload($requestMethod) { switch($requestMethod){case "get": $reqArray = $this->getAssembler(); return $reqArray; break; case "put": $reqArray = $this->putAssembler(); return $reqArray; break; case "post": $reqArray = $this->postAssembler(); return $reqArray; break; case "delete": $reqArray = $this->deleteAssembler(); return $reqArray; break; } }function getAssembler()  {
// Assign Params if Detected 
$reqArray = array();
$id = $this->get("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id;}$name = $this->get("name");if(is_string($name) && strlen($name) > 0) {$reqArray["name"] = $name;}return $reqArray;}function putAssembler()  {
// Assign Params if Detected 
$reqArray = array();
$id = $this->put("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id;}$name = $this->put("name");if(is_string($name) && strlen($name) > 0) {$reqArray["name"] = $name;}$type = $this->put("type");if(is_string($type) && strlen($type) > 0) {$reqArray["type"] = $type;}$length = $this->put("length");if(is_string($length) && strlen($length) > 0) {$reqArray["length"] = $length;}$regex_pattern = $this->put("regex_pattern");if(is_string($regex_pattern) && strlen($regex_pattern) > 0) {$reqArray["regex_pattern"] = $regex_pattern;}$is_primary_key = $this->put("is_primary_key");if(is_string($is_primary_key) && strlen($is_primary_key) > 0) {$reqArray["is_primary_key"] = $is_primary_key;}$is_unique = $this->put("is_unique");if(is_string($is_unique) && strlen($is_unique) > 0) {$reqArray["is_unique"] = $is_unique;}return $reqArray;}function postAssembler()  {
// Assign Params if Detected 
$reqArray = array();
$name = $this->post("name");if(is_string($name) && strlen($name) > 0) {$reqArray["name"] = $name;}$type = $this->post("type");if(is_string($type) && strlen($type) > 0) {$reqArray["type"] = $type;}$length = $this->post("length");if(is_string($length) && strlen($length) > 0) {$reqArray["length"] = $length;}$regex_pattern = $this->post("regex_pattern");if(is_string($regex_pattern) && strlen($regex_pattern) > 0) {$reqArray["regex_pattern"] = $regex_pattern;}$is_primary_key = $this->post("is_primary_key");if(is_string($is_primary_key) && strlen($is_primary_key) > 0) {$reqArray["is_primary_key"] = $is_primary_key;}$is_unique = $this->post("is_unique");if(is_string($is_unique) && strlen($is_unique) > 0) {$reqArray["is_unique"] = $is_unique;}return $reqArray;}function deleteAssembler( )  {
// Assign Params if Detected 
$reqArray = array();
$id = $this->delete("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id;}return $reqArray;}/* end of Attribute.php */