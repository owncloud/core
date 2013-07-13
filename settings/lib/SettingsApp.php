<?php

/**
 * ownCloud - Core
 *
 * @author Bernhard Posselt
 * @copyright 2013 Bernhard Posselt <nukeawhale@gmail.com>
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

	class SettingsApp {

    	public static function main($controllerName, $methodName, $routeParams) {
			
			OCP\JSON::callCheck();
			OC_JSON::checkLoggedIn();
			OC_JSON::checkAdminUser();

			// parse input parameters
    		$params = json_decode(file_get_contents('php://input'), true);
         	$params = is_array($params) ? $params: array();
          
          
    		 // is it autoloaded?
    		 $controller = new $controllerName($routeParams, $params); // maybe you want a request object that does this.
    
    		 // use a container to pass in any objects
    		 // $container = new DIContainer();
    		 // $container['routeParams'] = $routeParams;
    		 // $controller = $container[$controllerName];
			 list($headers, $out) = $controller->$methodName();
			 foreach($headers as $header) {
				 header($header);
			 }
			 
			 print($out);
			 
		 }    
    
	 }
?>