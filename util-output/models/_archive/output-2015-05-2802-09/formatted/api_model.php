<?php class Api_model extends CI_Model {
    function __construct()
    {
        parent :: __construct();
    } 
    function get_all ()
    {
        $dbResult = $this -> db -> get("api");
        return $dbResult -> result();
    } 
    function get ($getArray)
    {
        $dbWhere = $this -> db -> where($getArray);
        $dbResult = $this -> db -> get("api");
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
        $dbUpdate = $this -> db -> update("api", $putArray);
        if ($dbUpdate) {
            return true;
        } else {
            return false;
        } 
    } 
    function post ($postArray)
    {
        $dbInsert = $this -> db -> insert("api", $postArray);
        if ($dbInsert) {
            return $this -> db -> insert_id();
        } else {
            return false;
        } 
    } 
    function delete ($whereArray)
    {
        $dbWhere = $this -> db -> where($whereArray);
        $dbDelete = $this -> db -> delete("api");
    } 
    function assembleRequestParamArray($requestMethod)
    {
        switch ($requestMethod) {
        case "get": $reqArray = $this -> getAssembler();
            return $reqArray;
            break;
        case "put": $reqArray = $this -> putAssembler();
            return $reqArray;
            break;
        case "post": $reqArray = $this -> postAssembler();
            return $reqArray;
            break;
        case "delete": $reqArray = $this -> deleteAssembler();
            return $reqArray;
            break;
        } 
    } 
    function getAssembler()
    {
        
        // Assign Params if Detected
        $reqArray = array();
        
        $id = $this -> get("id");
        
        if (is_string($id) && strlen($id) > 0) {
            
            $reqArray["id"] = $id;
            
            } 
        
        $name = $this -> get("name");
        
        if (is_string($name) && strlen($name) > 0) {
            
            $reqArray["name"] = $name;
            
            } 
        
        return $reqArray;
        
        } 
    function putAssembler()
    {
        
        // Assign Params if Detected
        $reqArray = array();
        
        $id = $this -> put("id");
        
        if (is_string($id) && strlen($id) > 0) {
            
            $reqArray["id"] = $id;
            
            } 
        
        $name = $this -> put("name");
        
        if (is_string($name) && strlen($name) > 0) {
            
            $reqArray["name"] = $name;
            
            } 
        
        return $reqArray;
        
        } 
    function postAssembler()
    {
        
        // Assign Params if Detected
        $reqArray = array();
        
        $name = $this -> post("name");
        
        if (is_string($name) && strlen($name) > 0) {
            
            $reqArray["name"] = $name;
            
            } 
        
        return $reqArray;
        
        } 
    function deleteAssembler()
    {
        
        // Assign Params if Detected
        $reqArray = array();
        
        $id = $this -> delete("id");
        
        if (is_string($id) && strlen($id) > 0) {
            
            $reqArray["id"] = $id;
            
            } 
        
        return $reqArray;
        
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
        $VldtnRules = array("id" => "number", "name" => "alfanum");
        $MandatoryRules = array("id");
        
        // Sanatization Rules
        $SntnRules = array("id" => "number", "name" => "alfanum");
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
        $VldtnRules = array("id" => "number", "name" => "alfanum");
        $MandatoryRules = array("id");
        
        // Sanatization Rules
        $SntnRules = array("id" => "number", "name" => "alfanum");
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
        $VldtnRules = array("name" => "alfanum");
        $MandatoryRules = array("name");
        
        // Sanatization Rules
        $SntnRules = array("name" => "alfanum");
        $UniqueRules = array();
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
        $VldtnRules = array("id" => "number");
        $MandatoryRules = array("id");
        
        // Sanatization Rules
        $SntnRules = array("id" => "number");
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
 * end of Api_model.php
 */