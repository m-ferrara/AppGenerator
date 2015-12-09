<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Endpoint extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("endpoint_model");
    } 
    function collection_get()
    {
        $modelResult = $this -> endpoint_model -> get_all();
        if (!$modelResult) {
            $this -> response(array("success" => "false", "errorMsg" => "endpoint does not exist."), 200);
        } else {
            $this -> response($modelResult, 200);
        } 
    } 
    function index_get()
    {
        $getArray = $this -> assembleRequestPayload('get');
        $validData = $this -> endpoint_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> endpoint_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "endpoint does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("id" => $this -> put("id"));
        $putArray = $this -> assembleRequestPayload('put');
        $validData = $this -> endpoint_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> endpoint_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "endpoint put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = $this -> assembleRequestPayload('post');
        $validData = $this -> endpoint_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> endpoint_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "endpoint post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $deleteArray = $this -> assembleRequestPayload('delete');
        $validData = $this -> endpoint_model -> validate($deleteArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> endpoint_model -> delete($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "endpoint delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Endpoint.php
 */