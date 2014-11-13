<?php
/**
 * PHP OpenCloud library
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Identity;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Url;
use OpenCloud\Common\Collection\PaginatedIterator;
use OpenCloud\Common\Collection\ResourceIterator;
use OpenCloud\Common\Http\Message\Formatter;
use OpenCloud\Common\Service\AbstractService;
use OpenCloud\Identity\Constants\User as UserConst;

/**
 * Class responsible for working with Rackspace's Cloud Identity service.
 *
 * @package OpenCloud\Identity
 */
class Service extends AbstractService
{

    /**
     * Factory method which allows for easy service creation
     *
     * @param  ClientInterface $client
     * @return self
     */
    public static function factory(ClientInterface $client)
    {
        $identity = new self();
        $identity->setClient($client);
        $identity->setEndpoint(clone $client->getAuthUrl());

        return $identity;
    }

    /**
     * Get this service's URL, with appended path if necessary.
     *
     * @return \Guzzle\Http\Url
     */
    public function getUrl($path = null)
    {
        $url = clone $this->getEndpoint();

        if ($path) {
            $url->addPath($path);
        }

        return $url;
    }

    /**
     * Get all users for the current tenant.
     *
     * @return \OpenCloud\Common\Collection\ResourceIterator
     */
    public function getUsers()
    {
        $response = $this->getClient()->get($this->getUrl('users'))->send();

        if ($body = Formatter::decode($response)) {
            return ResourceIterator::factory($this, array(
                'resourceClass'  => 'User',
                'key.collection' => 'users'
            ), $body->users);
        }
    }

    /**
     * Used for iterator resource instantation.
     */
    public function user($info = null)
    {
        return $this->resource('User', $info);
    }

    /**
     * Get a user based on a particular keyword and a certain search mode.
     *
     * @param $search string Keyword
     * @param $mode   string Either 'name', 'userId' or 'email'
     * @return \OpenCloud\Identity\Resource\User
     */
    public function getUser($search, $mode = UserConst::MODE_NAME)
    {
        $url = $this->getUrl('users');

        switch ($mode) {
            default:
            case UserConst::MODE_NAME:
                $url->setQuery(array('name' => $search));
                break;
            case UserConst::MODE_ID:
                $url->addPath($search);
                break;
            case UserConst::MODE_EMAIL:
                $url->setQuery(array('email' => $search));
                break;
        }

        $user = $this->resource('User');
        $user->refreshFromLocationUrl($url);

        return $user;
    }

    /**
     * Create a new user with provided params.
     *
     * @param  $params array User data
     * @return \OpenCloud\Identity\Resource\User
     */
    public function createUser(array $params)
    {
        $user = $this->resource('User');
        $user->create($params);
        return $user;
    }

    /**
     * Get all possible roles.
     *
     * @return \OpenCloud\Common\Collection\PaginatedIterator
     */
    public function getRoles()
    {
        return PaginatedIterator::factory($this, array(
            'resourceClass'  => 'Role',
            'baseUrl'        => $this->getUrl()->addPath('OS-KSADM')->addPath('roles'),
            'key.marker'     => 'id',
            'key.collection' => 'roles'
        ));
    }

    /**
     * Get a specific role.
     *
     * @param $roleId string The ID of the role you're looking for
     * @return \OpenCloud\Identity\Resource\Role
     */
    public function getRole($roleId)
    {
        return $this->resource('Role', $roleId);
    }

    /**
     * Generate a new token for a given user.
     *
     * @param   $json    string The JSON data-structure used in the HTTP entity body when POSTing to the API
     * @headers $headers array  Additional headers to send (optional)
     * @return  \Guzzle\Http\Message\Response
     */
    public function generateToken($json, array $headers = array())
    {
        $url = $this->getUrl();
        $url->addPath('tokens');

        $headers += self::getJsonHeader();

        return $this->getClient()->post($url, $headers, $json)->send();
    }

    /**
     * Revoke a given token based on its ID
     *
     * @param $tokenId string Token ID
     * @return \Guzzle\Http\Message\Response
     */
    public function revokeToken($tokenId)
    {
        $token = $this->resource('Token');
        $token->setId($tokenId);
        return $token->delete();
    }

    /**
     * List over all the tenants for this cloud account.
     *
     * @return \OpenCloud\Common\Collection\ResourceIterator
     */
    public function getTenants()
    {
        $url = $this->getUrl();
        $url->addPath('tenants');

        $response = $this->getClient()->get($url)->send();

        if ($body = Formatter::decode($response)) {
            return ResourceIterator::factory($this, array(
                'resourceClass'  => 'Tenant',
                'key.collection' => 'tenants'
            ), $body->tenants);
        }
    }

}