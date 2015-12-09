<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Api extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("api_model");
    } 
    function collection_get()
    {
        $modelResult = $this -> api_model -> get_all();
        if (!$modelResult) {
            $this -> response(array("success" => "false", "errorMsg" => "api does not exist."), 200);
        } else {
            $this -> response($modelResult, 200);
        } 
    } 
    function index_get()
    {
        $getArray = $this -> assembleRequestPayload('get');
        $validData = $this -> api_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "api does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("id" => $this -> put("id"));
        $putArray = $this -> assembleRequestPayload('put');
        $validData = $this -> api_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "api put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = $this -> assembleRequestPayload('post');
        $validData = $this -> api_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "api post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $deleteArray = $this -> assembleRequestPayload('delete');
        $validData = $this -> api_model -> validate($deleteArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_model -> delete($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "api delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
function assembleRequestPayload($requestMethod)
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
/**
 * end of Api.php
 */