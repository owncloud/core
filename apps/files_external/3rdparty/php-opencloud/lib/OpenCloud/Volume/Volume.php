<?php
/**
 * Defines a block storage volume
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Volume;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * The Volume class represents a single block storage volume
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
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

    private $_create_keys = array(
        'snapshot_id',
        'display_name',
        'display_description',
        'size',
        'volume_type',
        'availability_zone'
    );

    /**
     * Always throws an error; updates are not permitted
     *
     * @throws OpenCloud\UpdateError always
     */
    public function Update($params = array()) 
    {
        throw new Exceptions\UpdateError(
            Lang::translate('Block storage volumes cannot be updated')
        );
    }

    /**
     * returns the name of the volume
     *
     * @api
     * @return string
     */
    public function Name() 
    {
        return $this->display_name;
    }

    /********** PROTECTED METHODS **********/

    /**
     * Creates the JSON object for the Create() method
     *
     * @return stdClass
     */
    protected function CreateJson() 
    {
        $element = $this->JsonName();
        $object = new \stdClass();
        $object->$element = new \stdClass();

        foreach ($this->_create_keys as $name) {
            if ($this->$name) {
                switch($name) {
                    case 'volume_type':
                        $object->$element->$name = $this->volume_type->Name();
                        break;
                    default:
                        $object->$element->$name = $this->$name;
                        break;
                }
            }
        }

        if (is_array($this->metadata) && count($this->metadata)) {
            $object->$element->metadata = new \stdClass();
            foreach($this->metadata as $key => $value) {
                $object->$element->metadata->$key = $value;
            }
        }

        return $object;
    }

}
