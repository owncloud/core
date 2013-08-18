/**
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

module.exports = function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wrap');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-karma');

	grunt.initConfig({
		meta: {
			pkg:
				grunt.file.readJSON('package.json'),
				version: '<%= meta.pkg.version %>',
				banner:'/**\n' +
				' * <%= meta.pkg.description %> - v<%= meta.version %>\n' +
				' *\n' +
				' * Copyright (c) <%= grunt.template.today("yyyy") %> - ' +
				'<%= meta.pkg.author.name %> <<%= meta.pkg.author.email %>>\n' +
				' *\n' +
				' * This library is free software; you can redistribute it and/or\n' +
				' * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE\n' +
				' * License as published by the Free Software Foundation; either\n' +
				' * version 3 of the License, or any later version.\n' +
				' *\n' +
				' * This library is distributed in the hope that it will be useful,\n' +
				' * but WITHOUT ANY WARRANTY; without even the implied warranty of\n' +
				' * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the\n' +
				' * GNU AFFERO GENERAL PUBLIC LICENSE for more details.\n' +
				' *\n' +
				' * You should have received a copy of the GNU Affero General Public\n' +
				' * License along with this library.  If not, see <http://www.gnu.org/licenses/>.\n' +
				' *\n' +
				' */\n\n',
				settings_src: '../settings/js/users/app/',
				settings_production: '../settings/js/users/public/',
				settings_tests: '../settings/tests/'
		},
		concat: {
			app: {
				options: {
					banner: '<%= meta.banner %>\n',
					stripBanners: {
						options : {
							block:true
						}
					}
				},
				src: [
					'<%= meta.settings_src %>config.js',
					'<%= meta.settings_src %>service.js',
					'<%= meta.settings_src %>controller.js',
					'<%= meta.settings_src %>directive.js',
					'<%= meta.settings_src %>filter.js'
				],
				dest: '<%= meta.settings_production %>app.js'
			}
		},
		wrap: {
			app: {
				src: ['<%= meta.settings_production %>app.js'],
				dest: '',
				wrapper: [
					'(function(angular, $, undefined){\n\n\'use strict\';\n\n',
					'\n})(angular, jQuery);'
				]
			}
		},
		jshint: {
			files: [
				'Gruntfile.js',
				'../settings/js/app/**/*.js',
				'../settings/js/config/*.js'
			],
			options: {
				// options here to override JSHint defaults
				globals: {
					console: true
				}
			}
		},
		watch: {
			concat: {
				files: [
					'<%= meta.settings_src %>config.js',
					'<%= meta.settings_src %>service.js',
					'<%= meta.settings_src %>controller.js',
					'<%= meta.settings_src %>directive.js',
					'<%= meta.settings_src %>filter.js'
				],
				tasks: 'compile'
			},
			test: {
				files: [
					'<%= meta.settings_src %>config.js',
					'<%= meta.settings_src %>service.js',
					'<%= meta.settings_src %>controller.js',
					'<%= meta.settings_src %>directive.js',
					'<%= meta.settings_src %>filter.js',
					'<%= meta.settings_tests %>**/*.js'
				],
				tasks: 'karma:unit'
			}
		},
		karma: {
			unit: {
				configFile: '../settings/js/tests/config/karma.js'
			},
			continuous: {
				configFile: '../settings/js/tests/config/karma.js',
				singleRun: true,
				browsers: ['PhantomJS'],
				reporters: ['progress']
			}
		}
	});
	grunt.registerTask('run', ['watch:concat']);
	grunt.registerTask('compile', ['jshint', 'concat', 'wrap']);
	grunt.registerTask('test', ['watch:test']);
};