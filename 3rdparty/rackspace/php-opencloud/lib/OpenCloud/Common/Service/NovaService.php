<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Service;

use OpenCloud\OpenStack;
use OpenCloud\Common\Lang;
use OpenCloud\Compute\Resource\Flavor;

/**
 * NovaService serves as an additional abstraction for particular OpenStack services that exhibit shared functionality.
 */
abstract class NovaService extends CatalogService
{

	/**
	 * Returns a flavor from the service
	 *
     * @param string|null $id
     * @return Flavor
     */
    public function flavor($id = null)
	{
	    return new Flavor($this, $id);
	}

	/**
	 * Returns a list of Flavor objects
     *
	 * @param boolean $details Returns full details or not.
	 * @param array   $filter  Array for creating queries
	 * @return Collection
	 */
	public function flavorList($details = true, array $filter = array()) 
	{
        $path = Flavor::resourceName();
        
        if ($details === true) {
            $path .= '/detail';
        }

        return $this->collection('OpenCloud\Compute\Resource\Flavor', $this->getUrl($path, $filter));
	}

	/**
	 * Loads the available namespaces from the /extensions resource
	 */
	protected function loadNamespaces() 
    {
	    foreach ($this->getExtensions() as $object) {
	        $this->namespaces[] = $object->alias;
	    }

        if (!empty($this->additionalNamespaces)) {
            $this->namespaces += $this->additionalNamespaces;
        }
	}

}
