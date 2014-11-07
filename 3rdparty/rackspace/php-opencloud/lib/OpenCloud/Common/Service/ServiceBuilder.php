<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Service;

use Guzzle\Http\ClientInterface;
use OpenCloud\Common\Exceptions\ServiceException;

/**
 * This object is a factory for building Service objects.
 */
class ServiceBuilder
{

    /**
     * Simple factory method for creating services.
     * 
     * @param Client $client The HTTP client object
     * @param string $class  The class name of the service
     * @param array $options The options.
     * @return \OpenCloud\Common\Service\ServiceInterface
     * @throws ServiceException
     */
    public static function factory(ClientInterface $client, $class, array $options = array())
    {
        $name = isset($options['name']) ? $options['name'] : null;
        $urlType = isset($options['urlType']) ? $options['urlType'] : null;

        if (isset($options['region'])) {
            $region = $options['region'];
        } elseif ($client->getUser() && ($defaultRegion = $client->getUser()->getDefaultRegion())) {
            $region = $defaultRegion;
        } else {
            $region = null;
        }

        return new $class($client, null, $name, $region, $urlType);
    }
    
}