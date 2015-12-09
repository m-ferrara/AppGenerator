<?php
/**
 * Backbone Acts As URI Router - Displaying Corresponding View Template for Backbone Application 
 * so there are locations partitioned to develop against and match spec.
 */
class Backbone extends CI_Controller {
    
    function __construct() 
    {
        parent::__construct();
    //  $this->load->model('display_model');
    }

    function index(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/index"); //, $data);
    }
    
    function AttributeDetailView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/AttributeDetailView.html"); //, $data);
    }
    
    
    function AttributeListingView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/AttributeListingView.html"); //, $data);
    }
    
    
    function EntityDetailView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/EntityDetailView.html"); //, $data);
    }
    
    function EntityListingView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/EntityListingView.html"); //, $data);
    }
    
    
    function EntityRestDetailView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/EntityRestDetailView.html"); //, $data);
    }
    
    function EntityRestListingView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/EntityRestListingView.html"); //, $data);
    }
    
    function EntityRestOverviewView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/EntityRestOverviewView.html"); //, $data);
    }
    
    function IndexView(){
        //$data["data"] = $this->display_model->makeObject();
        $this->load->view("backbone/templates/Index.html"); //, $data);
    }
    
}
/*
 *  End of Backbone.php
 */