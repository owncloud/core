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
 * An error page is the html file that is shown to the end user when an error 
 * in the service has been thrown. By default every virtual server is provided 
 * with the default error file. It is also possible to submit a custom error page 
 * via the Load Balancers API. Refer to Section 4.2.3, “Error Page Operations” 
 * for details (http://docs.rackspace.com/loadbalancers/api/v1.0/clb-devguide/content/List_Errorpage-d1e2218.html).
 */
class ErrorPage extends SubResource 
{
    /**
     * HTML content for the custom error page. Must be 65536 characters or less.
     * 
     * @var string 
     */
    public $content;
    
    protected static $json_name = 'errorpage';
    protected static $url_resource = 'errorpage';
    
    protected $createKeys = array('content');
    
    /**
     * creates a new error page
     *
     * This calls the Update() method, since it requires a PUT to create
     * a new error page. A POST request is not supported, since the URL
     * resource is already defined.
     *
     * @param array $params
     */
    public function create($params = array()) 
    { 
        return $this->update($params); 
    }

}
