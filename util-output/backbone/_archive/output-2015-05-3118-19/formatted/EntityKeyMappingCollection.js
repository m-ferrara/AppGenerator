define([ "models/EntityKeyMapping" ], function(EntityKeyMapping) {
    var EntityKeyMappingCollection = Backbone.Collection.extend({
        model: EntityKeyMapping,
        url: $APP_URL_ROOT + "webservice/entity_attribute_mappings"
    });
    return EntityKeyMappingCollection;
});