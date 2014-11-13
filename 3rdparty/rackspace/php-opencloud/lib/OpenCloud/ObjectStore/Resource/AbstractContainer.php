<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Resource;

use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Service\ServiceInterface;
use OpenCloud\ObjectStore\Constants\Header as HeaderConst;

/**
 * Abstract class holding shared functionality for containers.
 */
abstract class AbstractContainer extends AbstractResource
{
    protected $metadataClass = 'OpenCloud\\ObjectStore\\Resource\\ContainerMetadata';
    
    /**
     * The name of the container. 
     * 
     * The only restrictions on container names is that they cannot contain a 
     * forward slash (/) and must be less than 256 bytes in length. Please note 
     * that the length restriction applies to the name after it has been URL 
     * encoded. For example, a container named Course Docs would be URL encoded
     * as Course%20Docs - which is 13 bytes in length rather than the expected 11.
     * 
     * @var string
     */
    public $name;
    
    public function __construct(ServiceInterface $service, $data = null)
    {
        $this->service  = $service;
        $this->metadata = new $this->metadataClass;

        // Populate data if set
        $this->populate($data);
    }

    public function getTransId()
    {
        return $this->metadata->getProperty(HeaderConst::TRANS_ID);
    }

    public abstract function isCdnEnabled();
    
    public function hasLogRetention()
    {
        if ($this instanceof CDNContainer) {
            return $this->metadata->getProperty(HeaderConst::LOG_RETENTION) == 'True';
        } else {
            return $this->metadata->propertyExists(HeaderConst::ACCESS_LOGS);
        }
    }
    
    public function primaryKeyField()
    {
        return 'name';
    }

    public function getUrl($path = null, array $params = array())
    {
        if (strlen($this->getName()) == 0) {
            throw new Exceptions\NoNameError('Container does not have a name');
        }

        $url = $this->getService()->getUrl();

        return $url->addPath((string) $this->getName())->addPath((string) $path)->setQuery($params);
    }
    
    protected function createRefreshRequest()
    {
        return $this->getClient()->head($this->getUrl(), array('Accept' => '*/*'));
    }

    /**
     * This method will enable your CDN-enabled container to serve out HTML content like a website.
     *
     * @param $indexPage The data object name (i.e. a .html file) that will serve as the main index page.
     * @return \Guzzle\Http\Message\Response
     */
    public function setStaticIndexPage($page)
    {
        if ($this instanceof CDNContainer) {
            $this->getLogger()->warning(
                'This method cannot be called on the CDN object - please execute it on the normal Container'
            );
        }

        $headers = array('X-Container-Meta-Web-Index' => $page);
        return $this->getClient()->post($this->getUrl(), $headers)->send();
    }

    /**
     * Set the default error page for your static site.
     *
     * @param $name The data object name (i.e. a .html file) that will serve as the main error page.
     * @return \Guzzle\Http\Message\Response
     */
    public function setStaticErrorPage($page)
    {
        if ($this instanceof CDNContainer) {
            $this->getLogger()->warning(
                'This method cannot be called on the CDN object - please execute it on the normal Container'
            );
        }

        $headers = array('X-Container-Meta-Web-Error' => $page);
        return $this->getClient()->post($this->getUrl(), $headers)->send();
    }
}