<?php defined("BASEPATH") OR exit("No direct script access allowed");
require APPPATH . "/libraries/REST_Controller.php";
class Attr_pending_list extends REST_Controller {
    function __construct()
    {
        parent :: __construct();
        $this -> load -> model("attr_pending_list_model");
    } 
    function collection_get()
    {
        $modelResult = $this -> attr_pending_list_model -> get_all();
        if (!$modelResult) {
            $this -> response(array("success" => "false", "errorMsg" => "attr_pending_list does not exist."), 200);
        } else {
            $this -> response($modelResult, 200);
        } 
    } 
    function index_get()
    {
        $getArray = array("attr_id" => $this -> get("attr_id"));
        $validData = $this -> attr_pending_list_model -> validate($getArray, "get");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> attr_pending_list_model -> get($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "attr_pending_list does not exist."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_put()
    {
        $whereArray = array("attr_id" => $this -> put("attr_id"));
        $putArray = array("attr_id" => $this -> put("attr_id"), "id" => $this -> put("id"));
        $validData = $this -> attr_pending_list_model -> validate($putArray, "put");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> attr_pending_list_model -> put($sanatizedPayload, $whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "attr_pending_list put request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_post()
    {
        $postArray = array("attr_id" => $this -> post("attr_id"),);
        $validData = $this -> attr_pending_list_model -> validate($postArray, "post");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> attr_pending_list_model -> post($sanatizedPayload);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "attr_pending_list post request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
    function index_delete()
    {
        $whereArray = array("attr_id" => $this -> delete("attr_id"));
        $validData = $this -> attr_pending_list_model -> validate($whereArray, "delete");
        if (!$validData["isValid"]) {
            $this -> response(json_decode($validData["errorMsg"]));
        } else {
            $sanatizedPayload = $validData["payload"];
            $modelResult = $this -> attr_pending_list_model -> delete($whereArray);
            if (!$modelResult) {
                $this -> response(array("success" => "false", "errorMsg" => "attr_pending_list delete request failure."), 200);
            } else {
                $this -> response($modelResult, 200);
            } 
        } 
    } 
} 
/**
 * end of Attr_pending_list.php
 */