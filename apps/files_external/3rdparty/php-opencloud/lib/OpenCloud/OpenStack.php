<?php
/**
 * The OpenStack connection/cloud class
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud;

require_once __DIR__ . '/Globals.php';

use OpenCloud\Common\Base;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\ServiceCatalogItem;

/**
 * The OpenStack class represents a relationship (or "connection")
 * between a user and a service.
 *
 * This is the primary entry point into an OpenStack system, and the only one
 * where the developer is required to know and provide the endpoint URL (in
 * all other cases, the endpoint is derived from the Service Catalog provided
 * by the authentication system).
 *
 * Since various providers have different mechanisms for authentication, users
 * will often use a subclass of OpenStack. For example, the Rackspace
 * class is provided for users of Rackspace's cloud services, and other cloud
 * providers are welcome to add their own subclasses as well.
 *
 * General usage example:
 * <code>
 *  $username = 'My Username';
 *  $secret = 'My Secret';
 *  $connection = new OpenCloud\OpenStack($username, $secret);
 *  // having established the connection, we can set some defaults
 *  // this sets the default name and region of the Compute service
 *  $connection->SetDefaults('Compute', 'cloudServersOpenStack', 'ORD');
 *  // access a Compute service
 *  $chicago = $connection->Compute();
 *  // if we want to access a different service, we can:
 *  $dallas = $connection->Compute('cloudServersOpenStack', 'DFW');
 * </code>
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 * @version 1.0
 */
class OpenStack extends Base
{

    /**
     * This holds the HTTP User-Agent: used for all requests to the
     * services. It is public so that, if necessary, it can be entirely
     * overridden by the developer. However, it's strongly recomended
     * that you use the OpenStack::AppendUserAgent() method to APPEND
     * your own User Agent identifier to the end of this string; the
     * user agent information can be very valuable to service providers
     * to track who is using their service.
     */
    public $useragent = RAXSDK_USER_AGENT;

    protected $url;
    protected $secret = array();
    protected $token;
    protected $expiration = 0;
    protected $tenant;
    protected $catalog;

    protected $connect_timeout = RAXSDK_CONNECTTIMEOUT;
    protected $http_timeout = RAXSDK_TIMEOUT;
    protected $overlimit_timeout = RAXSDK_OVERLIMIT_TIMEOUT;

    /**
     * This associative array holds default values used to identify each
     * service (and to select it from the Service Catalog). Use the
     * Compute::SetDefaults() method to change the default values, or
     * define the global constants (for example, RAXSDK_COMPUTE_NAME)
     * BEFORE loading the OpenCloud library:
     *
     * <code>
     * define('RAXSDK_COMPUTE_NAME', 'cloudServersOpenStack');
     * include('openstack.php');
     * </code>
     */
    protected $defaults = array(
        'Compute' => array(
            'name'      => RAXSDK_COMPUTE_NAME,
            'region'    => RAXSDK_COMPUTE_REGION,
            'urltype'   => RAXSDK_COMPUTE_URLTYPE
        ),
        'ObjectStore' => array(
            'name'      => RAXSDK_OBJSTORE_NAME,
            'region'    => RAXSDK_OBJSTORE_REGION,
            'urltype'   => RAXSDK_OBJSTORE_URLTYPE
        ),
        'Database' => array(
            'name'      => RAXSDK_DATABASE_NAME,
            'region'    => RAXSDK_DATABASE_REGION,
            'urltype'   => RAXSDK_DATABASE_URLTYPE
        ),
        'Volume' => array(
            'name'      => RAXSDK_VOLUME_NAME,
            'region'    => RAXSDK_VOLUME_REGION,
            'urltype'   => RAXSDK_VOLUME_URLTYPE
        ),
        'LoadBalancer' => array(
            'name'      => RAXSDK_LBSERVICE_NAME,
            'region'    => RAXSDK_LBSERVICE_REGION,
            'urltype'   => RAXSDK_LBSERVICE_URLTYPE
        ),
        'DNS' => array(
            'name'      => RAXSDK_DNS_NAME,
            'region'    => RAXSDK_DNS_REGION,
            'urltype'   => RAXSDK_DNS_URLTYPE
        ),
        'Orchestration' => array(
            'name'      => RAXSDK_ORCHESTRATION_NAME,
            'region'    => RAXSDK_ORCHESTRATION_REGION,
            'urltype'   => RAXSDK_ORCHESTRATION_URLTYPE
        )
    );

    private $_user_write_progress_callback_func;
    private $_user_read_progress_callback_func;

    /**
     * Tracks file descriptors used by streaming downloads
     *
     * This will permit multiple simultaneous streaming downloads; the
     * key is the URL of the object, and the value is its file descriptor.
     *
     * To prevent memory overflows, each array element is deleted when
     * the end of the file is reached.
     */
    private $_file_descriptors = array();

    /**
     * array of options to pass to the CURL request object
     */
    private $curl_options=array();

    /**
     * list of attributes to export/import
     */
    private $export_items = array(
        'token',
        'expiration',
        'tenant',
        'catalog'
    );

    /**
     * Creates a new OpenStack object
     *
     * The OpenStack object needs two bits of information: the URL to
     * authenticate against, and a "secret", which is an associative array
     * of name/value pairs. Usually, the secret will be a username and a
     * password, but other values may be required by different authentication
     * systems. For example, OpenStack Keystone requires a username and
     * password, but Rackspace uses a username, tenant ID, and API key.
     * (See OpenCloud\Rackspace for that.)
     *
     * @param string $url - the authentication endpoint URL
     * @param array $secret - an associative array of auth information:
     * * username
     * * password
     * @param array $options - CURL options to pass to the HttpRequest object
     */
    public function __construct($url, $secret, $options = array())
    {
        $this->debug(Lang::translate('initializing'));
        $this->url = $url;

        if (!is_array($secret)) {
            throw new Exceptions\DomainError(
                Lang::translate('[secret] must be an array')
            );
        }

        $this->secret = $secret;

        if (!is_array($options)) {
            throw new Exceptions\DomainError(
                Lang::translate('[options] must be an array')
            );
        }

        $this->curl_options = $options;
    }

    /**
     * Returns the URL of this object
     *
     * @api
     * @param string $subresource specified subresource
     * @return string
     */
    public function Url($subresource='tokens')
    {
        return Lang::noslash($this->url) . '/' . $subresource;
    }

    /**
     * Returns the stored secret
     *
     * @return array
     */
    public function Secret()
    {
        return $this->secret;
    }

    /**
     * Returns the cached token; if it has expired, then it re-authenticates
     *
     * @api
     * @return string
     */
    public function Token()
    {
        if (time() > ($this->expiration - RAXSDK_FUDGE)) {
            $this->Authenticate();
        }
        return $this->token;
    }

    /**
     * Returns the cached expiration time;
     * if it has expired, then it re-authenticates
     *
     * @api
     * @return string
     */
    public function Expiration()
    {
        if (time() > ($this->expiration - RAXSDK_FUDGE)) {
            $this->Authenticate();
        }
        return $this->expiration;
    }

    /**
     * Returns the tenant ID, re-authenticating if necessary
     *
     * @api
     * @return string
     */
    public function Tenant()
    {
        if (time() > ($this->expiration-RAXSDK_FUDGE)) {
            $this->Authenticate();
        }
        return $this->tenant;
    }

    /**
     * Returns the service catalog object from the auth service
     *
     * @return \stdClass
     */
    public function ServiceCatalog()
    {
        if (time() > ($this->expiration-RAXSDK_FUDGE)) {
            $this->Authenticate();
        }
        return $this->catalog;
    }

    /**
     * Returns a Collection of objects with information on services
     *
     * Note that these are informational (read-only) and are not actually
     * 'Service'-class objects.
     */
    public function ServiceList()
    {
        return new Common\Collection(
            $this,
            'ServiceCatalogItem',
            $this->ServiceCatalog()
        );
    }

    /**
     * Creates and returns the formatted credentials to POST to the auth
     * service.
     *
     * @return string
     */
    public function Credentials()
    {
        if (isset($this->secret['username'])
            && isset($this->secret['password'])
        ) {
            $credentials = array(
                'auth' => array(
                    'passwordCredentials' => array(
                        'username' => $this->secret['username'],
                        'password'=>$this->secret['password']
                    )
                )
            );

            if (isset($this->secret['tenantName'])) {
                $credentials['auth']['tenantName'] = $this->secret['tenantName'];
            }

            return json_encode($credentials);
        } else {
            throw new Exceptions\CredentialError(
               Lang::translate('Unrecognized credential secret')
            );
        }
    }

    /**
     * Authenticates using the supplied credentials
     *
     * @api
     * @return void
     * @throws AuthenticationError
     */
    public function Authenticate()
    {
        // try to auth
        $response = $this->Request(
            $this->Url(),
            'POST',
            array('Content-Type'=>'application/json'),
            $this->Credentials()
        );

        $json = $response->HttpBody();

        // check for errors
        if ($response->HttpStatus() >= 400) {
            throw new Exceptions\AuthenticationError(sprintf(
                Lang::translate('Authentication failure, status [%d], response [%s]'),
                $response->HttpStatus(),
                $json
            ));
        }

        // save the token information as well as the ServiceCatalog
        $response = json_decode($json);

        if ($this->CheckJsonError()) {
            return false;
        }

        $this->token = $response->access->token->id;
        $this->expiration = strtotime($response->access->token->expires);

        /**
         * In some cases, the tenant name/id is not returned
         * as part of the auth token, so we check for it before
         * we set it. This occurs with pure Keystone, but not
         * with the Rackspace auth.
         */
        if (isset($response->access->token->tenant)) {
            $this->tenant = $response->access->token->tenant->id;
        }

        /**
         * Note the different capitalization; I'm trying to use CamelCase
         * consistently in these bindings, but the actual serviceCatalog is
         * how OpenStack returns it.
         */
        $this->catalog = $response->access->serviceCatalog;
    }

    /**
     * Performs a single HTTP request
     *
     * The request() method is one of the most frequently-used in the entire
     * library. It performs an HTTP request using the specified URL, method,
     * and with the supplied headers and body. It handles error and
     * exceptions for the request.
     *
     * @api
     * @param string url - the URL of the request
     * @param string method - the HTTP method (defaults to GET)
     * @param array headers - an associative array of headers
     * @param string data - either a string or a resource (file pointer) to
     *      use as the
     *      request body (for PUT or POST)
     * @return HttpResponse object
     * @throws HttpOverLimitError, HttpUnauthorizedError, HttpForbiddenError
     */
    public function Request($url, $method = 'GET', $headers = array(), $data = null)
    {
        //var_dump($url, $method, $headers, $data);die;
        $this->debug(Lang::translate('Resource [%s] method [%s] body [%s]'), $url, $method, $data);

        // get the request object
        $http = $this->GetHttpRequestObject($url, $method, $this->curl_options);

        // set various options
        $this->debug(Lang::translate('Headers: [%s]'), print_r($headers, true));
        $http->setheaders($headers);
        $http->SetHttpTimeout($this->http_timeout);
        $http->SetConnectTimeout($this->connect_timeout);
        $http->SetOption(CURLOPT_USERAGENT, $this->useragent);

        // data can be either a resource or a string
        if (is_resource($data)) {
            // loading from or writing to a file
            // set the appropriate callback functions
            switch($method) {
                case 'GET':
                    // need to save the file descriptor
                    $this->_file_descriptors[$url] = $data;
                    // set the CURL options
                    $http->SetOption(CURLOPT_FILE, $data);
                    $http->SetOption(CURLOPT_WRITEFUNCTION, array($this, '_write_cb'));
                    break;
                case 'PUT':
                case 'POST':
                    // need to save the file descriptor
                    $this->_file_descriptors[$url] = $data;
                    if (!isset($headers['Content-Length'])) {
                        throw new Exceptions\HttpError(
                            Lang::translate('The Content-Length: header must be specified for file uploads')
                        );
                    }
                    $http->SetOption(CURLOPT_UPLOAD, TRUE);
                    $http->SetOption(CURLOPT_INFILE, $data);
                    $http->SetOption(CURLOPT_INFILESIZE, $headers['Content-Length']);
                    $http->SetOption(CURLOPT_READFUNCTION, array($this, '_read_cb'));
                    break;
                default:
                    // do nothing
                    break;
            }
        } elseif (is_string($data)) {
            $http->SetOption(CURLOPT_POSTFIELDS, $data);
        } elseif (isset($data)) {
            throw new Exceptions\HttpError(
                Lang::translate('Unrecognized data type for PUT/POST body, must be string or resource')
            );
        }

        // perform the HTTP request; returns an HttpResult object
        $response = $http->Execute();

        // handle and retry on overlimit errors
        if ($response->HttpStatus() == 413) {
            $object = json_decode($response->HttpBody());
            if (!$this->CheckJsonError()) {
                if (isset($object->overLimit)) {
                    /**
                     * @TODO(glen) - The documentation says "retryAt", but
                     * the field returned is "retryAfter". If the doc changes,
                     * then there's no problem, but we'll need to fix this if
                     * they change the code to match the docs.
                     */
                    $retry_s = $object->overLimit->retryAfter;
                    $retry_t = strtotime($retry_s);
                    $sleep_interval = $retry_t - time();
                    if ($sleep_interval <= $this->overlimit_timeout) {
                        sleep($sleep_interval);
                        $response = $http->Execute();
                    } else {
                        throw new Exceptions\HttpOverLimitError(sprintf(
                            Lang::translate('Over limit; next available request [%s][%s] is not for [%d] seconds at [%s]'),
                            $method,
                            $url,
                            $sleep_interval,
                            $retry_s
                        ));
                    }
                }
            }
        }

        // do some common error checking
        switch($response->HttpStatus()) {
            case 401:
                throw new Exceptions\HttpUnauthorizedError(sprintf(
                    Lang::translate('401 Unauthorized for [%s] [%s]'),
                    $url,
                    $response->HttpBody()
                ));
                break;
            case 403:
                throw new Exceptions\HttpForbiddenError(sprintf(
                    Lang::translate('403 Forbidden for [%s] [%s]'),
                    $url,
                    $response->HttpBody()
                ));
                break;
            case 413:   // limit
                throw new Exceptions\HttpOverLimitError(sprintf(
                    Lang::translate('413 Over limit for [%s] [%s]'),
                    $url,
                    $response->HttpBody()
                ));
                break;
            default:
                // everything is fine here, we're fine, how are you?
                break;
        }

        // free the handle
        $http->close();

        // return the HttpResponse object
        $this->debug(Lang::translate('HTTP STATUS [%s]'), $response->HttpStatus());

        return $response;
    }

    /**
     * Allows the user to append a user agent string
     *
     * Programs that are using these bindings are encouraged to add their
     * user agent to the one supplied by this SDK. This will permit cloud
     * providers to track users so that they can provide better service.
     *
     * @api
     * @param string $agent an arbitrary user-agent string; e.g. "My Cloud App"
     * @return void
     */
    public function AppendUserAgent($agent)
    {
        $this->useragent .= ';'.$agent;
    }

    /**
     * Sets default values for name, region, URL type for a service
     *
     * Once these are set (and they can also be set by defining global
     * constants), then you do not need to specify these values when
     * creating new service objects.
     *
     * @api
     * @param string $service the name of a supported service; e.g. 'Compute'
     * @param string $name the service name; e.g., 'cloudServersOpenStack'
     * @param string $region the region name; e.g., 'LON'
     * @param string $urltype the type of URL to use; e.g., 'internalURL'
     * @return void
     * @throws UnrecognizedServiceError
     */
    public function SetDefaults(
        $service,
        $name = null,
        $region = null,
        $urltype = null
    ) {

        if (!isset($this->defaults[$service])) {
            throw new Exceptions\UnrecognizedServiceError(sprintf(
                Lang::translate('Service [%s] is not recognized'), $service
            ));
        }

        if (isset($name)) {
            $this->defaults[$service]['name'] = $name;
        }

        if (isset($region)) {
            $this->defaults[$service]['region'] = $region;
        }

        if (isset($urltype)) {
            $this->defaults[$service]['urltype'] = $urltype;
        }
    }

    /**
     * Sets the timeouts for the current connection
     *
     * @api
     * @param integer $t_http the HTTP timeout value (the max period that
     *      the OpenStack object will wait for any HTTP request to complete).
     *      Value is in seconds.
     * @param integer $t_conn the Connect timeout value (the max period
     *      that the OpenStack object will wait to establish an HTTP
     *      connection). Value is in seconds.
     * @param integer $t_overlimit the overlimit timeout value (the max period
     *      that the OpenStack object will wait to retry on an overlimit
     *      condition). Value is in seconds.
     * @return void
     */
    public function SetTimeouts($t_http, $t_conn = null, $t_overlimit = null)
    {
        $this->http_timeout = $t_http;

        if (isset($t_conn)) {
            $this->connect_timeout = $t_conn;
        }

        if (isset($t_overlimit)) {
            $this->overlimit_timeout = $t_overlimit;
        }
    }

    /**
     * Allows the user to define a function for tracking uploads
     *
     * This can be used to implement a progress bar or similar function. The
     * callback function is called with a single parameter, the length of the
     * data that is being uploaded on this call.
     *
     * @param callable $callback the name of a global callback function, or an
     *      array($object, $functionname)
     * @return void
     */
    public function SetUploadProgressCallback($callback)
    {
        $this->_user_write_progress_callback_func = $callback;
    }

    /**
     * Allows the user to define a function for tracking downloads
     *
     * This can be used to implement a progress bar or similar function. The
     * callback function is called with a single parameter, the length of the
     * data that is being downloaded on this call.
     *
     * @param callable $callback the name of a global callback function, or an
     *      array($object, $functionname)
     * @return void
     */
    public function SetDownloadProgressCallback($callback)
    {
        $this->_user_read_progress_callback_func = $callback;
    }

    /**
     * Callback function to handle reads for file uploads
     *
     * Internal function for handling file uploads. Note that, although this
     * function's visibility is public, this is only because it must be called
     * from the HttpRequest interface. This should NOT be called by users
     * directly.
     *
     * @param resource $ch a CURL handle
     * @param resource $fd a file descriptor
     * @param integer $length the amount of data to read
     * @return string the data read
     */
    public function _read_cb($ch, $fd, $length)
    {
        $data = fread($fd, $length);
        $len = strlen($data);
        if (isset($this->_user_write_progress_callback_func)) {
            call_user_func($this->_user_write_progress_callback_func, $len);
        }
        return $data;
    }

    /**
     * Callback function to handle writes for file downloads
     *
     * Internal function for handling file downloads. Note that, although this
     * function's visibility is public, this is only because it must be called
     * via the HttpRequest interface. This should NOT be called by users
     * directly.
     *
     * @param resource $ch a CURL handle
     * @param string $data the data to be written to a file
     * @return integer the number of bytes written
     */
    public function _write_cb($ch, $data)
    {
        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        if (!isset($this->_file_descriptors[$url])) {
            throw new Exceptions\HttpUrlError(sprintf(
                Lang::translate('Cannot find file descriptor for URL [%s]'), $url)
            );
        }

        $fp = $this->_file_descriptors[$url];
        $dlen = strlen($data);
        fwrite($fp, $data, $dlen);

        // call used callback function
        if (isset($this->_user_read_progress_callback_func)) {
            call_user_func($this->_user_read_progress_callback_func, $dlen);
        }

        // MUST return the length to CURL
        return $dlen;
    }

    /**
     * exports saved token, expiration, tenant, and service catalog as an array
     *
     * This could be stored in a cache (APC or disk file) and reloaded using
     * ImportCredentials()
     *
     * @return array
     */
    public function ExportCredentials()
    {
        $arr = array();

        foreach($this->export_items as $item) {
            $arr[$item] = $this->$item;
        }

        return $arr;
    }

    /**
     * imports credentials from an array
     *
     * Takes the same values as ExportCredentials() and reuses them.
     *
     * @return void
     */
    public function ImportCredentials($values)
    {
        if (!is_array($values)) {
            throw new Exceptions\DomainError(
                Lang::translate('ImportCredentials() requires an array')
            );
        }

        foreach($this->export_items as $item) {
            $this->$item = $values[$item];
        }
    }

    /********** FACTORY METHODS **********/

    /**
     * These methods are provided to permit easy creation of services
     * (for example, Nova or Swift) from a connection object. As new
     * services are supported, factory methods should be provided here.
     */

    /**
     * Creates a new ObjectStore object (Swift/Cloud Files)
     *
     * @api
     * @param string $name the name of the Object Storage service to attach to
     * @param string $region the name of the region to use
     * @param string $urltype the URL type (normally "publicURL")
     * @return ObjectStore
     */
    public function ObjectStore($name = null, $region = null, $urltype = null)
    {
        return $this->Service('ObjectStore', $name, $region, $urltype);
    }

    /**
     * Creates a new Compute object (Nova/Cloud Servers)
     *
     * @api
     * @param string $name the name of the Compute service to attach to
     * @param string $region the name of the region to use
     * @param string $urltype the URL type (normally "publicURL")
     * @return Compute
     */
    public function Compute($name = null, $region = null, $urltype = null)
    {
        return $this->Service('Compute', $name, $region, $urltype);
    }

    /**
     * Creates a new Orchestration (heat) service object
     *
     * @api
     * @param string $name the name of the Compute service to attach to
     * @param string $region the name of the region to use
     * @param string $urltype the URL type (normally "publicURL")
     * @return Orchestration\Service
     */
    public function Orchestration($name = null, $region = null, $urltype = null)
    {
        return $this->Service('Orchestration', $name, $region, $urltype);
    }

    /**
     * Creates a new VolumeService (cinder) service object
     *
     * This is a factory method that is Rackspace-only (NOT part of OpenStack).
     *
     * @param string $name the name of the service (e.g., 'cloudBlockStorage')
     * @param string $region the region (e.g., 'DFW')
     * @param string $urltype the type of URL (e.g., 'publicURL');
     */
    public function VolumeService($name = null, $region = null, $urltype = null)
    {
        return $this->Service('Volume', $name, $region, $urltype);
    }

    /**
     * Generic Service factory method
     *
     * Contains code reused by the other service factory methods.
     *
     * @param string $class the name of the Service class to produce
     * @param string $name the name of the Compute service to attach to
     * @param string $region the name of the region to use
     * @param string $urltype the URL type (normally "publicURL")
     * @return Service (or subclass such as Compute, ObjectStore)
     * @throws ServiceValueError
     */
    public function Service($class, $name = null, $region = null, $urltype = null)
    {
        // debug message
        $this->debug('Factory for class [%s] [%s/%s/%s]', $class, $name, $region, $urltype);

        if (strpos($class, '\OpenCloud\\') === 0) {
            $class = str_replace('\OpenCloud\\', '', $class);
        }

        // check for defaults
        if (!isset($name)) {
            $name = $this->defaults[$class]['name'];
        }

        if (!isset($region)) {
            $region = $this->defaults[$class]['region'];
        }

        if (!isset($urltype)) {
            $urltype = $this->defaults[$class]['urltype'];
        }

        // report errors
        if (!$name) {
            throw new Exceptions\ServiceValueError(
                Lang::translate('No value for '.$class.' name')
            );
        }

        if (!$region) {
            throw new Exceptions\ServiceValueError(
                Lang::translate('No value for '.$class.' region')
            );
        }

        if (!$urltype) {
            throw new Exceptions\ServiceValueError(
                Lang::translate('No value for '.$class.' URL type')
            );
        }

        // return the object
        $fullclass = '\OpenCloud\\' . $class . '\\Service';

        return new $fullclass(
            $this,
            $name,
            $region,
            $urltype
        );
    }

    /**
     * returns a service catalog item
     *
     * This is a helper function used to list service catalog items easily
     */
    public function ServiceCatalogItem($info = array())
    {
        return new ServiceCatalogItem($info);
    }

}
