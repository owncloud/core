<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\DNS\Resource;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * PTR records are used for reverse DNS
 *
 * The PtrRecord object is nearly identical with the Record object. However,
 * the PtrRecord is a child of the service, and not a child of a Domain.
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
     * DNS PTR Create() method requires a server
     *
     * Generally called as `Create(array('server'=>$server))`
     */
    public function create($params = array()) 
    {
        $this->populate($params);
        $this->link_rel = $this->server->getService()->name();
        $this->link_href = $this->server->url();
        return parent::create();
    }

    /**
     * DNS PTR Update() method requires a server
     */
    public function update($params = array()) 
    {
        $this->populate($params);
        $this->link_rel = $this->server->getService()->Name();
        $this->link_href = $this->server->Url();
        return parent::update();
    }

    /**
     * DNS PTR Delete() method requires a server
     *
     * Note that delete will remove ALL PTR records associated with the device
     * unless you pass in the parameter ip={ip address}
     *
     */
    public function delete() 
    {
        $this->link_rel = $this->server->getService()->Name();
        $this->link_href = $this->server->Url();
        
        $params = array('href' => $this->link_href);
        if (!empty($this->data)) {
            $params['ip'] = $this->data;
        }
        
        $url = clone $this->getUrl();
        $url->addPath('rdns')
            ->addPath($this->link_rel)
            ->setQuery($params);

        $response = $this->getClient()->delete($url)->send();
        return new AsyncResponse($this->getService(), Formatter::decode($response));
    }

    /**
     * Specialized JSON for DNS PTR creates and updates
     */
    protected function createJson() 
    {
        return (object) array(
            'recordsList' => parent::createJson(),
            'link' => array(
                'href' => $this->link_href,
                'rel'  => $this->link_rel
            )
        );
    }

    /**
     * The Update() JSON requires a record ID
     */
    protected function updateJson($params = array()) 
    {
        $this->populate($params);
        $object = $this->createJson();
        $object->recordsList->records[0]->id = $this->id;
        return $object;
    }

}
