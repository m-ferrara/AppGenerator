<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Entity_rest_attr_mapping extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("entity_rest_attr_mapping_model");
    } 
    function index_get()
    {
        $getArray = array("ent_id" => $this -> get("ent_id"));
        $validData = $this -> entity_rest_attr_mapping_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_rest_attr_mapping_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_rest_attr_mapping does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("ent_id" => $this -> put("ent_id"));
        $putArray = array("ent_id" => $this -> put("ent_id"), "attr_id" => $this -> put("attr_id"), "category" => $this -> put("category"), "method" => $this -> put("method"));
        $validData = $this -> entity_rest_attr_mapping_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_rest_attr_mapping_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_rest_attr_mapping put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = array("ent_id" => $this -> post("ent_id"), "attr_id" => $this -> post("attr_id"), "category" => $this -> post("category"), "method" => $this -> post("method"));
        $validData = $this -> entity_rest_attr_mapping_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_rest_attr_mapping_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_rest_attr_mapping post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $whereArray = array("ent_id" => $this -> delete("ent_id"));
        $validData = $this -> entity_rest_attr_mapping_model -> validate($whereArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_rest_attr_mapping_model -> delete($whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity_rest_attr_mapping delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Entity_rest_attr_mapping.php
 */