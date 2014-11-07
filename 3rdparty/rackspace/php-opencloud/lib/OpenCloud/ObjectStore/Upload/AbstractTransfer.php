<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Upload;

use Exception;
use OpenCloud\Common\Http\Client;
use Guzzle\Http\EntityBody;
use OpenCloud\Common\Exceptions\RuntimeException;
use OpenCloud\ObjectStore\Exception\UploadException;

/**
 * Contains abstract functionality for transfer objects.
 */
class AbstractTransfer
{
    /**
     * Minimum chunk size is 1MB.
     */
    const MIN_PART_SIZE = 1048576;
    
    /**
     * Maximum chunk size is 5GB.
     */
    const MAX_PART_SIZE = 5368709120;
    
    /**
     * Default chunk size is 1GB.
     */
    const DEFAULT_PART_SIZE = 1073741824;

    /**
     * @var \OpenCloud\Common\Http\Client The client object which handles all HTTP interactions
     */
    protected $client;

    /**
     * @var \Guzzle\Http\EntityBody The payload being transferred
     */
    protected $entityBody;

    /**
     * The current state of the transfer responsible for, among other things, holding an itinerary of uploaded parts
     *
     * @var \OpenCloud\ObjectStore\Upload\TransferState
     */
    protected $transferState;

    /**
     * @var array User-defined key/pair options
     */
    protected $options;

    /**
     * @var int
     */
    protected $partSize;

    /**
     * @var array Defaults that will always override user-defined options
     */
    protected $defaultOptions = array(
        'concurrency'    => true,
        'partSize'       => self::DEFAULT_PART_SIZE,
        'prefix'         => 'segment',
        'doPartChecksum' => true
    );

    /**
     * @return static
     */
    public static function newInstance()
    {
        return new static();
    }

    /**
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
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
     * @param TransferState $transferState
     * @return $this
     */
    public function setTransferState(TransferState $transferState)
    {
        $this->transferState = $transferState;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param $option The key being updated
     * @param $value  The option's value
     * @return $this
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
        return $this;
    }

    public function getPartSize()
    {
        return $this->partSize;
    }

    /**
     * @return $this
     */
    public function setup()
    {
        $this->options  = array_merge($this->defaultOptions, $this->options);
        $this->partSize = $this->validatePartSize();
        
        return $this;
    }

    /**
     * Make sure the part size falls within a valid range
     *
     * @return mixed
     */
    protected function validatePartSize()
    {
        $min = min($this->options['partSize'], self::MAX_PART_SIZE);
        return max($min, self::MIN_PART_SIZE);
    }
    
    /**
     * Initiates the upload procedure.
     *
     * @return \Guzzle\Http\Message\Response
     * @throws RuntimeException If the transfer is not in a "running" state
     * @throws UploadException  If any errors occur during the upload
     * @codeCoverageIgnore
     */
    public function upload()
    {
        if (!$this->transferState->isRunning()) {
            throw new RuntimeException('The transfer has been aborted.');
        }

        try {
            $this->transfer();
            $response = $this->createManifest();
        } catch (Exception $e) {
            throw new UploadException($this->transferState, $e);
        }

        return $response;
    }
    
    /**
     * With large uploads, you must create a manifest file. Although each segment or TransferPart remains
     * individually addressable, the manifest file serves as the unified file (i.e. the 5GB download) which, when
     * retrieved, streams all the segments concatenated.
     *
     * @link http://docs.rackspace.com/files/api/v1/cf-devguide/content/Large_Object_Creation-d1e2019.html
     * @return \Guzzle\Http\Message\Response
     * @codeCoverageIgnore
     */
    private function createManifest()
    {
        $parts = array();
        
        foreach ($this->transferState as $part) {
            $parts[] = (object) array(
                'path'       => $part->getPath(),
                'etag'       => $part->getETag(),
                'size_bytes' => $part->getContentLength()
            );
        }
        
        $headers = array(
            'Content-Length'    => 0,
            'X-Object-Manifest' => sprintf('%s/%s/%s/', 
                $this->options['containerName'],
                $this->options['objectName'], 
                $this->options['prefix']
            )
        );
        
        $url = clone $this->options['containerUrl'];
        $url->addPath($this->options['objectName']);
        
        return $this->client->put($url, $headers)->send();
    }
    
}