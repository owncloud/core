<?php
/**
 * PHP OpenCloud library
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Identity\Resource;

use OpenCloud\Common\PersistentObject;

/**
 * Token class for token functionality.
 *
 * A token is an opaque string that represents an authorization to access cloud resources. Tokens may be revoked at any
 * time and are valid for a finite duration.
 *
 * @package OpenCloud\Identity\Resource
 */
class Token extends PersistentObject
{
    /** @var string The token ID */
    private $id;

    /** @var string Timestamp of when this token will expire */
    private $expires;

    protected static $url_resource = 'tokens';

    /**
     * @param $id Sets the ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string Returns the ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $expires Set the expiry timestamp
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    /**
     * @return string Get the expiry timestamp
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @return bool Check whether this token has expired (i.e. still valid or not)
     */
    public function hasExpired()
    {
        return time() >= strtotime($this->expires);
    }

}