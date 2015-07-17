OC.Preview = {
	previewAvailable: function(mimetype) {
		var res = OC.Preview._Providers.map( function(provider) {
			var match = mimetype.match(new RegExp(provider));
			if (match && match.indexOf(mimetype) !== -1) {
				return true;
			}
			return false;
		});

		if (res.indexOf(true) !== -1) {
			return true;
		}
		return false;
	}
};

