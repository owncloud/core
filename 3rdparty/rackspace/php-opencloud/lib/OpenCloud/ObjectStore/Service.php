<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore;

use Guzzle\Http\EntityBody;
use Guzzle\Http\Url;
use OpenCloud\Common\Constants\Header;
use OpenCloud\Common\Constants\Mime;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Exceptions\InvalidArgumentError;
use OpenCloud\Common\Http\Client;
use OpenCloud\Common\Http\Message\Formatter;
use OpenCloud\Common\Service\ServiceBuilder;
use OpenCloud\ObjectStore\Resource\Container;
use OpenCloud\ObjectStore\Constants\UrlType;
use OpenCloud\ObjectStore\Upload\ContainerMigration;

/**
 * The ObjectStore (Cloud Files) service.
 */
class Service extends AbstractService 
{
    const DEFAULT_NAME = 'cloudFiles';
    const DEFAULT_TYPE = 'object-store';

    /**
     * This holds the associated CDN service (for Rackspace public cloud)
     * or is NULL otherwise. The existence of an object here is
     * indicative that the CDN service is available.
     */
    private $cdnService;

    public function __construct(Client $client, $type = null, $name = null, $region = null, $urlType = null)
    {
        parent::__construct($client, $type, $name, $region, $urlType);

        try {
            $this->cdnService = ServiceBuilder::factory($client, 'OpenCloud\ObjectStore\CDNService', array(
                'region' => $region
            ));
        } catch (Exceptions\EndpointError $e) {}
    }

    /**
     * @return CDNService
     */
    public function getCdnService() 
    {
        return $this->cdnService;
    }

    /**
     * @param $data
     * @return Container
     */
    public function getContainer($data = null)
    {
        return new Container($this, $data);
    }

    /**
     * Create a container for this service.
     *
     * @param       $name     The name of the container
     * @param array $metadata Additional (optional) metadata to associate with the container
     * @return bool|static
     */
    public function createContainer($name, array $metadata = array())
    {
        $this->checkContainerName($name);
        
        $containerHeaders = Container::stockHeaders($metadata);
            
        $response = $this->getClient()
            ->put($this->getUrl($name), $containerHeaders)
            ->send();
        
        if ($response->getStatusCode() == 201) {
            return Container::fromResponse($response, $this);
        }
        
        return false;
    }

    /**
     * Check the validity of a potential container name.
     *
     * @param $name
     * @return bool
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public function checkContainerName($name)
    {
        if (strlen($name) == 0) {
            $error = 'Container name cannot be blank';
        }

        if (strpos($name, '/') !== false) {
            $error = 'Container name cannot contain "/"';
        }

        if (strlen($name) > self::MAX_CONTAINER_NAME_LENGTH) {
            $error = 'Container name is too long';
        }
        
        if (isset($error)) {
            throw new InvalidArgumentError($error);
        }

        return true;
    }

    /**
     * Perform a bulk extraction, expanding an archive file. If the $path is an empty string, containers will be
     * auto-created accordingly, and files in the archive that do not map to any container (files in the base directory)
     * will be ignored. You can create up to 1,000 new containers per extraction request. Also note that only regular
     * files will be uploaded. Empty directories, symlinks, and so on, will not be uploaded.
     *
     * @param        $path        The path to the archive being extracted
     * @param        $archive     The contents of the archive (either string or stream)
     * @param string $archiveType The type of archive you're using {@see \OpenCloud\ObjectStore\Constants\UrlType}
     * @return \Guzzle\Http\Message\Response
     * @throws Exception\BulkOperationException
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public function bulkExtract($path = '', $archive, $archiveType = UrlType::TAR_GZ)
    {
        $entity = EntityBody::factory($archive);
        
        $acceptableTypes = array(
            UrlType::TAR,
            UrlType::TAR_GZ,
            UrlType::TAR_BZ2
        );
        
        if (!in_array($archiveType, $acceptableTypes)) {
            throw new InvalidArgumentError(sprintf(
                'The archive type must be one of the following: [%s]. You provided [%s].',
                implode($acceptableTypes, ','),
                print_r($archiveType, true)
            ));
        }
        
        $url = $this->getUrl()->addPath($path)->setQuery(array('extract-archive' => $archiveType));
        $response = $this->getClient()->put($url, array(Header::CONTENT_TYPE => ''), $entity)->send();
        
        $body = Formatter::decode($response);

        if (!empty($body->Errors)) {
            throw new Exception\BulkOperationException((array) $body->Errors);
        }
        
        return $response;
    }

    /**
     * This method will delete multiple objects or containers from their account with a single request.
     *
     * @param array $paths A two-dimensional array of paths:
     *                      array('container_a/file_1', 'container_b/file_78', 'container_c/file_40582')
     * @return \Guzzle\Http\Message\Response
     * @throws Exception\BulkOperationException
     */
    public function bulkDelete(array $paths)
    {
        $entity = EntityBody::factory(implode(PHP_EOL, $paths));
        
        $url = $this->getUrl()->setQuery(array('bulk-delete' => true));
        
        $response = $this->getClient()
            ->delete($url, array(Header::CONTENT_TYPE => Mime::TEXT), $entity)
            ->send();

        try {
            $body = Formatter::decode($response);
            if (!empty($body->Errors)) {
                throw new Exception\BulkOperationException((array) $body->Errors);
            }
        } catch (Exceptions\JsonError $e) {}
        
        return $response;
    }

    /**
     * Allows files to be transferred from one container to another.
     *
     * @param Container $old Where you're moving files from
     * @param Container $new Where you're moving files to
     * @return array    Of PUT responses
     */
    public function migrateContainer(Container $old, Container $new, array $options = array())
    {
        $migration = ContainerMigration::factory($old, $new, $options);

        return $migration->transfer();
    }
}