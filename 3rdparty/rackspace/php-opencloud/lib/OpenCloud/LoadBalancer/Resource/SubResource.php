<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright Copyright 2014 Rackspace US, Inc. See COPYING for licensing information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   1.6.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\LoadBalancer\Resource;

use Guzzle\Http\Exception\ClientErrorResponseException;
use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;

/**
 * SubResource is an abstract class that handles subresources of a
 * LoadBalancer object; for example, the
 * `/loadbalancers/{id}/errorpage`. Since most of the subresources are
 * handled in a similar manner, this consolidates the functions.
 *
 * There are really four pieces of data that define a subresource:
 * * `$url_resource` - the actual name of the url component
 * * `$json_name` - the name of the JSON object holding the data
 * * `$json_collection_name` - if the collection is not simply
 *   `$json_name . 's'`, this defines the collectio name.
 * * `$json_collection_element` - if the object in a collection is not
 *   anonymous, this defines the name of the element holding the object.
 * Of these, only the `$json_name` and `$url_resource` are required.
 */
abstract class SubResource extends PersistentObject 
{
    /**
     * This method needs attention.
     * 
     * @codeCoverageIgnore
     */
    public function initialRefresh()
    {
        if (isset($this->id)) {
            $this->refresh();
        } else {
            $entity = (method_exists($this->getParent(), 'url')) ? $this->getParent() : $this->getService();
            $this->refresh(null, $entity->url($this->resourceName()));
        }
    }

    /**
     * returns the JSON document's object for creating the subresource
     *
     * The value `$_create_keys` should be an array of names of data items
     * that can be used in the creation of the object.
     *
     * @return \stdClass;
     */
    protected function createJson()
    {
        $object = new \stdClass;

        foreach ($this->createKeys as $item) {
            $object->$item = $this->$item;
        }
        
        if ($top = $this->jsonName()) {
            $object = (object) array($top => $object);
        }
        
        return $object;
    }

    /**
     * returns the JSON for the update (same as create)
     *
     * For these subresources, the update JSON is the same as the Create JSON
     * @return \stdClass
     */
    protected function updateJson($params = array()) 
    {
        return $this->createJson();
    }

    /**
     * returns a (default) name of the object
     *
     * The name is constructed by the object class and the object's ID.
     *
     * @api
     * @return string
     */
    public function name() 
    {
        $classArray = explode('\\', get_class($this));
        return method_exists($this->getParent(), 'id') 
            ? sprintf('%s-%s', end($classArray), $this->getParent()->id())
            : parent::name();
    }

    public function refresh($id = null, $url = null)
    {
        try {
            return parent::refresh($id, $url);
        } catch (ClientErrorResponseException $e) {
            return false;
        }
    }

}