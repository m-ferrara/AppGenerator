define(function() {
    var Api = Backbone.Model.extend({
        url: "webservice/api",
        validate: function() {}
    });
    return Api;
});