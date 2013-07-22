<?php
/**
 * The Rackspace Cloud DNS service asynchronous response object
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Service as AbstractService;

/**
 * The AsyncResponse class encapsulates the data returned by a Cloud DNS
 * asynchronous response.
 */
class AsyncResponse extends PersistentObject
{

    public $jobId;
    public $callbackUrl;
    public $status;
    public $requestUrl;
    public $verb;
    public $request;
    public $response;
    public $error;
    public $domains;

    protected static $json_name = false;

    /**
     * constructs a new AsyncResponse object from a JSON
     * string
     *
     * @param \OpenCloud\Service $service the calling service
     * @param string $json the json response from the initial request
     */
    public function __construct(AbstractService $service, $json = null)
    {
        if (!$json) {
            return;
        }

        $obj = json_decode($json);
        if ($this->CheckJsonError()) {
            return;
        }

        parent::__construct($service, $obj);
    }

    /**
     * URL for status
     *
     * We always show details
     *
     * @return string
     */
    public function Url($subresource = null, $qstr = array())
    {
        return $this->callbackUrl . '?showDetails=True';
    }

    /**
     * returns the Name of the request (the job ID)
     *
     * @return string
     */
    public function Name()
    {
        return $this->jobId;
    }

    /**
     * overrides for methods
     */
    public function Create($parm = array())
    {
        return $this->NoCreate();
    }

    public function Update($parm = array())
    {
        return $this->NoUpdate();
    }

    public function Delete()
    {
        return $this->NoDelete();
    }

    public function PrimaryKeyField()
    {
        return 'jobId';
    }

}
