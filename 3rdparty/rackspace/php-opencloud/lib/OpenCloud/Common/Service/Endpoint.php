<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Service;

use Guzzle\Http\Url;

/**
 * An endpoint serves as a location which receives and emits API interactions. It will therefore also host
 * particular API resources. Each endpoint object has different access methods - one receives network connections over
 * the public Internet, another receives traffic through an internal network. You will be able to access the latter
 * from a Server, for example, in the same Region - which will incur no bandwidth charges, and be quicker.
 */
class Endpoint
{
    /**
     * @var \Guzzle\Http\Url
     */
    private $publicUrl;

    /**
     * @var \Guzzle\Http\Url
     */
    private $privateUrl;

    /**
     * @var string
     */
    private $region;

    /**
     * @param $object
     * @return Endpoint
     */
    public static function factory($object)
    {
        $endpoint = new self();
        
        if (isset($object->publicURL)) {
            $endpoint->setPublicUrl($object->publicURL);
        }
        if (isset($object->internalURL)) {
            $endpoint->setPrivateUrl($object->internalURL);
        }
        if (isset($object->region)) {
            $endpoint->setRegion($object->region);
        }

        return $endpoint;
    }

    /**
     * @param $publicUrl
     * @return $this
     */
    public function setPublicUrl($publicUrl)
    {
        $this->publicUrl = Url::factory($publicUrl);
        return $this;
    }

    /**
     * @return Url
     */
    public function getPublicUrl()
    {
        return $this->publicUrl;
    }

    /**
     * @param $privateUrl
     * @return $this
     */
    public function setPrivateUrl($privateUrl)
    {
        $this->privateUrl = Url::factory($privateUrl);
        return $this;
    }

    /**
     * @return Url
     */
    public function getPrivateUrl()
    {
        return $this->privateUrl;
    }

    /**
     * @param $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }
    
}