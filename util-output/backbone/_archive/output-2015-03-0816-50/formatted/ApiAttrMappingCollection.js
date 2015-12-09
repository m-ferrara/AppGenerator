define([ "models/ApiAttrMapping" ], function(ApiAttrMapping) {
    var ApiAttrMappingCollection = Backbone.Collection.extend({
        model: ApiAttrMapping,
        url: "webservice/api_attr_mappings"
    });
    return ApiAttrMappingCollection;
});