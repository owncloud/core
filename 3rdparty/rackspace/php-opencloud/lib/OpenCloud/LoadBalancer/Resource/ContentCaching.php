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
 * When content caching is enabled, recently-accessed files are stored on the 
 * load balancer for easy retrieval by web clients. Content caching improves the 
 * performance of high traffic web sites by temporarily storing data that was 
 * recently accessed. While it's cached, requests for that data will be served 
 * by the load balancer, which in turn reduces load off the back end nodes. The 
 * result is improved response times for those requests and less load on the web 
 * server.
 * 
 * @todo Should this be a separate class, or a property of LoadBalancer?
 */
class ContentCaching extends SubResource 
{
    /**
     * @var bool 
     */
	public $enabled;
    
    protected static $json_name = "contentCaching";
    protected static $url_resource = "contentcaching";
    
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
