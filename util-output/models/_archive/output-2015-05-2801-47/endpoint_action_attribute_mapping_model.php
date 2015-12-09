<?php class Endpoint_action_attribute_mapping_model extends CI_Model { function __construct()  {  parent::__construct();  }  function get_all () { $dbResult = $this->db->get( "endpoint_action_attribute_mapping" );return $dbResult->result();}function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "endpoint_action_attribute_mapping" );if ($dbResult->num_rows()==1) {return $dbResult->row();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "endpoint_action_attribute_mapping", $putArray );if ($dbUpdate) {return true;}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "endpoint_action_attribute_mapping", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "endpoint_action_attribute_mapping" );}function assembleRequestParamArray($requestMethod) { switch($requestMethod){case "get": $reqArray = $this->getAssembler(); return $reqArray; break; case "put": $reqArray = $this->putAssembler(); return $reqArray; break; case "post": $reqArray = $this->postAssembler(); return $reqArray; break; case "delete": $reqArray = $this->deleteAssembler(); return $reqArray; break; } }function getAssembler()  {

// Assign Params if Detected 
 $reqArray = array();$endpt_id = $this->get("endpt_id");if(is_string($endpt_id) && strlen($endpt_id) > 0) {$reqArray["endpt_id"] = $endpt_id; }$acti>get("action_method");if(is_string($action_method) && strlen($action_method) > 0) {$reqArray["action_method"] = $action_method; }return $reqArray;}function putAssembler()  {

// Assign Params if Detected 
 $reqArray = array();$id = $this->put("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id; }$endpt_id = $this->put("endpt_id");if(is_string($endpt_id) && strlen($endpt_id) > 0) {$reqArray["endpt_id"] = $endpt_id; }$attr_id = $this->put("attr_id");if(is_string($attr_id) && strlen($attr_id) > 0) {$reqArray["attr_id"] = $attr_id; }$acti>put "action_method");if(is_string($action_method) && strlen($action_method) > 0) {$reqArray["action_method"] = $action_method; }$ent_id = $this->put("ent_id");if(is_string($ent_id) && strlen($ent_id) > 0) {$reqArray["ent_id"] = $ent_id; }$attr_id = $this->put("attr_id");if(is_string($attr_id) && strlen($attr_id) > 0) {$reqArray["attr_id"] = $attr_id; }$category = $this->put("category");if(is_string($category) && strlen($category) > 0) {$reqArray["category"] = $category; }$acti>put("action_method");if(is_string($action_method) && strlen($action_method) > 0) {$reqArray["action_method"] = $action_method; }return $reqArray;}function postAssembler()  {

// Assign Params if Detected 
 $reqArray = array();$endpt_id = $this->post("endpt_id");if(is_string($endpt_id) && strlen($endpt_id) > 0) {$reqArray["endpt_id"] = $endpt_id; }$attr_id = $this->post("attr_id");if(is_string($attr_id) && strlen($attr_id) > 0) {$reqArray["attr_id"] = $attr_id; }$category = $this->post("category");if(is_string($category) && strlen($category) > 0) {$reqArray["category"] = $category; }$acti>post("action_method");if(is_string($action_method) && strlen($action_method) > 0) {$reqArray["action_method"] = $action_method; }return $reqArray;}function deleteAssembler( )  {

// Assign Params if Detected 

$reqArray = array();$id = $this->delete("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id; }return $reqArray;}function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case "get": $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case "put": $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case "post": $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case "delete": $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }function getValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("endpt_id"=>"number", "action_method"=>"alfanum");$MandatoryRules = array("endpt_id");

// Sanatization Rules 

$SntnRules = array("endpt_id"=>"number", "action_method"=>"alfanum");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function putValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("id"=>"number", "endpt_id"=>"number", "attr_id"=>"number", "action_method"=>"alfanum", "ent_id"=>"number", "attr_id"=>"number", "category"=>"alfanum", "action_method"=>"alfanum");$MandatoryRules = array("id", "endpt_id", "attr_id", "action_method");

// Sanatization Rules 

$SntnRules = array("id"=>"number", "endpt_id"=>"number", "attr_id"=>"number", "action_method"=>"alfanum", "ent_id"=>"number", "attr_id"=>"number", "category"=>"alfanum", "action_method"=>"alfanum");$UniqueRules = array("endpt_id"=>"endpoint_action_attribute_mapping", "attr_id"=>"endpoint_action_attribute_mapping", "action_method"=>"endpoint_action_attribute_mapping");$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function postValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("endpt_id"=>"number", "attr_id"=>"number", "category"=>"alfanum", "action_method"=>"alfanum");$MandatoryRules = array("endpt_id", "attr_id", "category", "action_method");

// Sanatization Rules 

$SntnRules = array("endpt_id"=>"number", "attr_id"=>"number", "category"=>"alfanum", "action_method"=>"alfanum");$UniqueRules = array("endpt_id"=>"endpoint_action_attribute_mapping", "attr_id"=>"endpoint_action_attribute_mapping", "action_method"=>"endpoint_action_attribute_mapping");$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function deleteValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("id"=>"number");$MandatoryRules = array("id");

// Sanatization Rules 

$SntnRules = array("id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}}/* end of Endpoint_action_attribute_mapping_model.php */