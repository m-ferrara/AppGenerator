<?php class Entity_rest_attr_mapping_model extends CI_Model {
    function __construct()
    {
        parent :: __construct();
    } 
    function get_all ()
    {
        $dbResult = $this -> db -> get("entity_rest_attr_mapping");
        return $dbResult -> result();
    } 
    function get ($getArray)
    {
        $dbWhere = $this -> db -> where($getArray);
        $dbResult = $this -> db -> get("entity_rest_attr_mapping");
        if ($dbResult -> num_rows() == 1) {
            return $dbResult -> row();
        } else if ($dbResult -> num_rows() > 1) {
            return $dbResult -> result();
        } else {
            return false;
        } 
    } 
    function put ($putArray, $whereArray)
    {
        $dbWhere = $this -> db -> where($whereArray);
        $dbUpdate = $this -> db -> update("entity_rest_attr_mapping", $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        } 
    } 
    function post ($postArray)
    {
        $dbInsert = $this -> db -> insert("entity_rest_attr_mapping", $postArray);
        if ($dbInsert) {
            return $this -> db -> insert_id();
        } else {
            return false;
        } 
    } 
    function delete ($whereArray)
    {
        $dbWhere = $this -> db -> where($whereArray);
        $dbDelete = $this -> db -> delete("entity_rest_attr_mapping");
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
    function getValidator($RequestPayload)
    {
        
        // Validation Rules
        $VldtnRules = array("ent_id" => "number", "method" => "alfanum");
        $MandatoryRules = array("ent_id");
        
        // Sanatization Rules
        $SntnRules = array("ent_id" => "number", "method" => "alfanum");
        $UniqueRules = array();
        $validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);
        if ($validator -> validate($RequestPayload)) {
            $sanatizedPayload = $validator -> sanatize($RequestPayload);
            return array("isValid" => true, "payload" => $sanatizedPayload);
        } else {
            return array("isValid" => false, "errorMsg" => $validator -> getJSON());
        } 
    } 
    function putValidator($RequestPayload)
    {
        
        // Validation Rules
        $VldtnRules = array("ent_id" => "number", "attr_id" => "number", "method" => "alfanum", "ent_id" => "number", "attr_id" => "number", "category" => "alfanum", "method" => "alfanum");
        $MandatoryRules = array("ent_id", "attr_id", "method");
        
        // Sanatization Rules
        $SntnRules = array("ent_id" => "number", "attr_id" => "number", "method" => "alfanum", "ent_id" => "number", "attr_id" => "number", "category" => "alfanum", "method" => "alfanum");
        $UniqueRules = array();
        $validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);
        if ($validator -> validate($RequestPayload)) {
            $sanatizedPayload = $validator -> sanatize($RequestPayload);
            return array("isValid" => true, "payload" => $sanatizedPayload);
        } else {
            return array("isValid" => false, "errorMsg" => $validator -> getJSON());
        } 
    } 
    function postValidator($RequestPayload)
    {
        
        // Validation Rules
        $VldtnRules = array("ent_id" => "number", "attr_id" => "number", "category" => "alfanum", "method" => "alfanum");
        $MandatoryRules = array("ent_id", "attr_id", "category", "method");
        
        // Sanatization Rules
        $SntnRules = array("ent_id" => "number", "attr_id" => "number", "category" => "alfanum", "method" => "alfanum");
        $UniqueRules = array("ent_id" => "entity_rest_attr_mapping", "attr_id" => "entity_rest_attr_mapping", "category" => "entity_rest_attr_mapping");
        $validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);
        if ($validator -> validate($RequestPayload)) {
            $sanatizedPayload = $validator -> sanatize($RequestPayload);
            return array("isValid" => true, "payload" => $sanatizedPayload);
        } else {
            return array("isValid" => false, "errorMsg" => $validator -> getJSON());
        } 
    } 
    function deleteValidator($RequestPayload)
    {
        
        // Validation Rules
        $VldtnRules = array("ent_id" => "number", "attr_id" => "number", "category" => "alfanum");
        $MandatoryRules = array("ent_id", "attr_id", "category");
        
        // Sanatization Rules
        $SntnRules = array("ent_id" => "number", "attr_id" => "number", "category" => "alfanum");
        $UniqueRules = array();
        $validator = new Custom_Validator($VldtnRules, $MandatoryRules, $SntnRules, $UniqueRules);
        if ($validator -> validate($RequestPayload)) {
            $sanatizedPayload = $validator -> sanatize($RequestPayload);
            return array("isValid" => true, "payload" => $sanatizedPayload);
        } else {
            return array("isValid" => false, "errorMsg" => $validator -> getJSON());
        } 
    } 
} 
/**
 * end of Entity_rest_attr_mapping_model.php
 */