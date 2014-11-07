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
 * The Volume class represents a single block storage volume
 */
class Volume extends PersistentObject 
{

    public $id;
    public $status;
    public $display_name;
    public $display_description;
    public $size;
    public $volume_type;
    public $metadata = array();
    public $availability_zone;
    public $snapshot_id;
    public $attachments = array();
    public $created_at;
    
    protected static $json_name = 'volume';
    protected static $url_resource = 'volumes';

    protected $createKeys = array(
        'snapshot_id',
        'display_name',
        'display_description',
        'size',
        'volume_type',
        'availability_zone'
    );

    // Normally we'd populate a sibling object when this one refreshes
    // but there are times (i.e. during creation) when the NAME of the VolumeType
    // is returned, instead of its primary key...
    protected $associatedResources = array(
        //'volume_type' => 'VolumeType'
    );
    
    public function update($params = array()) 
    {
        throw new Exceptions\UpdateError(
            Lang::translate('Block storage volumes cannot be updated')
        );
    }

    public function name() 
    {
        return $this->display_name;
    }

    protected function createJson() 
    {
        $element = parent::createJson();

        if ($this->propertyExists('volume_type') 
            && $this->getProperty('volume_type') instanceof VolumeType
        ) {
            $element->volume->volume_type = $this->volume_type->name();
        }

        return $element;
    }

}
