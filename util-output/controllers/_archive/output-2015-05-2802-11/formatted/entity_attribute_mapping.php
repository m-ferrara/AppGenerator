<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Entity_attribute_mapping extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("entity_attribute_mapping_model");
    } 
    function collection_get()
    {
        $modelResult = $this -> entity_attribute_mapping_model -> get_all();
        if (!$modelResult) {
            $this -> response(array("success" => "false", "errorMsg" => "entity_attribute_mapping does not exist."), 200);
        } else {
            $this -> response($modelResult, 200);
        } 
    } 
    function index_get()
    {
        $getArray = $this -> entity_attribute_mapping_model -> assembleRequestPayload('get');
        $validData = $this -> entity_attribute_mapping_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_attribute_mapping_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_attribute_mapping does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("ent_id" => $this -> put("ent_id"));
        $putArray = $this -> entity_attribute_mapping_model -> assembleRequestPayload('put');
        $validData = $this -> entity_attribute_mapping_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_attribute_mapping_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_attribute_mapping put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = $this -> entity_attribute_mapping_model -> assembleRequestPayload('post');
        $validData = $this -> entity_attribute_mapping_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_attribute_mapping_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_attribute_mapping post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $deleteArray = $this -> entity_attribute_mapping_model -> assembleRequestPayload('delete');
        $validData = $this -> entity_attribute_mapping_model -> validate($deleteArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_attribute_mapping_model -> delete($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_attribute_mapping delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Entity_attribute_mapping.php
 */