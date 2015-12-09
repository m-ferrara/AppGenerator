define([ "models/EntityRestProfile" ], function(EntityRestProfile) {
    var EntityRestProfileCollection = Backbone.Collection.extend({
        model: EntityRestProfile,
        url: "webservice/entity_rest_profiles"
    });
    return EntityRestProfileCollection;
});