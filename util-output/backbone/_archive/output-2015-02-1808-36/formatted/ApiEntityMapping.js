define(function() {
    var ApiEntityMapping = Backbone.Model.extend({
        url: "webservice/api_entity_mapping",
        validate: function() {}
    });
    return ApiEntityMapping;
});