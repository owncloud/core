<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Resource;

use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Url;
use OpenCloud\Common\Constants\Header as HeaderConst;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\ObjectStore\Constants\UrlType;

/**
 * Objects are the basic storage entities in Cloud Files. They represent the 
 * files and their optional metadata you upload to the system. When you upload 
 * objects to Cloud Files, the data is stored as-is (without compression or 
 * encryption) and consists of a location (container), the object's name, and 
 * any metadata you assign consisting of key/value pairs.
 */
class DataObject extends AbstractResource
{
    const METADATA_LABEL = 'Object';

    /**
     * @var Container
     */
    private $container;

    /**
     * @var The file name of the object
     */
    protected $name;
    
    /**
     * @var EntityBody 
     */
    protected $content;

    /**
     * @var bool Whether or not this object is a "pseudo-directory"
     * @link http://docs.openstack.org/trunk/openstack-object-storage/developer/content/pseudo-hierarchical-folders-directories.html
     */
    protected $directory = false;

    /**
     * @var string The object's content type
     */
    protected $contentType;

    /**
     * @var The size of this object.
     */
    protected $contentLength;

    /**
     * @var string Date of last modification.
     */
    protected $lastModified;

    /**
     * @var string Etag.
     */
    protected $etag;

    /**
     * Also need to set Container parent and handle pseudo-directories.
     * {@inheritDoc}
     *
     * @param Container $container
     * @param null      $data
     */
    public function __construct(Container $container, $data = null)
    {
        $this->setContainer($container);

        parent::__construct($container->getService());
        
        // For pseudo-directories, we need to ensure the name is set
        if (!empty($data->subdir)) {
            $this->setName($data->subdir)->setDirectory(true);
            return;
        }

        $this->populate($data);
    }

    /**
     * A collection list of DataObjects contains a different data structure than the one returned for the
     * "Retrieve Object" operation. So we need to stock the values differently.
     * {@inheritDoc}
     */
    public function populate($info, $setObjects = true)
    {
        parent::populate($info, $setObjects);

        if (isset($info->bytes)) {
            $this->setContentLength($info->bytes);
        }
        if (isset($info->last_modified)) {
            $this->setLastModified($info->last_modified);
        }
        if (isset($info->content_type)) {
            $this->setContentType($info->content_type);
        }
        if (isset($info->hash)) {
            $this->setEtag($info->hash);
        }
    }

    /**
     * Takes a response and stocks common values from both the body and the headers.
     *
     * @param Response $response
     * @return $this
     */
    public function populateFromResponse(Response $response)
    {
        $this->content = $response->getBody();

        $headers = $response->getHeaders();

        return $this->setMetadata($headers, true)
            ->setContentType((string) $headers[HeaderConst::CONTENT_TYPE])
            ->setLastModified((string) $headers[HeaderConst::LAST_MODIFIED])
            ->setContentLength((string) $headers[HeaderConst::CONTENT_LENGTH])
            ->setEtag((string) $headers[HeaderConst::ETAG]);
    }

    public function refresh()
    {
        $response = $this->getService()->getClient()
            ->get($this->getUrl())
            ->send();

        return $this->populateFromResponse($response);
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
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param $name string
     * @return $this
     */
    public function setName($name)
    {
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
     * @param $directory bool
     * @return $this
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDirectory()
    {
        return $this->directory;
    }
    
    /**
     * @return bool Is this data object a pseudo-directory?
     */
    public function isDirectory()
    {
        return (bool) $this->directory;
    }

    /**
     * @param  mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->etag = null;
        $this->contentType = null;
        $this->content = EntityBody::factory($content);
        return $this;
    }

    /**
     * @return EntityBody
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param  string $contentType
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContentType()
    {
        return $this->contentType ?: $this->content->getContentType();
    }

    /**
     * @param $contentType int
     * @return $this
     */
    public function setContentLength($contentLength)
    {
        $this->contentLength = $contentLength;
        return $this;
    }

    /**
     * @return int
     */
    public function getContentLength()
    {
        return $this->contentLength !== null ? $this->contentLength : $this->content->getContentLength();
    }

    /**
     * @param $etag
     * @return $this
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEtag()
    {
        return $this->etag ?: $this->content->getContentMd5();
    }

    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function primaryKeyField()
    {
        return 'name';
    }

    public function getUrl($path = null, array $params = array())
    {
        if (!$this->name) {
            throw new Exceptions\NoNameError(Lang::translate('Object has no name'));
        }

        return $this->container->getUrl($this->name);
    }

    public function update($params = array())
    {
        $metadata = is_array($this->metadata) ? $this->metadata : $this->metadata->toArray();
        $metadata = self::stockHeaders($metadata);

        // merge specific properties with metadata
        $metadata += array(
            HeaderConst::CONTENT_TYPE => $this->contentType,
            HeaderConst::LAST_MODIFIED => $this->lastModified,
            HeaderConst::CONTENT_LENGTH => $this->contentLength,
            HeaderConst::ETAG => $this->etag
        );

        return $this->container->uploadObject($this->name, $this->content, $metadata);
    }

    /**
     * @param string $destination Path (`container/object') of new object
     * @return \Guzzle\Http\Message\Response
     */
    public function copy($destination)
    {
        return $this->getService()
            ->getClient()
            ->createRequest('COPY', $this->getUrl(), array(
                'Destination' => (string) $destination
            ))
            ->send();
    }

    public function delete($params = array())
    {
        return $this->getService()->getClient()->delete($this->getUrl())->send();
    }

    /**
     * Get a temporary URL for this object.
     *
     * @link http://docs.rackspace.com/files/api/v1/cf-devguide/content/TempURL-d1a4450.html
     *
     * @param $expires Expiration time in seconds
     * @param $method  What method can use this URL? (`GET' or `PUT')
     * @return string
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     * @throws \OpenCloud\Common\Exceptions\ObjectError
     *
     */
    public function getTemporaryUrl($expires, $method)
    {
        $method = strtoupper($method);
        $expiry = time() + (int) $expires;

        // check for proper method
        if ($method != 'GET' && $method != 'PUT') {
            throw new Exceptions\InvalidArgumentError(sprintf(
                'Bad method [%s] for TempUrl; only GET or PUT supported',
                $method
            ));
        }
        
        // @codeCoverageIgnoreStart
        if (!($secret = $this->getService()->getAccount()->getTempUrlSecret())) {
            throw new Exceptions\ObjectError('Cannot produce temporary URL without an account secret.');
        }
        // @codeCoverageIgnoreEnd

        $url  = $this->getUrl();
        $urlPath = urldecode($url->getPath());
        $body = sprintf("%s\n%d\n%s", $method, $expiry, $urlPath);
        $hash = hash_hmac('sha1', $body, $secret);

        return sprintf('%s?temp_url_sig=%s&temp_url_expires=%d', $url, $hash, $expiry);
    }

    /**
     * Remove this object from the CDN.
     *
     * @param null $email
     * @return mixed
     */
    public function purge($email = null)
    {
        if (!$cdn = $this->getContainer()->getCdn()) {
            return false;
        }

        $url = clone $cdn->getUrl();
        $url->addPath($this->name);

        $headers = ($email !== null) ? array('X-Purge-Email' => $email) : array();

        return $this->getService()
            ->getClient()
            ->delete($url, $headers)
            ->send();
    }

    /**
     * @param string $type
     * @return bool|Url
     */
    public function getPublicUrl($type = UrlType::CDN)
    {
        $cdn = $this->container->getCdn();
        
        switch ($type) {
            case UrlType::CDN:
                $uri = $cdn->getCdnUri();
                break;
            case UrlType::SSL:
                $uri = $cdn->getCdnSslUri();
                break;
            case UrlType::STREAMING:
                $uri = $cdn->getCdnStreamingUri();
                break;
            case UrlType::IOS_STREAMING:
            	$uri = $cdn->getIosStreamingUri();
                break; 
        }
        
        return (isset($uri)) ? Url::factory($uri)->addPath($this->name) : false;
    }

    protected static function headerIsValidMetadata($header)
    {
        $pattern = sprintf('#^%s-%s-Meta-#i', self::GLOBAL_METADATA_PREFIX, self::METADATA_LABEL);
        return preg_match($pattern, $header);
    }
}