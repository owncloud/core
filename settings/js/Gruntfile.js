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
	grunt.loadNpmTasks('gruntacular');
	grunt.loadNpmTasks('grunt-wrap');
	grunt.loadNpmTasks('grunt-phpunit');
	grunt.initConfig({
		meta: {
		      pkg: grunt.file.readJSON('package.json'),
		      version: '<%= meta.pkg.version %>',
		      banner: '/**\n' + ' * <%= meta.pkg.description %> - v<%= meta.version %>\n' + ' *\n' + ' * Copyright (c) <%= grunt.template.today("yyyy") %> - ' + '<%= meta.pkg.author.name %> <<%= meta.pkg.author.email %>>\n' + ' *\n' + ' * This file is licensed under the Affero General Public License version 3 or later.\n' + ' * See the COPYING file\n' + ' *\n' + ' */\n\n',
		      production: 'users/public/'
		    },
		concat: {
			app: {
				option: {
					banner: '<%= meta.banner %>\n'
					striBanners: {
						options: 'block'
					}
					src: 
						['users/users.js'],
					dest: '<%= meta.production %>users.app.js'
				}
			}
		},
		wrap: {
			app: {
				src: '<%= meta.production %>users.app.js',
				dest: '',
				wrapper: ['(function(angular, $, moment, undefined){\n\n', '\n})(window.angular, window.jQuery, window.moment);']
			}
		},
	    phpunit: {
	      classes: {
	        dir: '../tests'
	      },
	      options: {
	        colors: true
	      }
	    }
	});
    grunt.registerTask('run', ['watch:concat']);
    grunt.registerTask('compile', ['concat', 'wrap']);
    grunt.registerTask('ci', ['testacular:continuous']);
    return grunt.registerTask('testphp', ['watch:phpunit']);
}