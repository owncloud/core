<?php
/**
 * The Rackspace Cloud DNS service
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

use OpenCloud\Common\Service as AbstractService;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\OpenStack;
use OpenCloud\Compute\Server;

class Service extends AbstractService
{

    /**
     * creates a new DNS object
     *
     * @param \OpenCloud\OpenStack $conn connection object
     * @param string $serviceName the name of the service
     * @param string $serviceRegion (not currently used; DNS is regionless)
     * @param string $urltype the type of URL
     */
    public function __construct(
        OpenStack $connection,
        $serviceName,
        $serviceRegion,
        $urltype
    ) {
        $this->debug(Lang::translate('initializing DNS...'));
        parent::__construct(
            $connection,
            'rax:dns',
            $serviceName,
            $serviceRegion,
            $urltype
        );
    }

    /**
     * returns a DNS::Domain object
     *
     * @api
     * @param mixed $info either the ID, an object, or array of parameters
     * @return DNS\Domain
     */
    public function Domain($info = null)
    {
        return new Domain($this, $info);
    }

    /**
     * returns a Collection of DNS::Domain objects
     *
     * @api
     * @param array $filter key/value pairs to use as query strings
     * @return \OpenCloud\Collection
     */
    public function DomainList($filter = array())
    {
        $url = $this->Url(Domain::ResourceName(), $filter);
        return $this->Collection('\OpenCloud\DNS\Domain', $url);
    }

    /**
     * returns a PtrRecord object for a server
     *
     * @param mixed $info ID, array, or object containing record data
     * @return Record
     */
    public function PtrRecord($info = null)
    {
        return new PtrRecord($this, $info);
    }

    /**
     * returns a Collection of PTR records for a given Server
     *
     * @param \OpenCloud\Compute\Server $server the server for which to
     *      retrieve the PTR records
     * @return Collection
     */
    public function PtrRecordList(Server $server)
    {
        $service_name = $server->Service()->Name();
        $url = $this->Url('rdns/' . $service_name) . '?' . $this->MakeQueryString(array('href' => $server->Url()));
        return $this->Collection('\OpenCloud\DNS\PtrRecord', $url);
    }

    /**
     * performs a HTTP request
     *
     * This method overrides the request with JSON content type
     *
     * @param string $url the URL to target
     * @param string $method the HTTP method to use
     * @param array $headers key/value pairs for headers to include
     * @param string $body the body of the request (for PUT and POST)
     * @return \OpenCloud\HttpResponse
     */
    public function Request(
    	$url,
    	$method = 'GET',
    	array $headers = array(),
    	$body = null
    ) {
        $headers['Accept'] = RAXSDK_CONTENT_TYPE_JSON;
        $headers['Content-Type'] = RAXSDK_CONTENT_TYPE_JSON;
        return parent::Request($url, $method, $headers, $body);
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
     * @return DNS\AsyncResponse
     */
    public function AsyncRequest($url, $method = 'GET', $headers = array(), $body = null)
    {
        // perform the initial request
        $resp = $this->Request($url, $method, $headers, $body);

        // check response status
        if ($resp->HttpStatus() > 204) {
            throw new Exceptions\AsyncHttpError(sprintf(
                Lang::translate('Unexpected HTTP status for async request: URL [%s] method [%s] status [%s] response [%s]'),
                $url,
                $method,
                $resp->HttpStatus(),
                $resp->HttpBody()
            ));
        }

        // debug
        $this->debug('AsyncResponse [%s]', $resp->HttpBody());

        // return an AsyncResponse object
        return new AsyncResponse($this, $resp->HttpBody());
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
     * @return DNS\AsyncResponse
     */
    public function Import($data)
    {
        // determine the URL
        $url = $this->Url('domains/import');

        // create the JSON object
        $object = new \stdClass;
        $object->domains = array();

        $domains = new \stdClass;
        $domains->contents = $data;
        $domains->contentType = 'BIND_9';
        $object->domains[] = $domains;

        // encode it
        $json = json_encode($object);

        // debug it
        $this->debug('Importing [%s]', $json);

        // perform the request
        return $this->AsyncRequest($url, 'POST', array(), $json);
    }

    /**
     * returns a list of limits
     *
     */
    public function Limits($type = null)
    {
        $url = $this->url('limits');

        if ($type !== null) {
            $url .= '/' . $type;
        }

        // perform the request
        $object = $this->SimpleRequest($url);
        return ($type !== null) ? $object : $object->limits;
    }

    /**
     * returns an array of limit types
     *
     * @return array
     */
    public function LimitTypes()
    {
        $object = $this->SimpleRequest($this->Url('limits/types'));
        return $object->limitTypes;
    }

    /**
     * performs a simple request and returns the JSON as an object
     *
     * @param string $url the URL to GET
     */
    public function SimpleRequest($url)
    {
        // perform the request
        $response = $this->Request($url);

        // check for errors
        if ($response->HttpStatus() > 202) {
            throw new Exceptions\HttpError(sprintf(
                Lang::translate('Unexpected status [%s] for URL [%s], body [%s]'),
                $response->HttpStatus(),
                $url,
                $response->HttpBody()
            ));
        }

        // decode the JSON
        $json = $response->HttpBody();
        $this->debug(Lang::translate('Limit Types JSON [%s]'), $json);

        $object = json_decode($json);

        if ($this->CheckJsonError()) {
            return false;
        }

        return $object;
    }

}
