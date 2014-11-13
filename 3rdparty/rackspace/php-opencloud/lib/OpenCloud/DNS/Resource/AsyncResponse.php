<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\DNS\Resource;

use Guzzle\Http\Url;
use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Service\ServiceInterface;

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
    public function __construct(ServiceInterface $service, $object = null)
    {
        if (!$object) {
            return;
        }

        parent::__construct($service, $object);
    }

    /**
     * URL for status
     *
     * We always show details
     *
     * @return string
     */
    public function getUrl($path = null, array $query = array())
    {
        return Url::factory($this->callbackUrl)
            ->setQuery(array('showDetails' => 'True'));
    }

    /**
     * returns the Name of the request (the job ID)
     *
     * @return string
     */
    public function name()
    {
        return $this->jobId;
    }

    /**
     * overrides for methods
     */
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

    public function primaryKeyField()
    {
        return 'jobId';
    }

}
