<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Queues\Resource;

use Guzzle\Http\Url;
use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Exceptions\InvalidArgumentError;
use OpenCloud\Queues\Exception;
use OpenCloud\Common\Metadata;
use OpenCloud\Common\Collection\PaginatedIterator;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * A queue holds messages. Ideally, a queue is created per work type. For example, 
 * if you want to compress files, you would create a queue dedicated to this job. 
 * Any application that reads from this queue would only compress files.
 */
class Queue extends PersistentObject
{
    /**
     * Maximum number of messages that can be posted at once.
     */
    const MAX_POST_MESSAGES = 10;
    
    /**
     * The name given to the queue. The name MUST NOT exceed 64 bytes in length, 
     * and is limited to US-ASCII letters, digits, underscores, and hyphens.
     * 
     * @var string
     */
    private $name;
    
    /**
     * Miscellaneous, user-defined information about the queue.
     * 
     * @var array|Metadata 
     */
    protected $metadata;
    
    /**
     * Populated when the service's listQueues() method is called. Provides a 
     * convenient link for a particular Queue.md.
     * 
     * @var string 
     */
    private $href;
    
    protected static $url_resource = 'queues';
    protected static $json_collection_name = 'queues';
    protected static $json_name = false;
    
    public $createKeys = array('name');

    /**
     * Set the name (with validation).
     *
     * @param $name string
     * @return $this
     * @throws \OpenCloud\Queues\Exception\QueueException
     */
    public function setName($name)
    {
        if (preg_match('#[^\w\d\-\_]+#', $name)) {
            throw new Exception\QueueException(sprintf(
                'Queues names are restricted to alphanumeric characters, '
                . ' hyphens and underscores. You provided: %s',
                print_r($name, true)
            ));
        }

        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the metadata for this Queue.
     *
     * @param $data
     * @return $this
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public function setMetadata($data)
    {
        // Check for either objects, arrays or Metadata objects
        if ($data instanceof Metadata) {
            $metadata = $data;
        } elseif (is_array($data) || is_object($data)) {
            $metadata = new Metadata();
            $metadata->setArray($data);
        } else {
            throw new InvalidArgumentError(sprintf(
                'You must specify either an array/object of parameters, or an '
                . 'instance of Metadata. You provided: %s',
                print_r($data, true)
            ));
        }

        $this->metadata = $metadata;
        return $this;
    }

    /**
     * Save this metadata both to the local object and the API.
     *
     * @param array $params
     * @return mixed
     */
    public function saveMetadata(array $params = array())
    {
        if (!empty($params)) {
            $this->setMetadata($params);
        }

        $json = json_encode((object) $this->getMetadata()->toArray());

        return $this->getClient()->put($this->getUrl('metadata'), self::getJsonHeader(), $json)->send();
    }
    
    /**
     * Returns the metadata associated with a Queue.md.
     *
     * @return Metadata|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Retrieve metadata from the API and set it to the local object.
     */
    public function retrieveMetadata()
    {
        $response = $this->getClient()->get($this->url('metadata'))->send();

        $metadata = new Metadata();
        $metadata->setArray(Formatter::decode($response));
        $this->setMetadata($metadata);
    }

    public function create($params = array())
    {
        return $this->getService()->createQueue($params);
    }

    public function createJson()
    {
        return (object) array(
            'queue_name' => $this->getName(),
            'metadata'   => $this->getMetadata(false)
        );
    }

    public function primaryKeyField()
    {
        return 'name';
    }

    public function update($params = array())
    {
        return $this->noUpdate();
    }
    
    /**
     * This operation returns queue statistics including how many messages are 
     * in the queue, broken out by status.
     * 
     * @return object
     */
    public function getStats()
    {
        $response = $this->getClient()
            ->get($this->getUrl('stats'))
            ->send();

        $body = Formatter::decode($response);
        
        return (!isset($body->messages)) ? false : $body->messages;
    }

    /**
     * Gets a message either by a specific ID, or, if no ID is specified, just 
     * an empty Message object.
     * 
     * @param string|null $id If a string, then the service will retrieve an 
     *      individual message based on its specific ID. If NULL, then an empty
     *      object is returned for further use.
     * @return Message
     */
    public function getMessage($id = null)
    {
        return $this->getService()->resource('Message', $id, $this);
    }

    /**
     * Post an individual message.
     *
     * @param array $params
     * @return bool
     */
    public function createMessage(array $params)
    {
        return $this->createMessages(array($params));
    }

    /**
     * Post multiple messages.
     *
     * @param array $messages
     * @return bool
     */
    public function createMessages(array $messages)
    {
        $objects = array();
        
        foreach ($messages as $dataArray) {
            $objects[] = $this->getMessage($dataArray)->createJson();
        }
        
        $json = json_encode(array_slice($objects, 0, self::MAX_POST_MESSAGES));
        $this->checkJsonError();
        
        $response = $this->getClient()
            ->post($this->getUrl('messages'), self::getJsonHeader(), $json)
            ->send();

        if (null !== ($location = $response->getHeader('Location'))) {
            
            $parts = array_merge($this->getUrl()->getParts(), parse_url($location));
            $url = Url::factory(Url::buildUrl($parts));

            $options = $this->makeResourceIteratorOptions(__NAMESPACE__ . '\\Message') + array(
                'baseUrl'    => $url,
                'limit.page' => 10
            );

            return PaginatedIterator::factory($this, $options);
        }
        
        return true;
    }
    
    /**
     * Lists messages according to certain filter options. Results are ordered 
     * by age, oldest message first. All of the parameters are optional.
     * 
     * @param array $options An associative array of filtering parameters:
     * 
     * - ids (array) A two-dimensional array of IDs to retrieve.
     * 
     * - claim_id (string) The claim ID to which the message is associated.
     * 
     * - marker (string) An opaque string that the client can use to request the 
     *      next batch of messages. If not specified, the API will return all 
     *      messages at the head of the queue (up to limit).
     * 
     * - limit (integer) A number up to 20 (the default, but is configurable) 
     *      queues to return. If not specified, it defaults to 10.
     * 
     * - echo (bool) Determines whether the API returns a client's own messages, 
     *      as determined by the uuid portion of the User-Agent header. If not 
     *      specified, echo defaults to FALSE.
     * 
     * - include_claimed (bool) Determines whether the API returns claimed 
     *      messages as well as unclaimed messages. If not specified, defaults 
     *      to FALSE (i.e. only unclaimed messages are returned).
     * 
     * @return Collection
     */
    public function listMessages(array $options = array())
    {
        // Implode array into delimeted string if necessary
        if (isset($options['ids']) && is_array($options['ids'])) {
            $options['ids'] = implode(',', $options['ids']);
        }
        
        $url = $this->getUrl('messages', $options);

        $options = $this->makeResourceIteratorOptions(__NAMESPACE__ . '\\Message') + array(
                'baseUrl'    => $url,
                'limit.page' => 10
            );

        return PaginatedIterator::factory($this, $options);
    }
    
    /**
     * This operation immediately deletes the specified messages, providing a 
     * means for bulk deletes.
     * 
     * @param array $ids Two-dimensional array of IDs to be deleted
     * @return boolean
     */
    public function deleteMessages(array $ids)
    {
        $url = $this->url('messages', array('ids' => implode(',', $ids)));
        $this->getClient()->delete($url)->send();
        return true;
    }

    /**
     * This operation claims a set of messages, up to limit, from oldest to 
     * newest, skipping any that are already claimed. If no unclaimed messages 
     * are available, FALSE is returned.
     * 
     * You should delete the message when you have finished processing it, 
     * before the claim expires, to ensure the message is processed only once. 
     * Be aware that you must call the delete() method on the Message object and
     * pass in the Claim ID, rather than relying on the service's bulk delete 
     * deleteMessages() method. This is so that the server can return an error 
     * if the claim just expired, giving you a chance to roll back your processing 
     * of the given message, since another worker will likely claim the message 
     * and process it.
     * 
     * Just as with a message's age, the age given for the claim is relative to 
     * the server's clock, and is useful for determining how quickly messages are 
     * getting processed, and whether a given message's claim is about to expire.
     * 
     * When a claim expires, it is removed, allowing another client worker to 
     * claim the message in the case that the original worker fails to process it.
     * 
     * @param int $limit
     */
    public function claimMessages(array $options = array())
    {
        $limit = (isset($options['limit'])) ? $options['limit'] : Claim::LIMIT_DEFAULT;
        $grace = (isset($options['grace'])) ? $options['grace'] : Claim::GRACE_DEFAULT;
        $ttl = (isset($options['ttl'])) ? $options['ttl'] : Claim::TTL_DEFAULT;

        $json = json_encode((object) array(
            'grace' => $grace,
            'ttl'   => $ttl
        ));
        
        $url = $this->getUrl('claims', array('limit' => $limit));

        $response = $this->getClient()->post($url, self::getJsonHeader(), $json)->send();

        if ($response->getStatusCode() == 204) {
            return false;
        }

        $options = array('resourceClass' => 'Message', 'baseUrl' => $url);

        return PaginatedIterator::factory($this, $options, Formatter::decode($response));
    }
    
    /**
     * If an ID is supplied, the API is queried for a persistent object; otherwise
     * an empty object is returned.
     * 
     * @param  int $id
     * @return Claim
     */
    public function getClaim($id = null)
    {
        return $this->getService()->resource('Claim', $id, $this);
    }
    
}