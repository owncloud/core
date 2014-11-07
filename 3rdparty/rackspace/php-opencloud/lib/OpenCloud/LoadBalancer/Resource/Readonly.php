<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright Copyright 2014 Rackspace US, Inc. See COPYING for licensing information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   1.6.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\LoadBalancer\Resource;

/**
 * This defines a read-only SubResource - one that cannot be created, updated,
 * or deleted. Many subresources are like this, and this simplifies their
 * class definitions.
 */
abstract class Readonly extends SubResource 
{
	
	public function create($params = array()) 
	{ 
		return $this->noCreate(); 
	}

	public function update($params = array()) 
	{ 
		return $this->noUpdate(); 
	}

	public function delete() 
	{ 
		return $this->noDelete(); 
	}

}
