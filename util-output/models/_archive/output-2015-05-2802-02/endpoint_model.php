<?php class Endpoint_model extends CI_Model { function __construct()  {  parent::__construct();  }  function get_all () { $dbResult = $this->db->get( "endpoint" );return $dbResult->result();}function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "endpoint" );if ($dbResult->num_rows()==1) {return $dbResult->row();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "endpoint", $putArray );if ($dbUpdate) {return true;}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "endpoint", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "endpoint" );}function assembleRequestParamArray($requestMethod) { switch($requestMethod){case "get": $reqArray = $this->getAssembler(); return $reqArray; break; case "put": $reqArray = $this->putAssembler(); return $reqArray; break; case "post": $reqArray = $this->postAssembler(); return $reqArray; break; case "delete": $reqArray = $this->deleteAssembler(); return $reqArray; break; } }function getAssembler()  {

// Assign Params if Detected 

$reqArray = array();

$api_id = $this->get("api_id");

if(is_string($api_id) && strlen($api_id) > 0) {

$reqArray["api_id"] = $api_id;

}

return $reqArray;

}function putAssembler()  {

// Assign Params if Detected 

$reqArray = array();

$ent_id = $this->put("ent_id");

if(is_string($ent_id) && strlen($ent_id) > 0) {

$reqArray["ent_id"] = $ent_id;

}

$api_id = $this->put("api_id");

if(is_string($api_id) && strlen($api_id) > 0) {

$reqArray["api_id"] = $api_id;

}

return $reqArray;

}function postAssembler()  {

// Assign Params if Detected 

$reqArray = array();

$ent_id = $this->post("ent_id");

if(is_string($ent_id) && strlen($ent_id) > 0) {

$reqArray["ent_id"] = $ent_id;

}

$api_id = $this->post("api_id");

if(is_string($api_id) && strlen($api_id) > 0) {

$reqArray["api_id"] = $api_id;

}

return $reqArray;

}function deleteAssembler( )  {

// Assign Params if Detected 

$reqArray = array();

$id = $this->delete("id");

if(is_string($id) && strlen($id) > 0) {

$reqArray["id"] = $id;

}

return $reqArray;

}function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case "get": $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case "put": $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case "post": $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case "delete": $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }function getValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("api_id"=>"undefined");$MandatoryRules = array("api_id");

// Sanatization Rules 

$SntnRules = array("api_id"=>"undefined");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function putValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("ent_id"=>"number", "api_id"=>"undefined");$MandatoryRules = array("ent_id", "api_id");

// Sanatization Rules 

$SntnRules = array("ent_id"=>"number", "api_id"=>"undefined");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function postValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("ent_id"=>"number", "api_id"=>"undefined");$MandatoryRules = array("ent_id", "api_id");

// Sanatization Rules 

$SntnRules = array("ent_id"=>"number", "api_id"=>"undefined");$UniqueRules = array("ent_id"=>"endpoint", "api_id"=>"endpoint");$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function deleteValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("id"=>"number");$MandatoryRules = array("id");

// Sanatization Rules 

$SntnRules = array("id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}}/* end of Endpoint_model.php */