<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Volume;

use OpenCloud\OpenStack;
use OpenCloud\Common\Service\NovaService;

class Service extends NovaService
{
    const DEFAULT_TYPE = 'volume';
    const DEFAULT_NAME = 'cloudBlockStorage';

	/**
	 * Returns a Volume object
	 *
	 * @api
	 * @param string $id the Volume ID
	 * @return Resource\Volume
	 */
	public function volume($id = null) 
	{
		return new Resource\Volume($this, $id);
	}

	/**
	 * Returns a Collection of Volume objects
	 *
	 * @api
	 * @param boolean $details if TRUE, return all details
	 * @param array $filter array of filter key/value pairs
	 * @return \OpenCloud\Common\Collection
	 */
	public function volumeList($details = true, $filter = array()) 
	{
		$url = clone $this->getUrl(Resource\Volume::ResourceName());
        if ($details) {
            $url->addPath('detail');
        }
		return $this->collection('OpenCloud\Volume\Resource\Volume', $url);
	}

	/**
	 * Returns a VolumeType object
	 *
	 * @api
	 * @param string $id the VolumeType ID
	 * @return Resource\Volume
	 */
	public function volumeType($id = null) 
	{
		return new Resource\VolumeType($this, $id);
	}

	/**
	 * Returns a Collection of VolumeType objects
	 *
	 * @api
	 * @param array $filter array of filter key/value pairs
	 * @return \OpenCloud\Common\Collection
	 */
	public function volumeTypeList($filter = array()) 
	{
		return $this->collection('\OpenCloud\Volume\Resource\VolumeType');
	}

	/**
	 * returns a Snapshot object associated with this volume
	 *
	 * @return Resource\Snapshot
	 */
	public function snapshot($id = null) 
	{
		return new Resource\Snapshot($this, $id);
	}

	/**
	 * Returns a Collection of Snapshot objects
	 *
	 * @api
	 * @param array $filter array of filter key/value pairs
	 * @return \OpenCloud\Common\Collection
	 */
	public function snapshotList($filter = array()) 
	{
		return $this->collection('OpenCloud\Volume\Resource\Snapshot');
	}

}
