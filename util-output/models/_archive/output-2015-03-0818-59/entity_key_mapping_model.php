<?php class Entity_key_mapping_model extends CI_Model { function __construct()  {  parent::__construct();  }  function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "entity_key_mapping" );if ($dbResult->num_rows()==1) {return $dbResult->result();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "entity_key_mapping", $putArray );if ($dbUpdate) {return true;}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "entity_key_mapping", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "entity_key_mapping" );}function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case "get": $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case "put": $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case "post": $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case "delete": $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }function getValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("ent_id"=>"number");$MandatoryRules = array("ent_id");

// Sanatization Rules 

$SntnRules = array("ent_id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function putValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$MandatoryRules = array("attr_id", "ent_id", "is_primary_key");

// Sanatization Rules 

$SntnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function postValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$MandatoryRules = array("attr_id", "ent_id");

// Sanatization Rules 

$SntnRules = array("attr_id"=>"number", "ent_id"=>"number", "is_primary_key"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}function deleteValidator( $RequestPayload )  {

// Validation Rules 

$VldtnRules = array("attr_id"=>"number", "ent_id"=>"number");$MandatoryRules = array("attr_id", "ent_id");

// Sanatization Rules 

$SntnRules = array("attr_id"=>"number", "ent_id"=>"number");$UniqueRules = array();$validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);if ($validator->validate($RequestPayload)) {$sanatizedPayload = $validator->sanatize($RequestPayload);return array("isValid" => true, "payload" => $sanatizedPayload);} else {return array("isValid" => false, "errorMsg" => $validator->getJSON());}}}/* end of Entity_key_mapping_model.php */