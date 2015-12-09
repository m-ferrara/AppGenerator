define([ "models/Entity" ], function(Entity) {
    var EntityCollection = Backbone.Collection.extend({
        model: Entity,
        url: "webservice/entitys"
    });
    return EntityCollection;
});