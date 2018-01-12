const path = require('path');
const webpack = require('webpack');
var CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
	context: path.resolve(__dirname, 'node_modules'),
	entry: {
		vendor: [ 'es6-promise', '../entry.js' ]
	},
	output: {
		filename: '[name].bundle.js',
		path: path.resolve(__dirname, '../core/vendor/')
	},
	plugins: [
		new webpack.ProvidePlugin({
			// TODO: why is this not working?
			// $: 'jquery',
			// jQuery: 'jquery',
			// _: 'underscore',
			// Promise: 'es6-promise'
		}),
		new CopyWebpackPlugin([
			{ from: 'browser-update/browser-update.js', to: 'browser-update/browser-update.js' },
			{ from: 'showdown/dist/showdown.js', to: 'showdown/dist/showdown.js' },
			{ from: 'base64/base64.js', to: 'base64/base64.js' },
			{ from: 'zxcvbn/dist/zxcvbn.js', to: 'zxcvbn/dist/zxcvbn.js'},
			{ from: 'select2/select2.css', to: 'select2/select2.css'},
		])
	]
};
