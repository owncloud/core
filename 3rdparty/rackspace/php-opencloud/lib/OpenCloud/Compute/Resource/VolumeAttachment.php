<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Compute\Resource;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\PersistentObject;

/**
 * The VolumeAttachment class represents a volume that is attached to a server.
 */
class VolumeAttachment extends PersistentObject 
{

    public $id;
    public $device;
    public $serverId;
    public $volumeId;

    public static $json_name = 'volumeAttachment';
    public static $url_resource = 'os-volume_attachments';

    private $createKeys = array('volumeId', 'device');

    /**
     * updates are not permitted
     *
     * @throws OpenCloud\UpdateError always
     */
    public function update($params = array()) 
    {
        throw new Exceptions\UpdateError(Lang::translate('Updates are not permitted'));
    }

    /**
     * returns a readable name for the attachment
     *
     * Since there is no 'name' attribute, we'll hardcode something
     *
     * @api
     * @return string
     */
    public function name() 
    {
        return sprintf('Attachment [%s]', $this->volumeId ?: 'N/A');
    }

    /**
     * returns the JSON object for Create()
     *
     * @return stdClass
     */
    protected function createJson() 
    {
        $object = new \stdClass;
        
        foreach($this->createKeys as $key) {
            if (isset($this->$key)) {
                $object->$key = $this->$key;
            }
        }

        return (object) array(
            $this->jsonName() => $object
        );
    }

}
