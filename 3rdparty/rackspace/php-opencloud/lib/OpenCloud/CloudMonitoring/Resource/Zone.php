<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Http\Message\Formatter;
use Guzzle\Http\Exception\ClientErrorResponseException;

/**
 * Zone class.
 */
class Zone extends ReadOnlyResource
{
    /** @var string */
    private $id;

    /** @var string Country Code */
    private $country_code;

    /** @var string */
	private $label;

    /** @var array List of source IPs */
    private $source_ips;

    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'monitoring_zones';

    public function traceroute(array $options)
    {
        if (!$this->getId()) {
            throw new Exception\ZoneException(
                'Please specify a zone ID'
            );    
        }
        
        if (!isset($options['target']) || !isset($options['target_resolver'])) {
            throw new Exception\ZoneException(
                'Please specify a "target" and "target_resolver" value'
            );
        }

        $params = (object) array(
            'target' => $options['target'],
            'target_resolver' => $options['target_resolver']
        );
        try {
            $response = $this->getService()
                ->getClient()
                ->post($this->url('traceroute'), self::getJsonHeader(), json_encode($params))
                ->send();

            $body = Formatter::decode($response);

            return (isset($body->result)) ? $body->result : false;

        } catch (ClientErrorResponseException $e) {
            return false;
        }
    }
    
}