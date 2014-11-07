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
 * The connection logging feature allows logs to be delivered to a Cloud Files 
 * account every hour. For HTTP-based protocol traffic, these are Apache-style 
 * access logs. For all other traffic, this is connection and transfer logging.
 */
class ConnectionLogging extends SubResource 
{

	public $enabled;
    
    protected static $json_name = "connectionLogging";
    protected static $url_resource = "connectionlogging";
    
    protected $createKeys = array('enabled');

	public function create($params = array()) 
    { 
        return $this->update($params); 
    }

	public function delete() 
    { 
        return $this->noDelete(); 
    }

}
