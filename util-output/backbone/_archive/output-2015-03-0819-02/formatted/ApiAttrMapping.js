define(function() {
    var ApiAttrMapping = Backbone.Model.extend({
        url: "webservice/api_attr_mapping",
        validate: function() {}
    });
    return ApiAttrMapping;
});