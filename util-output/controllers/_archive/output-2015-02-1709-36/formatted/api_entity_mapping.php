<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Api_entity_mapping extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("api_entity_mapping_model");
    } 
    function index_get()
    {
        $getArray = array("api_id" => $this -> get("api_id"));
        $validData = $this -> api_entity_mapping_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_entity_mapping_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("error" => "Sorry, api_entity_mapping Get request failure (does not exist)."), 404);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("api_id" => $this -> put("api_id"));
        $putArray = array("id" => $this -> put("id"), "api_id" => $this -> put("api_id"), "ent_id" => $this -> put("ent_id"));
        $validData = $this -> api_entity_mapping_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_entity_mapping_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("error" => "api_entity_mapping put request failure."), 404);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = array("api_id" => $this -> post("api_id"), "ent_id" => $this -> post("ent_id"));
        $validData = $this -> api_entity_mapping_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_entity_mapping_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("error" => "api_entity_mapping post request failure."), 404);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $whereArray = array("api_id" => $this -> delete("api_id"));
        $validData = $this -> api_entity_mapping_model -> validate($whereArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> api_entity_mapping_model -> delete($whereArray);
            if (!$modelResult) {
                $this -> response(array("error" => "api_entity_mapping delete request failure."), 404);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Api_entity_mapping.php
 */