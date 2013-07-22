<?php
/**
 * Defines a DNS PTR record
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * PTR records are used for reverse DNS
 *
 * The PtrRecord object is nearly identical with the Record object. However,
 * the PtrRecord is a child of the service, and not a child of a Domain.
 *
 */
class PtrRecord extends Record 
{

    public $server;

    protected static $json_name = false;
    protected static $json_collection_name = 'records';
    protected static $url_resource = 'rdns';

    private $link_rel;
    private $link_href;

    /**
     * constructur ensures that the record type is PTR
     */
    public function __construct($parent, $info = null) 
    {
        $this->type = 'PTR';
        parent::__construct($parent, $info);
        if ($this->type != 'PTR') {
            throw new Exceptions\RecordTypeError(sprintf(
                Lang::translate('Invalid record type [%s], must be PTR'), 
                $this->type
            ));
        }
    }

    /**
     * specialized DNS PTR URL requires server service name and href
     */
    public function Url($subresource = null, $params = array()) 
    {
        if (isset($subresource)) {
            $url = $this->Parent()->Url($subresource, $params);
        } else {
            $url = $this->Parent()->Url(self::$url_resource, $params);
        }
        return $url;
    }

    /**
     * DNS PTR Create() method requires a server
     *
     * Generally called as `Create(array('server'=>$server))`
     */
    public function Create($param = array()) 
    {
        foreach($param as $key => $value) {
            $this->$key = $value;
        }
        $this->link_rel = $this->server->Service()->Name();
        $this->link_href = $this->server->Url();
        return parent::Create($param);
    }

    /**
     * DNS PTR Update() method requires a server
     */
    public function Update($param = array()) 
    {
        foreach($param as $key => $value) {
            $this->$key = $value;
        }
        $this->link_rel = $this->server->Service()->Name();
        $this->link_href = $this->server->Url();
        return parent::Update($param);
    }

    /**
     * DNS PTR Delete() method requires a server
     *
     * Note that delete will remove ALL PTR records associated with the device
     * unless you pass in the parameter ip={ip address}
     *
     */
    public function Delete() 
    {
        $this->link_rel = $this->server->Service()->Name();
        $this->link_href = $this->server->Url();

        $url = $this->Url('rdns/'.$this->link_rel, array('href'=>$this->link_href));

        if (isset($this->data)) {
            $url .= '&ip='.$this->data;
        }

        // perform the request
        $resp = $this->Service()->Request($url, 'DELETE');

        // return the AsyncResponse object
        return new AsyncResponse($this->Service(), $resp->HttpBody());
    }

    /**
     * Specialized JSON for DNS PTR creates and updates
     */
    protected function CreateJson() 
    {
        $object = new \stdClass;
        $object->recordsList = parent::CreateJson();

        // add links from server
        $object->link = new \stdClass;
        $object->link->href = $this->link_href;
        $object->link->rel  = $this->link_rel;
        return $object;
    }

    /**
     * The Update() JSON requires a record ID
     */
    protected function UpdateJson($params = array()) 
    {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
        $object = $this->CreateJson();
        $object->recordsList->records[0]->id = $this->id;
        return $object;
    }

}
