<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Resource;

use Guzzle\Http\Message\Response;
use OpenCloud\Common\Base;
use OpenCloud\Common\Service\ServiceInterface;

/**
 * Abstract base class which implements shared functionality of ObjectStore 
 * resources. Provides support, for example, for metadata-handling and other 
 * features that are common to the ObjectStore components.
 */
abstract class AbstractResource extends Base
{
    const GLOBAL_METADATA_PREFIX = 'X';

    /** @var \OpenCloud\Common\Metadata*/
    protected $metadata;

    /** @var string The FQCN of the metadata object used for the container. */
    protected $metadataClass = 'OpenCloud\\Common\\Metadata';
    
    /** @var \OpenCloud\Common\Service\ServiceInterface The service object. */
    protected $service;
    
    public function  __construct(ServiceInterface $service)
    {
        $this->service  = $service;
        $this->metadata = new $this->metadataClass;
    }
    
    public function getService()
    {
        return $this->service;
    }
    
    public function getCdnService()
    {
        return $this->service->getCDNService();
    }
    
    public function getClient()
    {
        return $this->service->getClient();
    }

    /**
     * Factory method that allows for easy instantiation from a Response object.
     *
     * @param Response        $response
     * @param ServiceInterface $service
     * @return static
     */
    public static function fromResponse(Response $response, ServiceInterface $service)
    {
        $object = new static($service);
        
        if (null !== ($headers = $response->getHeaders())) {
            $object->setMetadata($headers, true);
        }
        
        return $object;
    }

    /**
     * Trim headers of their resource-specific prefixes.
     *
     * @param  $headers
     * @return array
     */
    public static function trimHeaders($headers)
    {
        $output = array();
        
        foreach ($headers as $header => $value) {
            // Only allow allow X-<keyword>-* headers to pass through after stripping them
            if (static::headerIsValidMetadata($header) && ($key = self::stripPrefix($header))) {
                $output[$key] = (string) $value;
            }
        }

        return $output;
    }

    protected static function headerIsValidMetadata($header)
    {
        $pattern = sprintf('#^%s\-#i', self::GLOBAL_METADATA_PREFIX);
        return preg_match($pattern, $header);
    }

    /**
     * Strip an individual header name of its resource-specific prefix.
     *
     * @param $header
     * @return mixed
     */
    protected static function stripPrefix($header)
    {
        $pattern = '#^' . self::GLOBAL_METADATA_PREFIX . '\-(' . static::METADATA_LABEL . '-)?(Meta-)?#i';
        return preg_replace($pattern, '', $header);
    }

    /**
     * Prepend/stock the header names with a resource-specific prefix.
     *
     * @param array $headers
     * @return array
     */
    public static function stockHeaders(array $headers)
    {
        $output = array();
        foreach ($headers as $header => $value) {
            $prefix = self::GLOBAL_METADATA_PREFIX . '-' . static::METADATA_LABEL . '-Meta-';
            $output[$prefix . $header] = $value;
        }
        return $output;
    }

    /**
     * Set the metadata (local-only) for this object.
     *
     * @param      $data
     * @param bool $constructFromResponse
     * @return $this
     */
    public function setMetadata($data, $constructFromResponse = false)
    {
        if ($constructFromResponse) {
            $metadata = new $this->metadataClass;
            $metadata->setArray(self::trimHeaders($data));
            $data = $metadata;
        }

        $this->metadata = $data;
        return $this;
    }

    /**
     * @return \OpenCloud\Common\Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Push local metadata to the API, thereby executing a permanent save.
     *
     * @param array $metadata    The array of values you want to set as metadata
     * @param bool  $stockPrefix Whether to prepend each array key with the metadata-specific prefix. For objects, this
     *                           would be X-Object-Meta-Foo => Bar
     * @return mixed
     */
    public function saveMetadata(array $metadata, $stockPrefix = true)
    {
        $headers = ($stockPrefix === true) ? self::stockHeaders($metadata) : $metadata;
        return $this->getClient()->post($this->getUrl(), $headers)->send();
    }

    /**
     * Retrieve metadata from the API. This method will then set and return this value.
     *
     * @return \OpenCloud\Common\Metadata
     */
    public function retrieveMetadata()
    {
        $response = $this->getClient()
            ->head($this->getUrl())
            ->send();
        
        $this->setMetadata($response->getHeaders(), true);
        return $this->metadata;
    }

    /**
     * To delete or unset a particular metadata item.
     *
     * @param $key
     * @return mixed
     */
    public function unsetMetadataItem($key)
    {
        $header = sprintf('%s-Remove-%s-Meta-%s', self::GLOBAL_METADATA_PREFIX, 
            static::METADATA_LABEL, $key);

        $headers = array($header => 'True');

        return $this->getClient()
            ->post($this->getUrl(), $headers)
            ->send();
    }

    /**
     * Append a particular array of values to the existing metadata. Analogous to a merge.
     *
     * @param array $values
     * @return array
     */
    public function appendToMetadata(array $values)
    {
        return (!empty($this->metadata) && is_array($this->metadata)) 
            ? array_merge($this->metadata, $values)
            : $values;
    }
    
}