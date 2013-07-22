<?php
/**
 * Defines an OpenStack Compute virtual server
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Compute;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Volume\Volume;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Lang;

/**
 * The Server class represents a single server node.
 *
 * A Server is always associated with a (Compute) Service. This implementation
 * supports extension attributes OS-DCF:diskConfig, RAX-SERVER:bandwidth,
 * rax-bandwidth:bandwith
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Server extends PersistentObject
{
    // Ideally these should have data types defined in docblocks

    public $status;             // Server status
    public $updated;            // date and time of last update
    public $hostId;             // the ID of the host holding the server instance
    public $addresses;          // an object holding the server's network addresses
    public $links;              // an object with server's permanent and bookmark links
    public $image;              // the object object of the server
    public $flavor;             // the flavor object of the server
    public $networks = array(); // array of attached networks
    public $id;                 // the server's ID
    public $user_id;            // the user ID that created the server
    public $name;               // the server's name
    public $created;            // date and time the server was created
    public $tenant_id;          // tenant/customer ID that created the server
    public $accessIPv4;         // the IPv4 access address
    public $accessIPv6;         // the IPv6 access address
    public $progress;           // build progress, from 0 (%) to 100 (%)
    public $adminPass;          // the root password returned from the Create() method
    public $metadata;           // a Metadata object associated with the server

    protected static $json_name = 'server';
    protected static $url_resource = 'servers';

    private $personality = array(); // uploaded file attachments
    private $imageRef;              // image reference (for create)
    private $flavorRef;             // flavor reference (for create)

    /**
     * Creates a new Server object and associates it with a Compute service
     *
     * @param mixed $info
     * * If NULL, an empty Server object is created
     * * If an object, then a Server object is created from the data in the
     *      object
     * * If a string, then it's treated as a Server ID and retrieved from the
     *      service
     * The normal use case for SDK clients is to treat it as either NULL or an
     *      ID. The object value parameter is a special case used to construct
     *      a Server object from a ServerList element to avoid a secondary
     *      call to the Service.
     * @throws ServerNotFound if a 404 is returned
     * @throws UnknownError if another error status is reported
     */
    public function __construct(Service $service, $info = null)
    {
        // make the service persistent
        parent::__construct($service, $info);

        // the metadata item is an object, not an array
        $this->metadata = $this->Metadata();
    }

    /**
     * Returns the primary external IP address of the server
     *
     * This function is based upon the accessIPv4 and accessIPv6 values.
     * By default, these are set to the public IP address of the server.
     * However, these values can be modified by the user; this might happen,
     * for example, if the server is behind a firewall and needs to be
     * routed through a NAT device to be reached.
     *
     * @api
     * @param integer $ip_type the type of IP version (4 or 6) to return
     * @return string IP address
     */
    public function ip($ip_type = RAXSDK_DEFAULT_IP_VERSION)
    {
        switch($ip_type) {
            case 4:
                return $this->accessIPv4;
            case 6:
                return $this->accessIPv6;
            default:
                throw new Exceptions\InvalidIpTypeError(Lang::translate('Invalid IP address type; must be 4 or 6'));
        }
    }

    /**
     * Creates a new server from the data existing in the object
     *
     * @api
     * @param array $params - an associative array of key/value pairs of
     *      attributes to set on the new server
     * @return HttpResponse - this will include the administrative password
     *      in the body
     * @throws \OpenCloud\HttpError
     * @throws ServerCreateError
     * @throws UnknownError
     */
    public function Create($params = array())
    {
        // reset values
        $this->id = null;
        $this->status = null;

        foreach($params as $key => $value) {
            $this->$key = $value;
        }

        $this->metadata->sdk = RAXSDK_USER_AGENT;
        $this->imageRef = $this->image->links[0]->href;
        $this->flavorRef = $this->flavor->links[0]->href;

        $this->debug(Lang::translate('Server::Create() [%s]'), $this->name);

        $create = $this->CreateJson();

        $response = $this->Service()->Request(
        	$this->Service()->Url(), 'POST', array(), $create);

        if (!is_object($response)) {
            throw new Exceptions\HttpError(
                Lang::translate('Invalid response for Server::Create() request')
            );
        }

        $json = $response->HttpBody();

        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\ServerCreateError(sprintf(
                Lang::translate('Problem creating server with [%s], status [%d] response [%s]'),
                $create,
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        } elseif (!$json) {
            throw new Exceptions\UnknownError(Lang::translate('Unexpected error in Server::Create()'));
        } else {
            $info = json_decode($json);
            if ($this->CheckJsonError()) {
                return false;
            }
            foreach($info->server as $item => $value) {
                $this->$item = $value;
            }
        }
        return $response;
    }

    /**
     * Rebuilds an existing server
     *
     * @api
     * @param array $params - an associative array of key/value pairs of
     *      attributes to set on the new server
     */
    public function Rebuild($params = array())
    {
    	if (!isset($params['adminPass']))
    		throw new Exceptions\RebuildError(
    			Lang::Translate('adminPass required when rebuilding server'));
    	if (!isset($params['image']))
    		throw new Exceptions\RebuildError(
    			Lang::Translate('image required when rebuilding server'));
    	$obj = new \stdClass();
    	$obj->rebuild = new \stdClass();
    	$obj->rebuild->imageRef = $params['image']->Id();
    	$obj->rebuild->adminPass = $params['adminPass'];
        return $this->Action($obj);
    }

    /**
     * Reboots a server
     *
     * You can pass the parameter RAXSDK_SOFT_REBOOT (default) or
     * RAXSDK_HARD_REBOOT to specify the type of reboot. A "soft" reboot
     * requests that the operating system reboot itself; a "hard" reboot
     * is the equivalent of pulling the power plug and then turning it back
     * on, with a possibility of data loss.
     *
     * @api
     * @param string $type - either 'soft' (the default) or 'hard' to
     *      indicate the type of reboot
     * @return boolean TRUE on success; FALSE on failure
     */
    public function Reboot($type = RAXSDK_SOFT_REBOOT)
    {
        // create object and json
        $obj = new \stdClass();
        $obj->reboot = new \stdClass();
        $obj->reboot->type = strtoupper($type);
        return $this->Action($obj);
    }

    /**
     * Creates a new image from a server
     *
     * @api
     * @param string $name The name of the new image
     * @param array $metadata Optional metadata to be stored on the image
     * @return boolean TRUE on success; FALSE on failure
     */
    public function CreateImage($name, $metadata = array())
    {
        if (!strlen($name)) {
            throw new Exceptions\ImageError(
            	Lang::translate('Image name is required to create an image'));
        }

        // construct a createImage object for jsonization
        $obj = new \stdClass();
        $obj->createImage = new \stdClass();
        $obj->createImage->name = $name;
        $obj->createImage->metadata = new \stdClass();

        foreach($metadata as $name => $value) {
            $obj->createImage->metadata->$name = $value;
        }

        $resp = $this->Action($obj);

        if ($resp === false) {
            return false;
        }

        if (!$location = $resp->Header('Location')) {
            return false;
        }

        return new Image($this->Service(), basename($location));
    }

    /**
     * Initiates the resize of a server
     *
     * @api
     * @param Flavor $flavorRef a Flavor object indicating the new server size
     * @return boolean TRUE on success; FALSE on failure
     */
    public function Resize(Flavor $flavorRef)
    {
        // construct a resize object for jsonization
        $obj = new \stdClass();
        $obj->resize = new \stdClass();
        $obj->resize->flavorRef = $flavorRef->id;
        return $this->Action($obj);
    }

    /**
     * confirms the resize of a server
     *
     * @api
     * @return boolean TRUE on success; FALSE on failure
     */
    public function ResizeConfirm()
    {
        $obj = new \stdClass();
        $obj->confirmResize = null;
        $res = $this->Action($obj);
        $this->Refresh($this->id);
        return $res;
    }

    /**
     * reverts the resize of a server
     *
     * @api
     * @return boolean TRUE on success; FALSE on failure
     */
    public function ResizeRevert()
    {
        $obj = new \stdClass();
        $obj->revertResize = null;
        return $this->Action($obj);
    }

    /**
     * Sets the root password on the server
     *
     * @api
     * @param string $newpasswd The new root password for the server
     * @return boolean TRUE on success; FALSE on failure
     */
    public function SetPassword($newpasswd)
    {
        // construct an object to hold the password
        $obj = new \stdClass();
        $obj->changePassword = new \stdClass();
        $obj->changePassword->adminPass = $newpasswd;
        return $this->Action($obj);
    }

    /**
     * Puts the server into *rescue* mode
     *
     * @api
     * @link http://docs.rackspace.com/servers/api/v2/cs-devguide/content/rescue_mode.html
     * @return string the root password of the rescue server
     * @throws ServerActionError if the server has no ID (i.e., has not
     *      been created yet)
     */
    public function Rescue()
    {
        $this->CheckExtension('os-rescue');

        if (!isset($this->id)) {
            throw new Exceptions\ServerActionError(Lang::translate('Server has no ID; cannot Rescue()'));
        }

        $obj = new \stdClass();
        $obj->rescue = "none";

        $resp = $this->Action($obj);
        $newobj = json_decode($resp->HttpBody());

        if ($this->CheckJsonError()) {
            return false;
        } elseif (!isset($newobj->adminPass)) {
            throw new Exceptions\ServerActionError(sprintf(
                Lang::translate('Rescue() method failed unexpectedly, status [%s] response [%s]'),
                $resp->HttpStatus(),
                $resp->HttpBody()
            ));
        } else {
            return $newobj->adminPass;
        }
    }

    /**
     * Takes the server out of *rescue* mode
     *
     * @api
     * @link http://docs.rackspace.com/servers/api/v2/cs-devguide/content/rescue_mode.html
     * @return HttpResponse
     * @throws ServerActionError if the server has no ID (i.e., has not
     *      been created yet)
     */
    public function Unrescue()
    {
        $this->CheckExtension('os-rescue');

        if (!isset($this->id)) {
            throw new Exceptions\ServerActionError(Lang::translate('Server has no ID; cannot Unescue()'));
        }

        $obj = new \stdClass();
        $obj->unrescue = NULL;

        return $this->Action($obj);
    }

    /**
     * Retrieves the metadata associated with a Server
     *
     * If a metadata item name is supplied, then only the single item is
     * returned. Otherwise, the default is to return all metadata associated
     * with a server.
     *
     * @api
     * @param string $key - the (optional) name of the metadata item to return
     * @return OpenCloud\Compute\Metadata object
     * @throws MetadataError
     */
    public function Metadata($key = null)
    {
        return new ServerMetadata($this, $key);
    }

    /**
     * Returns the IP address block for the Server or for a specific network
     *
     * @api
     * @param string $network - if supplied, then only the IP(s) for
     *      the specified network are returned. Otherwise, all IPs are returned.
     * @return object
     * @throws ServerIpsError
     */
    public function ips($network = null)
    {
        $url = Lang::noslash($this->Url('ips/'.$network));

        $response = $this->Service()->Request($url);

        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\ServerIpsError(sprintf(
                Lang::translate('Error in Server::ips(), status [%d], response [%s]'),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        $obj = json_decode($response->HttpBody());

        if ($this->CheckJsonError()) {
            return new \stdClass();
        } elseif (isset($obj->addresses)) {
            return $obj->addresses;
        } elseif (isset($obj->network)) {
            return $obj->network;
        } else {
            return new \stdClass();
        }
    }

    /**
     * Attaches a volume to a server
     *
     * Requires the os-volumes extension. This is a synonym for
     * `VolumeAttachment::Create()`
     *
     * @api
     * @param OpenCloud\VolumeService\Volume $vol the volume to attach. If
     *      `"auto"` is specified (the default), then the first available
     *      device is used to mount the volume (for example, if the primary
     *      disk is on `/dev/xvhda`, then the new volume would be attached
     *      to `/dev/xvhdb`).
     * @param string $device the device to which to attach it
     */
    public function AttachVolume(Volume $volume, $device = 'auto')
    {
        $this->CheckExtension('os-volumes');

        return $this->VolumeAttachment()->Create(array(
            'volumeId'  => $volume->id,
            'device'    => ($device=='auto' ? NULL : $device)
        ));
    }

    /**
     * removes a volume attachment from a server
     *
     * Requires the os-volumes extension. This is a synonym for
     * `VolumeAttachment::Delete()`
     *
     * @api
     * @param OpenCloud\VolumeService\Volume $vol the volume to remove
     * @throws VolumeError
     */
    public function DetachVolume(Volume $volume)
    {
        $this->CheckExtension('os-volumes');
        return $this->VolumeAttachment($volume->id)->Delete();
    }

    /**
     * returns a VolumeAttachment object
     *
     */
    public function VolumeAttachment($id = null)
    {
        return new VolumeAttachment($this, $id);
    }

    /**
     * returns a Collection of VolumeAttachment objects
     *
     * @api
     * @return Collection
     */
    public function VolumeAttachmentList()
    {
        return $this->Service()->Collection(
            '\OpenCloud\Compute\VolumeAttachment',
            NULL,
            $this
        );
    }

    /**
     * adds a "personality" file to be uploaded during Create() or Rebuild()
     *
     * The `$path` argument specifies where the file will be stored on the
     * target server; the `$data` is the actual data values to be stored.
     * To upload a local file, use `file_get_contents('name')` for the `$data`
     * value.
     *
     * @api
     * @param string $path the file path (up to 255 characters)
     * @param string $data the file contents (max size set by provider)
     * @return void
     * @throws PersonalityError if server already exists (has an ID)
     */
    public function AddFile($path, $data)
    {
        // set the value
        $this->personality[$path] = base64_encode($data);
    }

	/**
	 * returns a console connection
	 */
    public function Console($type='novnc') {
        $info = new \stdClass();
        $info->type = $type;
        $msg = new \stdClass();
        $action = strpos('spice', $type) !== false ? 'os-getSPICEConsole' : 'os-getVNCConsole';
        $msg->$action = $info;
        return json_decode($this->Action($msg)->HttpBody())->console;
    }


    /**
     * Creates the JSON for creating a new server
     *
     * @param string $element creates {server ...} by default, but can also
     *      create {rebuild ...} by changing this parameter
     * @return json
     */
    protected function CreateJson()
    {
        // create a blank object
        $obj = new \stdClass();

        // set a bunch of properties
        $obj->server = new \stdClass();

		$obj->server->imageRef = $this->imageRef;
		$obj->server->name = $this->name;
		$obj->server->flavorRef = $this->flavorRef;
		$obj->server->metadata = $this->metadata;
		if (is_array($this->networks) && count($this->networks)) {
			$obj->server->networks = array();
			foreach ($this->networks as $net) {
				if (get_class($net) != 'OpenCloud\Compute\Network') {
					throw new Exceptions\InvalidParameterError(sprintf(
						Lang::translate('"networks" parameter must be an '.
						'array of Compute\Network objects; [%s] found'),
						get_class($net)
					));
				}
				$netobj = new \stdClass();
				$netobj->uuid = $net->id;
				$obj->server->networks[] = $netobj;
			}
		}

        // handle personality files
        if (count($this->personality)) {
            $obj->server->personality = array();
            foreach ($this->personality as $path => $data) {
                $fileobj = new \stdClass();
                $fileobj->path = $path;
                $fileobj->contents = $data;
                $obj->server->personality[] = $fileobj;
            }
        }

        return json_encode($obj);
    }

    /**
     * creates the JSON for updating a server
     *
     * @return json
     */
    protected function UpdateJson($params = array())
    {
        $object = new \stdClass();
        $object->server = new \stdClass();
        foreach($params as $name => $value) {
            $object->server->$name = $this->$name;
        }
        return $object;
    }

}
