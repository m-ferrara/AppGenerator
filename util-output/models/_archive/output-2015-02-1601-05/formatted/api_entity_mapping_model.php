<?php class Api_entity_mapping_model extends CI_Model {
    function __construct()
    {
        parent :: __construct();
    } 
    function get ($getArray)
    {
        $dbWhere = $this -> db -> where($getArray);
        $dbResult = $this -> db -> get("api_entity_mapping");
        return $dbResult -> result();
    } 
    function put ($putArray, $whereArray)
    {
        $dbWhere = $this -> db -> where($whereArray);
        $dbUpdate = $this -> db -> update("api_entity_mapping", $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        } 
    } 
    function post ($postArray)
    {
        $dbInsert = $this -> db -> insert("api_entity_mapping", $postArray);
        if ($dbInsert) {
            return $this -> db -> insert_id();
        } else {
            return false;
        } 
    } 
    function delete ($whereArray)
    {
        $dbWhere = $this -> db -> where($whereArray);
        $dbDelete = $this -> db -> delete("api_entity_mapping");
    } 
    function validate($requestPayload , $requestMethod)
    {
        switch ($requestMethod) {
        case "get": $validStatus = $this -> getValidator($requestPayload);
            return $validStatus;
            break;
        case "put": $validStatus = $this -> putValidator($requestPayload);
            return $validStatus;
            break;
        case "post": $validStatus = $this -> postValidator($requestPayload);
            return $validStatus;
            break;
        case "delete": $validStatus = $this -> deleteValidator($requestPayload);
            return $validStatus;
            break;
        } 
    } 
} 
/**
 * end of Api_entity_mapping_model.php
 */