<?php

/**
 * ownCloud
 *
 * @author Frank Karlitschek
 * @copyright 2012 Frank Karlitschek frank@owncloud.org
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

/**
 * Provides an interface to all search providers
 */
class OC_Search {

    static private $providers = array();
    static private $registeredProviders = array();

    /**
     * Remove all registered search providers.
     */
    public static function clearProviders() {
        self::$providers = array();
        self::$registeredProviders = array();
    }

    /**
     * Register a new search provider to use in search.
     * @param string $class name of a OC_Search_Provider
     */
    public static function registerProvider($class, $options = array()) {
        self::$registeredProviders[] = array('class' => $class, 'options' => $options);
    }

    /**
     * Remove a search provider.
     * @param string $class
     */
    public static function removeProvider($class) {
        // remove from registered providers
        foreach (self::$registeredProviders as $i => $v) {
            if ($v['class'] == $class) {
                unset(self::$registeredProviders[$i]);
                break;
            }
        }
        // remove from providers
        foreach (self::$providers as $i => $c) {
            if (is_a($c, $class)) {
                unset(self::$providers[$i]);
                break;
            }
        }
    }

    /**
     * Search all providers for a query string.
     * @param string $query
     * @param string $only_use_provider Use only this provider to search; the string must be the name of the provider class.
     * @return array An array of OC_Search_Result's
     */
    public static function search($query, $only_use_provider = null) {
        self::initProviders();
        $results = array();
        foreach (self::$providers as $provider) {
            if ($only_use_provider === null || is_a($provider, $only_use_provider)) {
                $results = array_merge($results, $provider->search($query));
            }
        }
        return $results;
    }

    /**
     * Create instances of all the registered search providers.
     */
    private static function initProviders() {
        if (count(self::$providers) > 0) {
            return;
        }
        foreach (self::$registeredProviders as $provider) {
            $class = $provider['class'];
            $options = $provider['options'];
            self::$providers[] = new $class($options);
        }
    }

}
