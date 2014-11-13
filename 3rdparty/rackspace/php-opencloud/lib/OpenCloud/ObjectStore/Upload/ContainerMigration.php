<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Upload;

use Guzzle\Batch\BatchBuilder;
use Guzzle\Common\Collection;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Url;
use OpenCloud\ObjectStore\Resource\Container;

/**
 * Class responsible for migrating the contents of one container to another
 *
 * @package OpenCloud\ObjectStore\Upload
 */
class ContainerMigration
{
    /** @var \Guzzle\Batch\Batch */
    protected $readQueue;

    /** @var \Guzzle\Batch\Batch */
    protected $writeQueue;

    /** @var \OpenCloud\ObjectStore\Resource\Container */
    protected $oldContainer;

    /** @var \OpenCloud\ObjectStore\Resource\Container */
    protected $newContainer;

    /** @var \Guzzle\Common\Collection */
    protected $options = array();

    protected $defaults = array(
        'read.batchLimit'  => 1000,
        'read.pageLimit'   => 10000,
        'write.batchLimit' => 100
    );

    /**
     * @param Container $old      Source container
     * @param Container $new      Target container
     * @param array     $options  Options that configure process
     * @return ContainerMigration
     */
    public static function factory(Container $old, Container $new, array $options = array())
    {
        $migration = new self();

        $migration->setOldContainer($old);
        $migration->setNewContainer($new);
        $migration->setOptions($options);

        $migration->setupReadQueue();
        $migration->setupWriteQueue();

        return $migration;
    }

    /**
     * @param Container $old
     */
    public function setOldContainer(Container $old)
    {
        $this->oldContainer = $old;
    }

    /**
     * @return Container
     */
    public function getOldContainer()
    {
        return $this->oldContainer;
    }

    /**
     * @param Container $new
     */
    public function setNewContainer(Container $new)
    {
        $this->newContainer = $new;
    }

    /**
     * @return Container
     */
    public function getNewContainer()
    {
        return $this->newContainer;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = Collection::fromConfig($options, $this->defaults);
    }

    /**
     * @return \Guzzle\Common\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the read queue as a {@see \Guzzle\Batch\Batch} queue using the {@see \Guzzle\Batch\BatchBuilder}
     */
    public function setupReadQueue()
    {
        $this->readQueue = BatchBuilder::factory()
            ->transferRequests($this->options->get('read.batchLimit'))
            ->build();
    }

    /**
     * Set the write queue as a {@see \Guzzle\Batch\Batch} queue using the {@see \Guzzle\Batch\BatchBuilder}
     */
    public function setupWriteQueue()
    {
        $this->writeQueue = BatchBuilder::factory()
            ->transferRequests($this->options->get('write.batchLimit'))
            ->build();
    }

    /**
     * @return \Guzzle\Http\ClientInterface
     */
    private function getClient()
    {
        return $this->newContainer->getService()->getClient();
    }

    /**
     * Create a collection of files to be migrated and add them to the read queue
     */
    protected function enqueueGetRequests()
    {
        $files = $this->oldContainer->objectList(array(
            'limit.total' => false,
            'limit.page'  => $this->options->get('read.pageLimit')
        ));

        foreach ($files as $file) {
            $this->readQueue->add(
                $this->getClient()->get($file->getUrl())
            );
        }
    }

    /**
     * Send the read queue (in order to gather more information about individual files)
     *
     * @return array Responses
     */
    protected function sendGetRequests()
    {
        $this->enqueueGetRequests();
        return $this->readQueue->flush();
    }

    /**
     * Create a tailored PUT request for each file
     *
     * @param Response $response
     * @return \Guzzle\Http\Message\EntityEnclosingRequestInterface
     */
    protected function createPutRequest(Response $response)
    {
        $segments = Url::factory($response->getEffectiveUrl())->getPathSegments();
        $name = end($segments);

        // Retrieve content and metadata
        $file = $this->newContainer->dataObject()->setName($name);
        $file->setMetadata($response->getHeaders(), true);

        return $this->getClient()->put(
            $file->getUrl(),
            $file::stockHeaders($file->getMetadata()->toArray()),
            $response->getBody()
        );
    }

    /**
     * Initiate the transfer process
     *
     * @return array PUT responses
     */
    public function transfer()
    {
        $requests = $this->sendGetRequests();
        $this->readQueue = null;

        foreach ($requests as $key => $request) {
            $this->writeQueue->add(
                $this->createPutRequest($request->getResponse())
            );
            unset($requests[$key]);
        }

        return $this->writeQueue->flush();
    }
}