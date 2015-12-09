define([ "models/Api" ], function(Api) {
    var ApiCollection = Backbone.Collection.extend({
        model: Api,
        url: "webservice/apis"
    });
    return ApiCollection;
});