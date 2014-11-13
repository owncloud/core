<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Volume\Resource;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * The VolumeType class represents a single block storage volume type
 */
class VolumeType extends PersistentObject 
{

    public $id;
    public $name;
    public $extra_specs;

    protected static $json_name = 'volume_type';
    protected static $url_resource = 'types';

    /**
     * Creates are not permitted
     *
     * @throws OpenCloud\CreateError always
     */
    public function Create($params = array()) 
    {
        throw new Exceptions\CreateError(
            Lang::translate('VolumeType cannot be created')
        );
    }

    /**
     * updates are not permitted
     *
     * @throws OpenCloud\UpdateError always
     */
    public function Update($params = array()) 
    {
        throw new Exceptions\UpdateError(
            Lang::translate('VolumeType cannot be updated')
        );
    }

    /**
     * deletes are not permitted
     *
     * @throws OpenCloud\DeleteError
     */
    public function Delete() 
    {
        throw new Exceptions\DeleteError(
            Lang::translate('VolumeType cannot be deleted')
        );
    }

}
