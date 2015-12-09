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
        $getArray = $this -> api_model -> assembleRequestPayload('get');
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
        $putArray = $this -> api_model -> assembleRequestPayload('put');
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
        $postArray = $this -> api_model -> assembleRequestPayload('post');
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
        $deleteArray = $this -> api_model -> assembleRequestPayload('delete');
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
/**
 * end of Api.php
 */