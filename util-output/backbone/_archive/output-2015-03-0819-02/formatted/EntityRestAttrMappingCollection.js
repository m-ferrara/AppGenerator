define([ "models/EntityRestAttrMapping" ], function(EntityRestAttrMapping) {
    var EntityRestAttrMappingCollection = Backbone.Collection.extend({
        model: EntityRestAttrMapping,
        url: "webservice/entity_rest_attr_mappings"
    });
    return EntityRestAttrMappingCollection;
});