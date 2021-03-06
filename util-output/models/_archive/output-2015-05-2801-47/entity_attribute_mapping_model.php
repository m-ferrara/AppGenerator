<?php class Entity_attribute_mapping_model extends CI_Model { function __construct()  {  parent::__construct();  }  function get_all () { $dbResult = $this->db->get( "entity_key_mapping" );return $dbResult->result();}function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "entity_key_mapping" );if ($dbResult->num_rows()==1) {return $dbResult->row();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "entity_key_mapping", $putArray );if ($dbUpdate) {return true;}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "entity_key_mapping", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "entity_key_mapping" );}function assembleRequestParamArray($requestMethod) { switch($requestMethod){case "get": $reqArray = $this->getAssembler(); return $reqArray; break; case "put": $reqArray = $this->putAssembler(); return $reqArray; break; case "post": $reqArray = $this->postAssembler(); return $reqArray; break; case "delete": $reqArray = $this->deleteAssembler(); return $reqArray; break; } }function getAssembler()  {

// Assign Params if Detected 

$reqArray = array();$ent_id = $this->get("ent_id");if(is_string($ent_id) && strlen($ent_id) > 0) {$reqArray["ent_id"] = $ent_id; }return $reqArray;}function putAssembler()  {

// Assign Params if Detected 

$reqArray = array();$attr_id = $this->put("attr_id");if(is_string($attr_id) && strlen($attr_id) > 0) {$reqArray["attr_id"] = $attr_id; }$ent_id = $this->put("ent_id");if(is_string($ent_id) && strlen($ent_id) > 0) {$reqArray["ent_id"] = $ent_id; }$is_primary_key = $this->put("is_primary_key");if(is_string($is_primary_key) && strlen($is_primary_key) > 0) {$reqArray["is_primary_key"] = $is_primary_key; }return $reqArray;}function postAssembler()  {

// Assign Params if Detected 

$reqArray = array();$attr_id = $this->post("attr_id");if(is_string($attr_id) && strlen($attr_id) > 0) {$reqArray["attr_id"] = $attr_id; }$ent_id = $this->post("ent_id");if(is_string($ent_id) && strlen($ent_id) > 0) {$reqArray["ent_id"] = $ent_id; }$is_primary_key = $this->post("is_primary_key");if(is_string($is_primary_key) && strlen($is_primary_key) > 0) {$reqArray["is_primary_key"] = $is_primary_key; }return $reqArray;}function deleteAssembler( )  {

// Assign Params if Detected 

$reqArray = array();$id = $this->delete("id");if(is_string($id) && strlen($id) > 0) {$reqArray["id"] = $id; }return $reqArray;}function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case "get": $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case "put": $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case "post": $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case "delete": $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }function getValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("ent_id"=>"number");$MandatoryRules = array("ent_id");

// Sanatization Rules 

$SntnRules = array("ent_id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function putValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$MandatoryRules = array("attr_id", "ent_id");

// Sanatization Rules 

$SntnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function postValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$MandatoryRules = array("attr_id", "ent_id");

// Sanatization Rules 

$SntnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function deleteValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("id"=>"number");$MandatoryRules = array("id");

// Sanatization Rules 

$SntnRules = array("id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}}/* end of Entity_attribute_mapping_model.php */