<?php class Api_entity_mapping_model extends CI_Model {	function __construct() 	{ 	parent::__construct(); 	}  function get_all () { $dbResult = $this->db->get( "api_entity_mapping" );return $dbResult->result();}function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "api_entity_mapping" );if ($dbResult->num_rows()==1) {return $dbResult->row();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "api_entity_mapping", $putArray );if ($dbUpdate) {$affectedRows = $this->db->affected_rows();if ($affectedRows == 0) { return false; } else { return true; }}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "api_entity_mapping", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "api_entity_mapping" );$affectedRows = $this->db->affected_rows();if ($affectedRows == 0) { return false; } else { return true; }}function validate( $requestPayload , $requestMethod ) { switch($requestMethod){case "get": $validStatus = $this->getValidator( $requestPayload ); return $validStatus; break; case "put": $validStatus = $this->putValidator( $requestPayload ); return $validStatus; break; case "post": $validStatus = $this->postValidator( $requestPayload ); return $validStatus; break; case "delete": $validStatus = $this->deleteValidator( $requestPayload ); return $validStatus; break; } }function getValidator( $RequestPayload )  {















