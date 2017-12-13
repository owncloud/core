(function () {
	"use strict";

	OC.Autobahn = {

		session: null,

		wsuri: 'ws://localhost:8080/ws',

		subscribe: function (topic,callback) {
			this.connect().then(function (session) {
				session.subscribe(topic, callback);
			});
		},

		connect: function () {
			var $d = $.Deferred();
			if (this.session !== null) {
				return $.Deferred().resolve(this.session).promise();
			}
			// the WAMP connection to the Router
			//
			var connection = new autobahn.Connection({
				url: this.wsuri,
				realm: "realm1"
			});

			var self = this;
			connection.onopen = function (session, details) {
				self.session = session;
				console.log("Connected to " + self.wsuri, details);
				$d.resolve(session);
			};

			connection.onclose = function (reason, details) {
				sess = null;
				console.log("connection closed ", reason, details);
			};

			connection.open();
			return $d.promise();
		}
	};
})();
