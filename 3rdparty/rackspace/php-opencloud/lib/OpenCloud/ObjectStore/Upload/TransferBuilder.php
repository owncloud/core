<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Upload;

use OpenCloud\Common\Exceptions\InvalidArgumentError;
use Guzzle\Http\EntityBody;
use OpenCloud\ObjectStore\Resource\Container;

/**
 * Factory which creates Transfer objects, either ConcurrentTransfer or ConsecutiveTransfer.
 */
class TransferBuilder
{
    /**
     * @var Container The container being uploaded to
     */
    protected $container;

    /**
     * @var EntityBody The data payload.
     */
    protected $entityBody;

    /**
     * @var array A key/value pair of options.
     */
    protected $options = array();

    /**
     * @return TransferBuilder
     */
    public static function newInstance()
    {
        return new self();
    }
    
    /**
     * @param type $options Available configuration options:
     * 
     * * `concurrency'    <bool>   The number of concurrent workers.
     * * `partSize'       <int>    The size, in bytes, for the chunk
     * * `doPartChecksum' <bool>   Enable or disable MD5 checksum in request (ETag)
     * 
     * If you are uploading FooBar, its chunks will have the following naming structure:
     * 
     * FooBar/1
     * FooBar/2
     * FooBar/3
     * 
     * @return \OpenCloud\ObjectStore\Upload\UploadBuilder
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param $key   The option name
     * @param $value The option value
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * @param Container $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @param EntityBody $entityBody
     * @return $this
     */
    public function setEntityBody(EntityBody $entityBody)
    {
        $this->entityBody = $entityBody;
        return $this;
    }

    /**
     * Build the transfer.
     *
     * @return mixed
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public function build()
    {
        // Validate properties
        if (!$this->container || !$this->entityBody || !$this->options['objectName']) {
            throw new InvalidArgumentError('A container, entity body and object name must be set');
        }
        
        // Create TransferState object for later use
        $transferState = TransferState::factory();
        
        // Instantiate Concurrent-/ConsecutiveTransfer 
        $transferClass = isset($this->options['concurrency']) && $this->options['concurrency'] > 1 
            ? __NAMESPACE__ . '\\ConcurrentTransfer' 
            : __NAMESPACE__ . '\\ConsecutiveTransfer';
        
        return $transferClass::newInstance()
            ->setClient($this->container->getClient())
            ->setEntityBody($this->entityBody)
            ->setTransferState($transferState)
            ->setOptions($this->options)
            ->setOption('containerName', $this->container->getName())
            ->setOption('containerUrl', $this->container->getUrl())
            ->setup();
    }
    
}