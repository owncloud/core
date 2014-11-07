<?php
/**
 * PHP OpenCloud library
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Identity\Resource;

use OpenCloud\Common\Collection\PaginatedIterator;
use OpenCloud\Common\Http\Message\Formatter;
use OpenCloud\Common\PersistentObject;

/**
 * User class which encapsulates functionality for a user.
 *
 * A user is a digital representation of a person, system, or service who consumes cloud services. Users have
 * credentials and may be assigned tokens; based on these credentials and tokens, the authentication service validates
 * that incoming requests are being made by the user who claims to be making the request, and that the user has the
 * right to access the requested resources. Users may be directly assigned to a particular tenant and behave as if they
 * are contained within that tenant.
 *
 * @package OpenCloud\Identity\Resource
 */
class User extends PersistentObject
{
    /** @var string The default region for this region. Can be ORD, DFW, IAD, LON, HKG or SYD */
    private $defaultRegion;

    /** @var string  */
    private $domainId;

    /** @var int The ID of this user */
    private $id;

    /** @var string The username of this user */
    private $username;

    /** @var string The email address of this user */
    private $email;

    /** @var bool Whether or not this user is enabled or not */
    private $enabled;

    /** @var string The string password for this user */
    private $password;

    protected $createKeys = array('username', 'email', 'enabled');
    protected $updateKeys = array('username', 'email', 'enabled', 'RAX-AUTH:defaultRegion', 'RAX-AUTH:domainId', 'id');

    protected $aliases = array(
        'RAX-AUTH:defaultRegion' => 'defaultRegion',
        'RAX-AUTH:domainId'      => 'domainId',
        'OS-KSADM:password'      => 'password'
    );

    protected static $url_resource = 'users';
    protected static $json_name    = 'user';

    /**
     * @param $region Set the default region
     */
    public function setDefaultRegion($region)
    {
        $this->defaultRegion = $region;
    }

    /**
     * @return string Get the default region
     */
    public function getDefaultRegion()
    {
        return $this->defaultRegion;
    }

    /**
     * @param $domainId Set the domain ID
     */
    public function setDomainId($domainId)
    {
        $this->domainId = $domainId;
    }

    /**
     * @return string Get the domain ID
     */
    public function getDomainId()
    {
        return $this->domainId;
    }

    /**
     * @param $id Set the ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int Get the ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $username Set the username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string Get the username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $email Sets the email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string Get the email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $enabled Sets the enabled flag
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool Get the enabled flag
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return bool Check whether this user is enabled or not
     */
    public function isEnabled()
    {
        return $this->enabled === true;
    }

    /**
     * @param $username Set the username
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string Get the username
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function primaryKeyField()
    {
        return 'id';
    }

    public function updateJson($params = array())
    {
        $array = array();
        foreach ($this->updateKeys as $key) {
            if (isset($this->$key)) {
                $array[$key] = $this->$key;
            }
        }
        return (object) array('user' => $array);
    }

    /**
     * This operation will set this user's password to a new value.
     *
     * @param $newPassword The new password to use for this user
     * @return \Guzzle\Http\Message\Response
     */
    public function updatePassword($newPassword)
    {
        $array = array(
            'username' => $this->username,
            'OS-KSADM:password' => $newPassword
        );

        $json = json_encode((object) array('user' => $array));

        return $this->getClient()->post($this->getUrl(), self::getJsonHeader(), $json)->send();
    }

    /**
     * This operation lists a user's non-password credentials for all authentication methods available to the user.
     *
     * @return array|null
     */
    public function getOtherCredentials()
    {
        $url = $this->getUrl();
        $url->addPath('OS-KSADM')->addPath('credentials');

        $response = $this->getClient()->get($url)->send();

        if ($body = Formatter::decode($response)) {
            return isset($body->credentials) ? $body->credentials : null;
        }
    }

    /**
     * Get the API key for this user.
     *
     * @return string|null
     */
    public function getApiKey()
    {
        $url = $this->getUrl();
        $url->addPath('OS-KSADM')->addPath('credentials')->addPath('RAX-KSKEY:apiKeyCredentials');

        $response = $this->getClient()->get($url)->send();

        if ($body = Formatter::decode($response)) {
            return isset($body->{'RAX-KSKEY:apiKeyCredentials'}->apiKey)
                ? $body->{'RAX-KSKEY:apiKeyCredentials'}->apiKey
                : null;
        }
    }

    /**
     * Reset the API key for this user to a new arbitrary value (which is returned).
     *
     * @return string|null
     */
    public function resetApiKey()
    {
        $url = $this->getUrl();
        $url->addPath('OS-KSADM')
            ->addPath('credentials')
            ->addPath('RAX-KSKEY:apiKeyCredentials')
            ->addPath('RAX-AUTH')
            ->addPath('reset');

        $response = $this->getClient()->post($url)->send();

        if ($body = Formatter::decode($response)) {
            return isset($body->{'RAX-KSKEY:apiKeyCredentials'}->apiKey)
                ? $body->{'RAX-KSKEY:apiKeyCredentials'}->apiKey
                : null;
        }
    }

    /**
     * Add a role, specified by its ID, to a user.
     *
     * @param $roleId
     * @return \Guzzle\Http\Message\Response
     */
    public function addRole($roleId)
    {
        $url = $this->getUrl();
        $url->addPath('roles')->addPath('OS-KSADM')->addPath($roleId);

        return $this->getClient()->put($url)->send();
    }

    /**
     * Remove a role, specified by its ID, from a user.
     *
     * @param $roleId
     * @return \Guzzle\Http\Message\Response
     */
    public function removeRole($roleId)
    {
        $url = $this->getUrl();
        $url->addPath('roles')->addPath('OS-KSADM')->addPath($roleId);

        return $this->getClient()->delete($url)->send();
    }

    /**
     * Get all the roles for which this user is associated with.
     *
     * @return \OpenCloud\Common\Collection\PaginatedIterator
     */
    public function getRoles()
    {
        $url = $this->getUrl();
        $url->addPath('roles');

        return PaginatedIterator::factory($this, array(
            'baseUrl'        => $url,
            'resourceClass'  => 'Role',
            'key.collection' => 'roles',
            'key.links'      => 'roles_links'
        ));
    }

    public function update($params = array())
    {
        if (!empty($params)) {
            $this->populate($params);
        }

        $json = json_encode($this->updateJson($params));
        $this->checkJsonError();

        return $this->getClient()->post($this->getUrl(), self::getJsonHeader(), $json)->send();
    }

}