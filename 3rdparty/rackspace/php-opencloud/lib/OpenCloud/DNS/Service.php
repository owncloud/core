<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\DNS;

use OpenCloud\Common\Service\CatalogService;
use OpenCloud\OpenStack;
use OpenCloud\Compute\Resource\Server;
use OpenCloud\Common\Http\Message\Formatter;
use OpenCloud\DNS\Collection\DnsIterator;

/**
 * DNS Service.
 */
class Service extends CatalogService
{
    const DEFAULT_TYPE = 'rax:dns';
    const DEFAULT_NAME = 'cloudDNS';

    protected $regionless = true;

    public function collection($class, $url = null, $parent = null, $data = null)
    {
        $options = $this->makeResourceIteratorOptions($this->resolveResourceClass($class));
        $options['baseUrl'] = $url;

        $parent = $parent ?: $this;

        return DnsIterator::factory($parent, $options, $data);
    }

    /**
     * returns a DNS::Domain object
     *
     * @api
     * @param mixed $info either the ID, an object, or array of parameters
     * @return Resource\Domain
     */
    public function domain($info = null)
    {
        return new Resource\Domain($this, $info);
    }

    /**
     * returns a Collection of DNS::Domain objects
     *
     * @api
     * @param array $filter key/value pairs to use as query strings
     * @return \OpenCloud\Common\Collection
     */
    public function domainList($filter = array())
    {
        $url = $this->getUrl(Resource\Domain::resourceName(), $filter);
        return $this->collection('OpenCloud\DNS\Resource\Domain', $url);
    }

    /**
     * returns a PtrRecord object for a server
     *
     * @param mixed $info ID, array, or object containing record data
     * @return Resource\Record
     */
    public function ptrRecord($info = null)
    {
        return new Resource\PtrRecord($this, $info);
    }

    /**
     * returns a Collection of PTR records for a given Server
     *
     * @param \OpenCloud\Compute\Resource\Server $server the server for which to
     *      retrieve the PTR records
     * @return \OpenCloud\Common\Collection
     */
    public function ptrRecordList(Server $server)
    {
        $url = $this->getUrl()
            ->addPath('rdns')
            ->addPath($server->getService()->name())
            ->setQuery(array('href' => $server->url()));

        return $this->collection('OpenCloud\DNS\Resource\PtrRecord', $url);
    }

    /**
     * retrieves an asynchronous response
     *
     * This method calls the provided `$url` and expects an asynchronous
     * response. It checks for various HTTP error codes and returns
     * an `AsyncResponse` object. This object can then be used to poll
     * for the status or to retrieve the final data as needed.
     *
     * @param string $url the URL of the request
     * @param string $method the HTTP method to use
     * @param array $headers key/value pairs for headers to include
     * @param string $body the body of the request (for PUT and POST)
     * @return Resource\AsyncResponse
     */
    public function asyncRequest($url, $method = 'GET', $headers = array(), $body = null)
    {
        $response = $this->getClient()->createRequest($method, $url, $headers, $body)->send();
        return new Resource\AsyncResponse($this, Formatter::decode($response));
    }

    /**
     * imports domain records
     *
     * Note that this function is called from the service (DNS) level, and
     * not (as you might suspect) from the Domain object. Because the function
     * return an AsyncResponse, the domain object will not actually exist
     * until some point after the import has occurred.
     *
     * @api
     * @param string $data the BIND_9 formatted data to import
     * @return Resource\AsyncResponse
     */
    public function import($data)
    {
        // determine the URL
        $url = $this->url('domains/import');

        $object = (object) array(
            'domains' => array(
                (object) array(
                    'contents'    => $data,
                    'contentType' => 'BIND_9'
                )
            )
        );

        // encode it
        $json = json_encode($object);

        // debug it
        $this->getLogger()->info('Importing [{json}]', array('json' => $json));

        // perform the request
        return $this->asyncRequest($url, 'POST', array(), $json);
    }

    /**
     * returns a list of limits
     */
    public function limits($type = null)
    {
        $url = $this->url('limits') . ($type ? "/$type" : '');

        $response = $this->getClient()->get($url)->send();
        $body = Formatter::decode($response);

        return ($body) ? $body : $body->limits;
    }

    /**
     * returns an array of limit types
     *
     * @return array
     */
    public function limitTypes()
    {
        $response = $this->getClient()->get($this->getUrl('limits/types'))->send();
        $body = Formatter::decode($response);
        return $body->limitTypes;
    }

}
