<?php
/**
 * A core object in the Object Storage service (Swift).
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\ObjectStore;

/**
 * A DataObject is an object in the ObjectStore
 *
 * This class uses the name DataObject because "Object" is too generic and conflicts with
 * certain PHP keywords.
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class DataObject extends ObjectStore
{

    public $name;               // the object name
    public $hash;               // hash value of object
    public $bytes;              // size of object in bytes
    public $last_modified;      // date of last modification
    public $content_type;       // Content-Type:
    public $content_length;     // Content-Length:
    public $extra_headers;      // Other headers, eg. Access-Control-Allow-Origin:
    public $send_etag = TRUE;   // Whether or not to calculate and send an etag on Create.

    private $data;           // the actual data
    private $etag;           // the ETag
    private $container;      // the container used by this object

    // this array translates header values (returned by requests) into properties
    private $header_translate = array(
        'Etag'          => 'hash',
        'Last-Modified' => 'last_modified'
    );

    /**
     * A DataObject is related to a container and has a name
     *
     * If `$name` is specified, then it attempts to retrieve the object from the
     * object store.
     *
     * @param Container $container the container holding this object
     * @param mixed $cdata if an object or array, it is treated as values
     *      with which to populate the object. If it is a string, it is
     *      treated as a name and the object's info is retrieved from
     *      the service.
     * @return void
     */
    public function __construct($container, $cdata = NULL)
    {
        parent::__construct();

        $this->container = $container;

        if (is_object($cdata)) {
            foreach($cdata as $property => $value) {
                if ($property == 'metadata') {
                    $this->metadata->SetArray($value);
                } else {
                    $this->$property = $value;
                }
            }
        } elseif (isset($cdata)) {
            $this->name = $cdata;
            $this->Fetch();
        }
    }

    /**
     * Returns the URL of the data object
     *
     * If the object is new and doesn't have a name, then an exception is
     * thrown.
     *
     * @param string $subresource Not used
     * @return string
     * @throws NoNameError
     */
    public function Url($subresource = '')
    {
        if (!$this->name) {
            throw new Exceptions\NoNameError(Lang::translate('Object has no name'));
        }

        return Lang::noslash($this->container->Url()) . '/' . str_replace('%2F', '/', rawurlencode($this->name));
    }

    private function isRealFile($filename)
    {
        return $filename != '/dev/null' && $filename != 'NUL';
    }

    /**
     * Creates (or updates; both the same) an instance of the object
     *
     * @api
     * @param array $params an optional associative array that can contain the
     *      'name' and 'content_type' of the object
     * @param string $filename if provided, then the object is loaded from the
     *      specified file
     * @return boolean
     * @throws CreateUpdateError
     */
    public function Create($params = array(), $filename = null)
    {
        // set/validate the parameters
        $this->SetParams($params);

        // assume no file upload
        $fp = FALSE;

        // if the filename is provided, process it
        if ($filename) {

            if (!$fp = @fopen($filename, 'r')) {
                throw new Exceptions\IOError(sprintf(
                    Lang::translate('Could not open file [%s] for reading'),
                    $filename
                ));
            }

            clearstatcache(TRUE, $filename);

            $filesize = (float) sprintf("%u", filesize($filename));

            if ($filesize > Service::MAX_OBJECT_SIZE) {
                throw new Exceptions\ObjectError("File size exceeds maximum object size.");
            }

            $this->content_length = $filesize;

            if (empty($this->content_type) && $this->isRealFile($filename)) {
                $this->_guess_content_type($filename);
            }

            if ($this->send_etag) {
                $this->etag = md5_file($filename);
            }

            $this->debug('Uploading %u bytes from %s', $filesize, $filename);
        } else {
            // compute the length
            $this->content_length = strlen($this->data);

            if ($this->send_etag) {
                $this->etag = md5($this->data);
            }

        }

        // flag missing Content-Type
        if (empty($this->content_type)) {
            $this->content_type = 'application/octet-stream';
        }

        // set the headers
        $headers = $this->MetadataHeaders();

        if (isset($this->etag)) {
            $headers['ETag'] = $this->etag;
        }

        $headers['Content-Type'] = $this->content_type;
        $headers['Content-Length'] = $this->content_length;

        // copy any extra headers
        if (!empty($this->extra_headers)) {
            foreach ($this->extra_headers as $header=>$value) {
                $headers[$header] = $value;
            }
        }

        // perform the request
        $response = $this->Service()->Request(
            $this->Url(),
            'PUT',
            $headers,
            $fp ? $fp : $this->data
        );

        // check the status
        if (($stat = $response->HttpStatus()) >= 300) {
            throw new Exceptions\CreateUpdateError(sprintf(
                Lang::translate('Problem saving/updating object [%s] HTTP status [%s] response [%s]'),
                $this->Url(),
                $stat,
                $response->HttpBody()
            ));
            return false;
        }

        // set values from response
        foreach ($response->Headers() as $key => $value) {
            if (isset($this->header_translate[$key])) {
                $this->{$this->header_translate[$key]} = $value;
            }
        }

        // close the file handle
        if ($fp) {
            fclose($fp);
        }

        return $response;
    }

    /**
     * Update() is provided as an alias for the Create() method
     *
     * Since update and create both use a PUT request, the different functions
     * may allow the developer to distinguish between the semantics in his or
     * her application.
     *
     * @api
     * @param array $params an optional associative array that can contain the
     *      'name' and 'type' of the object
     * @param string $filename if provided, the object is loaded from the file
     * @return boolean
     */
    public function Update($params = array(), $filename = '')
    {
        return $this->Create($params, $filename);
    }

    /**
     * UpdateMetadata() - updates headers
     *
     * Updates metadata headers
     *
     * @api
     * @param array $params an optional associative array that can contain the
     *      'name' and 'type' of the object
     * @return boolean
     */
    public function UpdateMetadata($params = array())
    {
        $this->SetParams($params);

        // set the headers
        $headers = $this->MetadataHeaders();
        $headers['Content-Type'] = $this->content_type;

        $response = $this->Service()->Request(
            $this->Url(),
            'POST',
            $headers
        );

        // check the status
        if (($stat = $response->HttpStatus()) >= 204) {
            throw new Exceptions\UpdateError(sprintf(
                Lang::translate('Problem updating object [%s] HTTP status [%s] response [%s]'),
                $this->Url(),
                $stat,
                $response->HttpBody()
            ));
            return false;
        }
        return $response;
    }

    /**
     * Deletes an object from the Object Store
     *
     * Note that we can delete without retrieving by specifying the name in the
     * parameter array.
     *
     * @api
     * @param array $params an array of parameters
     * @return HttpResponse if successful; FALSE if not
     * @throws DeleteError
     */
    public function Delete($params = array())
    {
        $this->SetParams($params);

        $response = $this->Service()->Request($this->Url(), 'DELETE');

        // check the status
        if (($stat = $response->HttpStatus()) >= 300) {
            throw new Exceptions\DeleteError(sprintf(
                Lang::translate('Problem deleting object [%s] HTTP status [%s] response [%s]'),
                $this->Url(),
                $stat,
                $response->HttpBody()
            ));
            return false;
        }
        return $response;
    }

    /**
     * Copies the object to another container/object
     *
     * Note that this function, because it operates within the Object Store
     * itself, is much faster than downloading the object and re-uploading it
     * to a new object.
     *
     * @param DataObject $target the target of the COPY command
     */
    public function Copy(Dataobject $target)
    {
        $uri = sprintf('/%s/%s', $target->Container()->Name(), $target->Name());

        $this->debug('Copying object to [%s]', $uri);

        $response = $this->Service()->Request(
            $this->Url(),
            'COPY',
            array('Destination' => $uri)
        );

        // check response code
        if ($response->HttpStatus() > 202) {
            throw new Exceptions\ObjectCopyError(sprintf(
                Lang::translate('Error copying object [%s], status [%d] response [%s]'),
                $this->Url(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        return $response;
    }

    /**
     * Returns the container of the object
     *
     * @return Container
     */
    public function Container()
    {
        return $this->container;
    }

    /**
     * returns the TEMP_URL for the object
     *
     * Some notes:
     * * The `$secret` value is arbitrary; it must match the value set for
     *   the `X-Account-Meta-Temp-URL-Key` on the account level. This can be
     *   set by calling `$service->SetTempUrlSecret($secret)`.
     * * The `$expires` value is the number of seconds you want the temporary
     *   URL to be valid for. For example, use `60` to make it valid for a
     *   minute
     * * The `$method` must be either GET or PUT. No other methods are
     *   supported.
     *
     * @param string $secret the shared secret
     * @param integer $expires the expiration time (in seconds)
     * @param string $method either GET or PUT
     * @return string the temporary URL
     */
    public function TempUrl($secret, $expires, $method)
    {
        $method = strtoupper($method);
        $expiry_time = time() + $expires;

        // check for proper method
        switch ($method) {
            case 'GET':
            case 'PUT':
                break;
            default:
                throw new Exceptions\TempUrlMethodError(sprintf(
                    Lang::translate(
                    'Bad method [%s] for TempUrl; only GET or PUT supported'),
                    $method
                ));
        }

        // construct the URL
        $url = $this->Url();
        $path = urldecode(parse_url($url, PHP_URL_PATH));

        $hmac_body = "$method\n$expiry_time\n$path";
        $hash = hash_hmac('sha1', $hmac_body, $secret);

        $this->debug('URL [%s] SIG [%s] HASH [%s]', $url, $hmac_body, $hash);

        $temp_url = sprintf('%s?temp_url_sig=%s&temp_url_expires=%d',
        	$url, $hash, $expiry_time);

        // debug that stuff
        $this->debug('TempUrl generated [%s]', $temp_url);

        return $temp_url;
    }

    /**
     * Sets object data from string
     *
     * This is a convenience function to permit the use of other technologies
     * for setting an object's content.
     *
     * @param string $data
     * @return void
     */
    public function SetData($data)
    {
        $this->data = (string) $data;
    }

    /**
     * Return object's data as a string
     *
     * @return string the entire object
     */
    public function SaveToString()
    {
        $result = $this->Service()->Request($this->Url());
        return $result->HttpBody();
    }

    /**
     * Saves the object's data to local filename
     *
     * Given a local filename, the Object's data will be written to the newly
     * created file.
     *
     * Example:
     * <code>
     * # ... authentication/connection/container code excluded
     * # ... see previous examples
     *
     * # Whoops!  I deleted my local README, let me download/save it
     * #
     * $my_docs = $conn->get_container("documents");
     * $doc = $my_docs->get_object("README");
     *
     * $doc->SaveToFilename("/home/ej/cloudfiles/readme.restored");
     * </code>
     *
     * @param string $filename name of local file to write data to
     * @return boolean <kbd>TRUE</kbd> if successful
     * @throws IOException error opening file
     * @throws InvalidResponseException unexpected response
     */
    public function SaveToFilename($filename)
    {
        if (!$fp = @fopen($filename, "wb")) {
            throw new Exceptions\IOError(sprintf(
                Lang::translate('Could not open file [%s] for writing'),
                $filename
            ));
        }
        $result = $this->Service()->Request(
            $this->Url(),
            'GET',
            array(),
            $fp
        );
        fclose($fp);
        return $result;
    }

    /**
     * Saves the object's to a stream filename
     *
     * Given a local filename, the Object's data will be written to the stream
     *
     * Example:
     * <code>
     * # ... authentication/connection/container code excluded
     * # ... see previous examples
     *
     * # If I want to write the README to a temporary memory string I
     * # do :
     * #
     * $my_docs = $conn->get_container("documents");
     * $doc = $my_docs->DataObject(array("name"=>"README"));
     *
     * $fp = fopen('php://temp', 'r+');
     * $doc->SaveToStream($fp);
     * fclose($fp);
     * </code>
     *
     * @param string $filename name of local file to write data to
     * @return boolean <kbd>TRUE</kbd> if successful
     * @throws IOException error opening file
     * @throws InvalidResponseException unexpected response
     */
    public function SaveToStream($resource)
    {
        if (!is_resource($resource)) {
            throw new \Exceptions\ObjectError(
                Lang::translate("Resource argument not a valid PHP resource."
             ));
        }

        $result = $this->Service()->Request(
            $this->Url(),
            'GET',
            array(),
            $resource
        );
        return $result;
    }


    /**
     * Returns the object's MD5 checksum
     *
     * Accessor method for reading Object's private ETag attribute.
     *
     * @api
     * @return string MD5 checksum hexidecimal string
     */
    public function getETag()
    {
        return $this->etag;
    }

    /**
     * Purges the object from the CDN
     *
     * Note that the object will still be served up to the time of its
     * TTL value.
     *
     * @api
     * @param string $email An email address that will be notified when
     *      the object is purged.
     * @return void
     * @throws CdnError if the container is not CDN-enabled
     * @throws CdnHttpError if there is an HTTP error in the transaction
     */
    public function PurgeCDN($email)
    {
        if (!$cdn = $this->Container()->CDNURL()) {
            throw new Exceptions\CdnError(Lang::translate('Container is not CDN-enabled'));
        }

        $url = $cdn . '/' . $this->name;
        $headers['X-Purge-Email'] = $email;
        $response = $this->Service()->Request($url, 'DELETE', $headers);

        // check the status
        if ($response->HttpStatus() > 204) {
            throw new Exceptions\CdnHttpError(sprintf(
                Lang::translate('Error purging object, status [%d] response [%s]'),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }
    }

    /**
     * Returns the CDN URL (for managing the object)
     *
     * Note that the DataObject::PublicURL() method is used to return the
     * publicly-available URL of the object, while the CDNURL() is used
     * to manage the object.
     *
     * @return string
     */
    public function CDNURL()
    {
        return $this->Container()->CDNURL().'/'.$this->name;
    }

    /**
     * Returns the object's Public CDN URL, if available
     *
     * @api
     * @param string $type can be 'streaming', 'ssl', or anything else for the
     *      default URL.
     * @return string
     */
    public function PublicURL($type = null)
    {
        if (!$prefix = $this->Container()->CDNURI()) {
            return null;
        }

        switch(strtoupper($type)) {
            case 'SSL':
                return $this->Container()->SSLURI().'/'.$this->name;
            case 'STREAMING':
                return $this->Container()->StreamingURI().'/'.$this->name;
            default:
                return $prefix.'/'.$this->name;
        }
    }

    /**
     * Sets parameters from an array; validates them
     *
     * @param array $params associative array of parameters
     * @return void
     * @throws UnknownParameterError
     */
    private function SetParams($params)
    {
        foreach($params as $item => $value) {
            switch($item) {
                case 'name':
                    $this->name = $value;
                    break;
                case 'type':
                    throw new Exceptions\UnknownParameterError(
                        Lang::translate(
                        'Parameter [type] is deprecated; use "content_type"')
                    );
                case 'content_type':
                    $this->content_type = $value;
                    break;
                case 'extra_headers':
                    $this->extra_headers = $value;
                    break;
                case 'send_etag':
                    $this->send_etag = $value;
                    break;
                default:
                    throw new Exceptions\UnknownParameterError(sprintf(
                        Lang::translate(
                        	'Unrecognized parameter [%s] for object [%s]'),
							$item,
							$this->Url()
                    ));
            }
        }
    }

    /**
     * Retrieves a single object, parses headers
     *
     * @return void
     * @throws NoNameError, ObjFetchError
     */
    private function Fetch()
    {
        if (!$this->name) {
            throw new Exceptions\NoNameError(Lang::translate('Cannot retrieve an unnamed object'));
        }

        $response = $this->Service()->Request($this->Url(), 'HEAD', array('Accept'=>'*/*'));

        // check for errors
        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\ObjFetchError(sprintf(
                Lang::translate('Problem retrieving object [%s]'),
                $this->Url()
            ));
            return false;
        }

        if (!isset($this->extra_headers)) {
            $this->extra_headers = array();
        }

        // set headers as metadata?
        foreach($response->Headers() as $header => $value) {
            switch($header) {
            case 'Content-Type':
                $this->content_type = $value;
                break;
            case 'Content-Length':
                $this->content_length = $value;
                $this->bytes = $value;
                break;
            default:
                $this->extra_headers[$header] = $value;
                break;
            }
        }

        // parse the metadata
        $this->GetMetadata($response);
    }

    /**
     * Returns the service associated with this object
     *
     * It's actually the object's container's service, so this method will
     * simplify things a bit.
     */
    private function Service()
    {
        return $this->container->Service();
    }

    /**
     * Performs an internal check to get the proper MIME type for an object
     *
     * This function would go over the available PHP methods to get
     * the MIME type.
     *
     * By default it will try to use the PHP fileinfo library which is
     * available from PHP 5.3 or as an PECL extension
     * (http://pecl.php.net/package/Fileinfo).
     *
     * It will get the magic file by default from the system wide file
     * which is usually available in /usr/share/magic on Unix or try
     * to use the file specified in the source directory of the API
     * (share directory).
     *
     * if fileinfo is not available it will try to use the internal
     * mime_content_type function.
     *
     * @param string $handle name of file or buffer to guess the type from
     * @return boolean <kbd>TRUE</kbd> if successful
     * @throws BadContentTypeException
     */
    private function _guess_content_type($handle)
    {
        if ($this->content_type) {
            return;
        }

        if (function_exists("finfo_open")) {
            $local_magic = dirname(__FILE__) . "/share/magic";

            if ($finfo = @finfo_open(FILEINFO_MIME, $local_magic) ?: @finfo_open(FILEINFO_MIME)) {
                if (is_file((string) $handle)) {
                    $ct = @finfo_file($finfo, $handle);
                } else {
                    $ct = @finfo_buffer($finfo, $handle);
                }

                /**
                 * PHP 5.3 fileinfo display extra information like
                 * charset so we remove everything after the ; since
                 * we are not into that stuff
                 */
                if ($ct) {
                    if ($extra_content_type_info = strpos($ct, "; ")) {
                        $ct = substr($ct, 0, $extra_content_type_info);
                    }
                }

                if ($ct && $ct != 'application/octet-stream') {
                    $this->content_type = $ct;
                }

                @finfo_close($finfo);
            }
        }

        if (!$this->content_type
            && (string) is_file($handle)
            && function_exists("mime_content_type")
        ) {
            $this->content_type = @mime_content_type($handle);
        }

        if (!$this->content_type) {
            throw new Exceptions\NoContentTypeError(Lang::translate('Required Content-Type not set'));
        }

        return TRUE;
    }

}
