define(['models/AttrPendingList'], function(AttrPendingList){var AttrPendingListCollection =  Backbone.Collection.extend({model: AttrPendingList,url: 'webservice/attr_pending_lists'});return AttrPendingListCollection;});