<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Resource;

/**
 * Represents an account that interacts with the CloudFiles API.
 * 
 * @link http://docs.rackspace.com/files/api/v1/cf-devguide/content/Accounts-d1e421.html
 */
class Account extends AbstractResource
{
    const METADATA_LABEL = 'Account';

    /**
     * @var string The temporary URL secret for this account
     */
    private $tempUrlSecret;
    
    public function getUrl($path = null, array $query = array())
    {
        return $this->getService()->getUrl();
    }

    /**
     * Convenience method.
     *
     * @return \OpenCloud\Common\Metadata
     */
    public function getDetails()
    {
        return $this->retrieveMetadata();
    }

    /**
     * @return null|string|int
     */
    public function getObjectCount()
    {
        return $this->metadata->getProperty('Object-Count');
    }

    /**
     * @return null|string|int
     */
    public function getContainerCount()
    {
        return $this->metadata->getProperty('Container-Count');
    }

    /**
     * @return null|string|int
     */
    public function getBytesUsed()
    {
        return $this->metadata->getProperty('Bytes-Used');
    }
    
    /** 
     * Sets the secret value for the temporary URL.
     *
     * @link http://docs.rackspace.com/files/api/v1/cf-devguide/content/Set_Account_Metadata-d1a4460.html
     *
     * @param null $secret The value to set the secret to. If left blank, a random hash is generated.
     * @return $this
     */
    public function setTempUrlSecret($secret = null) 
    {
        if (!$secret) {
            $secret = sha1(rand(1, 99999));
        }
        
        $this->tempUrlSecret = $secret;
        
        $this->saveMetadata($this->appendToMetadata(array('Temp-Url-Key' => $secret)));
        
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTempUrlSecret()
    {
        if (null === $this->tempUrlSecret) {
            $this->retrieveMetadata();
            $this->tempUrlSecret = $this->metadata->getProperty('Temp-Url-Key');
        }
        
        return $this->tempUrlSecret;
    }
    
}