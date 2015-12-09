define(function() {
    var EntityKeyMapping = Backbone.Model.extend({
        url: $APP_URL_ROOT + "webservice/entity_attribute_mapping",
        validate: function() {}
    });
    return EntityKeyMapping;
});