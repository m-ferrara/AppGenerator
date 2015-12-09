define([ "models/ApiEntityMapping" ], function(ApiEntityMapping) {
    var ApiEntityMappingCollection = Backbone.Collection.extend({
        model: ApiEntityMapping,
        url: "webservice/api_entity_mappings"
    });
    return ApiEntityMappingCollection;
});