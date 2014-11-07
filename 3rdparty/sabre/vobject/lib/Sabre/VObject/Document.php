<?php

namespace Sabre\VObject;

/**
 * Document
 *
 * A document is just like a component, except that it's also the top level
 * element.
 *
 * Both a VCALENDAR and a VCARD are considered documents.
 *
 * This class also provides a registry for document types.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH. All rights reserved.
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Document extends Component {

    /**
     * The default name for this component.
     *
     * This should be 'VCALENDAR' or 'VCARD'.
     *
     * @var string
     */
    static $defaultName;

    /**
     * Creates a new document.
     *
     * We're changing the default behavior slightly here. First, we don't want
     * to have to specify a name (we already know it), and we want to allow
     * children to be specified in the first argument.
     *
     * But, the default behavior also works.
     *
     * So the two sigs:
     *
     * new Document(array $children = array());
     * new Document(string $name, array $children = array())
     *
     * @return void
     */
    public function __construct() {

        $args = func_get_args();
        if (count($args)===0 || is_array($args[0])) {
            array_unshift($args, static::$defaultName);
            call_user_func_array(array('parent', '__construct'), $args);
        } else {
            call_user_func_array(array('parent', '__construct'), $args);
        }

    }

    /**
     * Creates a new component
     *
     * This method automatically searches for the correct component class, based
     * on its name.
     *
     * You can specify the children either in key=>value syntax, in which case
     * properties will automatically be created, or you can just pass a list of
     * Component and Property object.
     *
     * @param string $name
     * @param array $children
     * @return Component
     */
    public function createComponent($name, array $children = array()) {

        $component = Component::create($name);
        foreach($children as $k=>$v) {

            if ($v instanceof Node) {
                $component->add($v);
            } else {
                $component->add($k, $v);
            }

        }
        return $component;

    }

    /**
     * Factory method for creating new properties
     *
     * This method automatically searches for the correct property class, based
     * on its name.
     *
     * You can specify the parameters either in key=>value syntax, in which case
     * parameters will automatically be created, or you can just pass a list of
     * Parameter objects.
     *
     * @param string $name
     * @param mixed $value
     * @param array $parameters
     * @return Property
     */
    public function createProperty($name, $value = null, array $parameters = array()) {

        return Property::create($name, $value, $parameters);

    }

}
