<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Entity extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("entity_model");
    } 
    function collection_get()
    {
        $modelResult = $this -> entity_model -> get_all();
        if (!$modelResult) {
            $this -> response(array("success" => "false", "errorMsg" => "entity does not exist."), 200);
        } else {
            $this -> response($modelResult, 200);
        } 
    } 
    function index_get()
    {
        $getArray = $this -> assembleRequestPayload('get');
        $validData = $this -> entity_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("id" => $this -> put("id"));
        $putArray = $this -> assembleRequestPayload('put');
        $validData = $this -> entity_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = $this -> assembleRequestPayload('post');
        $validData = $this -> entity_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $deleteArray = $this -> assembleRequestPayload('delete');
        $validData = $this -> entity_model -> validate($deleteArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> entity_model -> delete($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "entity delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Entity.php
 */