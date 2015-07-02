<?php
/**
 * @author Andrew Brown <andrew@casabrown.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC;
use OCP\Search\PagedProvider;
use OCP\Search\Provider;
use OCP\ISearch;

/**
 * Provide an interface to all search providers
 */
class Search implements ISearch {

	private $providers = array();
	private $registeredProviders = array();

	/**
	 * Search all providers for $query
	 * @param string $query
	 * @param string[] $inApps optionally limit results to the given apps
	 * @return array An array of OC\Search\Result's
	 */
	public function search($query, array $inApps = array()) {
		// old apps might assume they get all results, so we set size 0
		return $this->searchPaged($query, $inApps, 1, 0);
	}

	/**
	 * Search all providers for $query
	 * @param string $query
	 * @param string[] $inApps optionally limit results to the given apps
	 * @param int $page pages start at page 1
	 * @param int $size, 0 = all
	 * @return array An array of OC\Search\Result's
	 */
	public function searchPaged($query, array $inApps = array(), $page = 1, $size = 30) {
		
		$this->initProviders($inApps);
		$results = array();
		
		foreach($this->providers as $provider) {
		
			if ($provider instanceof PagedProvider) {
				$results = array_merge($results, $provider->searchPaged($query, $page, $size));
			} else if ($provider instanceof Provider) {
				$providerResults = $provider->search($query);
				if ($size > 0) {
					$slicedResults = array_slice($providerResults, ($page - 1) * $size, $size);
					$results = array_merge($results, $slicedResults);
				} else {
					$results = array_merge($results, $providerResults);
				}
			} else {
				\OC::$server->getLogger()->warning('Ignoring Unknown search provider', array('provider' => $provider));
			}
		}
		return $results;
	}

	/**
	 * Remove all registered search providers
	 */
	public function clearProviders() {
		$this->providers = array();
		$this->registeredProviders = array();
	}

	/**
	 * Remove one existing search provider
	 * @param string $provider class name of a OC\Search\Provider
	 */
	public function removeProvider($provider) {
		$this->registeredProviders = array_filter(
			$this->registeredProviders,
			function ($element) use ($provider) {
				return ($element['class'] != $provider);
			}
		);
		// force regeneration of providers on next search
		$this->providers = array();
	}

	/**
	 * Register a new search provider to search with
	 * @param string $class class name of a OC\Search\Provider
	 * @param array $options  $options['app'] is needed for correct load of searchprovider
	 */
	public function registerProvider($class, array $options = array()) {
		if(!empty($options['app'])){	
			$this->registeredProviders[$options['app']] = array('class' => $class, 'options' => $options);
		}
	}

	/**
	 * Create instances of all the needed search providers
	 * @param array $inApps
	 */
	private function initProviders($inApps) {
		if( ! empty($this->providers) ) {
			return;
		}
		
		$iCountInApps = count($inApps);
		//if we have only 1 searchprovider to load we look for additional param options['apps'] and register the other searchprovider
		if($iCountInApps === 1 ){
			$sApp=$inApps[0];
			$searchProvider = $this->registeredProviders[$sApp];
			$class = $searchProvider['class'];
			$options = $searchProvider['options'];
			$this->providers[] = new $class($options);
			
			if(!empty($searchProvider['options']['apps'])){
				foreach($searchProvider['options']['apps'] as  $additionalSearchProvider) {
					if(!empty($this->registeredProviders[$additionalSearchProvider])){	
						$class = $this->registeredProviders[$additionalSearchProvider]['class'];
						$options = $this->registeredProviders[$additionalSearchProvider]['options'];
						$this->providers[] = new $class($options);
					}
				}
			}
		}
		//if we have more than 1 searchprovider we load only the searchprovider located in $inApps without option['apps']
		if($iCountInApps > 1 ){
			foreach($inApps as  $provider) {
				if(!empty($this->registeredProviders[$provider])){		
					$class = $this->registeredProviders[$provider]['class'];
					$options = $this->registeredProviders[$provider]['options'];
					$this->providers[] = new $class($options);
				}
			}
		}
		
	}

}
