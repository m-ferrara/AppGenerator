define([ "models/EntityKeyMapping" ], function(EntityKeyMapping) {
    var EntityKeyMappingCollection = Backbone.Collection.extend({
        model: EntityKeyMapping,
        url: "webservice/entity_key_mappings"
    });
    return EntityKeyMappingCollection;
});