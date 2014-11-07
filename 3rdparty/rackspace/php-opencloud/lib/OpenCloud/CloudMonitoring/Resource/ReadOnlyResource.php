<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * ReadonlyResource class.
 * 
 * @extends AbstractResource
 */
class ReadonlyResource extends AbstractResource
{
    
    public function create($params = array()) 
    { 
        return $this->noCreate(); 
    }

    public function update($params = array()) 
    { 
        return $this->noUpdate(); 
    }

    public function delete($params = array()) 
    { 
        return $this->noDelete(); 
    }

}