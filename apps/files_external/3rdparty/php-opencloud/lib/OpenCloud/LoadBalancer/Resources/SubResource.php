<?php

namespace OpenCloud\LoadBalancer\Resources;

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
    
    private $parent;    // holds the parent load balancer

    /**
     * constructs the SubResource's object
     *
     * @param mixed $obj the parent object
     * @param mixed $value the ID or array of values for the object
     */
    public function __construct($object, $value = null) 
    {
        $this->parent = $object;

        parent::__construct($object->Service(), $value);

        /**
         * Note that, since these sub-resources do not have an ID, we must
         * fake out the `Refresh` method.
         */
        if (isset($this->id)) {
            $this->Refresh();
        } else {
            $this->Refresh('<no-id>');
        }
    }

    /**
     * returns the URL of the SubResource
     *
     * @api
     * @param string $subresource the subresource of the parent
     * @param array $qstr an array of key/value pairs to be converted to
     *  query string parameters for the subresource
     * @return string
     */
    public function Url($subresource = null, $qstr = array()) 
    {
        return $this->Parent()->Url($this->ResourceName());
    }

    /**
     * returns the JSON document's object for creating the subresource
     *
     * The value `$_create_keys` should be an array of names of data items
     * that can be used in the creation of the object.
     *
     * @return \stdClass;
     */
    protected function CreateJson() 
    {
        $object = new \stdClass();
        $top = $this->JsonName();
        if ($top) {
            $object->$top = new \stdClass();
            foreach ($this->_create_keys as $item) {
                $object->$top->$item = $this->$item;
            }
        } else {
            foreach ($this->_create_keys as $item) {
                $object->$item = $this->$item;
            }
        }
        return $object;
    }

    /**
     * returns the JSON for the update (same as create)
     *
     * For these subresources, the update JSON is the same as the Create JSON
     * @return \stdClass
     */
    protected function UpdateJson($params = array()) 
    {
        return $this->CreateJson();
    }

    /**
     * returns the Parent object (usually a LoadBalancer, but sometimes another
     * SubResource)
     *
     * @return mixed
     */
    public function Parent() 
    {
        return $this->parent;
    }

    /**
     * returns a (default) name of the object
     *
     * The name is constructed by the object class and the object's ID.
     *
     * @api
     * @return string
     */
    public function Name() 
    {
        return sprintf(
            Lang::translate('%s-%s'),
            get_class($this), 
            $this->Parent()->Id()
        );
    }
}
