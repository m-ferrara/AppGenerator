<?php class Endpoint_action_attribute_mapping_model extends CI_Model { function __construct()  {  parent::__construct();  }  function get_all () { $dbResult = $this->db->get( "endpoint_action_attribute_mapping" );return $dbResult->result();}function get ( $getArray ) { $dbWhere = $this->db->where( $getArray ); $dbResult = $this->db->get( "endpoint_action_attribute_mapping" );if ($dbResult->num_rows()==1) {return $dbResult->row();} else if ($dbResult->num_rows()>1) {return $dbResult->result(); }else {return false; }}function put ( $putArray, $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbUpdate = $this->db->update( "endpoint_action_attribute_mapping", $putArray );if ($dbUpdate) {return true;}else {return false;}}function post ( $postArray ) { $dbInsert = $this->db->insert( "endpoint_action_attribute_mapping", $postArray );if ($dbInsert) {return $this->db->insert_id();}else {return false;}}function delete ( $whereArray ) { $dbWhere = $this->db->where( $whereArray );$dbDelete = $this->db->delete( "endpoint_action_attribute_mapping" );}function assembleRequestParamArray($requestMethod) { switch($requestMethod){case "get": $reqArray = $this->getAssembler(); return $reqArray; break; case "put": $reqArray = $this->putAssembler(); return $reqArray; break; case "post": $reqArray = $this->postAssembler(); return $reqArray; break; case "delete": $reqArray = $this->deleteAssembler(); return $reqArray; break; } }function getAssembler()  {




















