<?php
/**
 * The OpenStack Cinder (Volume) service
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Volume;

use OpenCloud\OpenStack;
use OpenCloud\Common\Nova;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

class Service extends Nova 
{

	/**
	 * creates the VolumeService object
	 */
	public function __construct(
		OpenStack $connection, 
		$name, 
		$region, 
		$urltype
	) {
		parent::__construct($connection, 'volume', $name, $region, $urltype);
	}

	/**
	 * Returns a Volume object
	 *
	 * @api
	 * @param string $id the Volume ID
	 * @return VolumeService\Volume
	 */
	public function Volume($id = null) 
	{
		return new Volume($this, $id);
	}

	/**
	 * Returns a Collection of Volume objects
	 *
	 * @api
	 * @param boolean $details if TRUE, return all details
	 * @param array $filters array of filter key/value pairs
	 * @return Collection
	 */
	public function VolumeList($details = true, $filter = array()) 
	{
		$url = $this->Url(Volume::ResourceName()) . ($details ? '/detail' : '');
		return $this->Collection('\OpenCloud\Volume\Volume', $url);
	}

	/**
	 * Returns a VolumeType object
	 *
	 * @api
	 * @param string $id the VolumeType ID
	 * @return VolumeService\Volume
	 */
	public function VolumeType($id = null) 
	{
		return new VolumeType($this, $id);
	}

	/**
	 * Returns a Collection of VolumeType objects
	 *
	 * @api
	 * @param array $filters array of filter key/value pairs
	 * @return Collection
	 */
	public function VolumeTypeList($filter = array()) 
	{
		return $this->Collection('\OpenCloud\Volume\VolumeType');
	}

	/**
	 * returns a Snapshot object associated with this volume
	 *
	 * @return Snapshot
	 */
	public function Snapshot($id = null) 
	{
		return new Snapshot($this, $id);
	}

	/**
	 * Returns a Collection of Snapshot objects
	 *
	 * @api
	 * @param boolean $detail TRUE to return full details
	 * @param array $filters array of filter key/value pairs
	 * @return Collection
	 */
	public function SnapshotList($filter = array()) 
	{
		return $this->Collection('\OpenCloud\Volume\Snapshot');
	}

}
