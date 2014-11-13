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
 * Tenant class for tenant functionality.
 *
 * A tenant is a container used to group or isolate resources and/or identity objects. Depending on the service
 * operator, a tenant may map to a customer, account, organization, or project.
 *
 * @package OpenCloud\Identity\Resource
 */
class Tenant extends PersistentObject
{
    /** @var int The tenant ID */
    private $id;

    /** @var string The tenant name */
    private $name;

    /** @var string A description of the tenant */
    private $description;

    /** @var bool Whether this tenant is enabled or not (i.e. whether it can fulfil API operations) */
    private $enabled;

    protected static $url_resource = 'tenants';
    protected static $json_name    = 'tenants';

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
     * @param $name Sets the name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string Returns the name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $description Sets the description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string Returns the description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $enabled Enables/disables the tenant
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool Checks whether this tenant is enabled or not
     */
    public function isEnabled()
    {
        return $this->enabled === true;
    }

}