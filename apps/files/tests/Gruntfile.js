module.exports = function(grunt) {

	grunt.loadNpmTasks('grunt-phpunit');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.initConfig({
		"phpunit": {
			"classes": {
				"dir": '../tests'
			},
			"options": {
				"colors": true
			}
		},
		"watch": {
			"phpunit": {
				"files": '../**/*.php',
				"tasks": ['phpunit']
			}
		}
	});

	grunt.registerTask('phpunitwatch', ['watch:phpunit']);
};
