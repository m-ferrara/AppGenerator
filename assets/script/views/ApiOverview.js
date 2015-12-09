define([
  // These are path alias that we configured in our bootstrap
  'jquery',     // lib/jquery/jquery
  'underscore', // lib/underscore/underscore
  'Backbone',    // lib/backbone/backbone
  'Handlebars',
  'util', 
 // 'epoxy',
  '../../../assets/templates/handlebars/ApiOverview.js'
], function($, _, Backbone, Handlebars, $Util, Templates){
  // handle handlebars lol
  //window.Handlebars = Handlebars;
  //console.log(AttributeTemplate);
  //window.attributeTemplate = AttributeTemplate;
  
  var apiOverviewView = Backbone.View.extend({
    el: $('#content'),
    viewPanelEl: $("#api-detail"),
    
    template: Templates,
    
    inEditState : false,
    
    hasRendered: false,
    
    events : {
    	'click #toggle-edit' : 'toggleEdit'
    	,'click .btn.save-edit' : 'saveEdit'
    	,'click .btn.delete' : 'confirmDelete'
    },
    
    initialize : function(options) {
		this.options = options;
		this.tabContentEl = options.tabContentEl;
    //	this.viewMode = options.viewMode;
    	//this.render();
    	//console.log(epoxy);
    	//this.model.bind("change", this.render, this);
 		this.listenTo(this.model, 'change', this.render);
    },

    render: function() {
    	   var modelJSON = this.model.toJSON();
      		var jsonStringLength = modelJSON.toString().length;
      		
    	if (!this.hasRendered) 
    	{
      		// this.$el.html(_.template(AttributeTemplate,{
      		// model: this.model.toJSON()
      		// }));
      		//console.log(jsonStringLength);
	      	if (jsonStringLength > 0 ){
				this.$el.append(this.template(this.model.toJSON()));	
				this.hasRendered = true;	
			}
		}
		else {
			$("#" + this.tabContentEl).remove();
			
			this.$el.append(this.template(this.model.toJSON()));		

		}
		
		// if(this.viewMode == "edit") {
			// this.changeViewMode(this.viewMode);
		// }
      
      return this;
      
    },
    
    toggleEdit : function(ev){
    	var viewPanel = $("#api-detail"),
    		btnEl = $(ev.target);
    		
      if(!this.inEditState && btnEl.hasClass("edit"))
      {
      	// reset edit to currently active, enable fields, show edit controls
      	viewPanel.find("li.active").removeClass("active");
      	btnEl.parent("li").addClass('active');
      	// enable input fields, show edit controls (save/delete)
    	viewPanel.find("input[disabled]").removeAttr("disabled");
    	viewPanel.find("#edit-controls").css({"visibility":"visible"});
    	this.inEditState = true;
      }
      else if (btnEl.hasClass("view"))
      {
      	// reset view to currently active, disable fields, hide edit controls
      	viewPanel.find("li.active").removeClass("active");
      	btnEl.parent("li").addClass('active');
      	viewPanel.find("input").attr("disabled","disabled");
    	viewPanel.find("#edit-controls").css({"visibility":"hidden"});
    	this.inEditState = false;
      }
      else {
      	// must click view or show
      	return false;
      }
    },
    
    changeViewMode : function(mode) {
	   	var viewPanel = $("#api-detail"),
	   	editBtn = $("li > a.edit"),
	   	viewBtn = $("li > a.view");
    		
      if(mode == "edit")
      {
      	// reset edit to currently active, enable fields, show edit controls
      	viewPanel.find("li.active").removeClass("active");
      	editBtn.parent("li").addClass('active');
      	// enable input fields, show edit controls (save/delete)
    	viewPanel.find("input[disabled]").removeAttr("disabled");
    	viewPanel.find("#edit-controls").css({"visibility":"visible"});
    	this.inEditState = true;
      }
      else
      {
      	// reset view to currently active, disable fields, hide edit controls
      	viewPanel.find("li.active").removeClass("active");
      	viewBtn.parent("li").addClass('active');
      	viewPanel.find("input").attr("disabled","disabled");
    	viewPanel.find("#edit-controls").css({"visibility":"hidden"});
    	this.inEditState = false;
      }
    },
    
    saveEdit : function(ev){
    	// stop button element from resetting form
    	ev.preventDefault();
    	if (!this.inEditState) {
    		$Util.showErrorModal("Must be in \"Edit Mode\" to save.");
    		return false;
    	}
    	// fix checkbox values
    	this.checkboxValueConvert();
    	// get form values, save
    	var formInput = $("#api-detail input").serializeArray();
    	formInput = this.addUnselectedFields(formInput);
    	
    	
    	this.updateViewModel(formInput);

    	 alert(JSON.stringify(this.model.toJSON()));
    	this.model.save();
    },
    
    confirmDelete : function(ev){
    	ev.preventDefault();
    	var isConfirmed = confirm("Confirm delete action: yes/delete, no/cancel");
		
		if(isConfirmed) {	
			// backbone sync delete
			reqOptions = {
				url: this.model.url + "\\" + this.model.get("id"),
				dataType: 'json',
				success: function(){
					alert("Delete was successful");
				},
			};

			Backbone.sync("delete", this.model, reqOptions);	
/*
			this.model.destroy({
				success: function(){
					alert("Delete was successful");
				}
			});*/

		}
    },
    
    //Auxiliar function
	updateViewModel: function(formSerialized) { 
	    var self = this;
	    var unindexed_array = formSerialized;
	    $.map(unindexed_array, function(n, i){
	    	var keyName = n["name"];
	    	var keyVal = n["value"];
	    	var obj = {};
	    	obj[ keyName ] = keyVal;
	         self.model.set(obj);
	    });
	},
	
	checkboxValueConvert: function(){
		var chkBxs = $("input[type='checkbox']");
		
		chkBxs.each(function(i, el){
			var chkBox = $(el);
			if (chkBox.is(":checked"))
			{
				chkBox.attr('value','1');
			}
			else
			{
				chkBox.attr('value','0');
			}
		});
	},
	
	addUnselectedFields: function(inputObj) {
	// recieves serializeArray array of name value objects
		var chkBxs = $("input[type='checkbox']");
		chkBxs.each(function(i,el){
			if(!$(el).is(":checked")){
			var name = $(el).attr("name"),
			val = $(el).attr("value");
			inputObj.push({'name':name,'value':val});
			}
		});
		return inputObj;
	}
	
  });
  return apiOverviewView;
});