define(function() {
    var Attribute = Backbone.Model.extend({
        url: "webservice/attribute",
        validate: function() {}
    });
    return Attribute;
});