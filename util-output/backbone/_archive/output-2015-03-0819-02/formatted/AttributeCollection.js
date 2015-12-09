define([ "models/Attribute" ], function(Attribute) {
    var AttributeCollection = Backbone.Collection.extend({
        model: Attribute,
        url: "webservice/attributes"
    });
    return AttributeCollection;
});