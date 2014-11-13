<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Resource;

use OpenCloud\ObjectStore\Constants\Header as HeaderConst;

/**
 * A container that has been CDN-enabled. Each CDN-enabled container has a unique 
 * Uniform Resource Locator (URL) that can be combined with its object names and 
 * openly distributed in web pages, emails, or other applications.
 */
class CDNContainer extends AbstractContainer
{
    const METADATA_LABEL = 'Cdn';

    /**
     * @return null|string|int
     */
    public function getCdnSslUri()
    {
        return $this->metadata->getProperty('Ssl-Uri');
    }

    /**
     * @return null|string|int
     */
    public function getCdnUri()
    {
        return $this->metadata->getProperty('Uri');
    }

    /**
     * @return null|string|int
     */
    public function getTtl()
    {
        return $this->metadata->getProperty('Ttl');
    }

    /**
     * @return null|string|int
     */
    public function getCdnStreamingUri()
    {
        return $this->metadata->getProperty('Streaming-Uri');
    }

    /**
     * @return null|string|int
     */
    public function getIosStreamingUri()
    {
        return $this->metadata->getProperty('Ios-Uri');
    }

    public function refresh($name = null, $url = null)
    {
        $response = $this->createRefreshRequest()->send();

        $headers = $response->getHeaders();
        $this->setMetadata($headers, true);

        return $headers;  
    }

    /**
     * Turn on access logs, which track all the web traffic that your data objects accrue.
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function enableCdnLogging()
    {
        $headers = array('X-Log-Retention' => 'True');
        return $this->getClient()->put($this->getUrl(), $headers)->send();
    }

    /**
     * Disable access logs.
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function disableCdnLogging()
    {
        $headers = array('X-Log-Retention' => 'False');
        return $this->getClient()->put($this->getUrl(), $headers)->send();
    }

    public function isCdnEnabled()
    {
        return $this->metadata->getProperty(HeaderConst::ENABLED) == 'True';
    }
}