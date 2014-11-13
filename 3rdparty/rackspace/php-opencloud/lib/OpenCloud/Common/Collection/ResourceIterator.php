<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Collection;

use Iterator;
use OpenCloud\Common\Log\Logger;
use OpenCloud\Common\Exceptions\InvalidArgumentError;

class ResourceIterator extends ArrayCollection implements Iterator
{
    /**
     * @var int Internal pointer of the iterator - reveals its current position.
     */
    protected $position;

    /**
     * @var object The parent object which resource models are instantiated from. The parent needs to have appropriate
     *             methods to instantiate the particular object.
     */
    protected $resourceParent;

    /**
     * @var array The options for this iterator.
     */
    protected $options;

    /**
     * @var array Fallback defaults if options are not explicitly set or provided.
     */
    protected $defaults = array('limit.total' => 1000);

    /**
     * @var array Required options
     */
    protected $required = array();

    public static function factory($parent, array $options = array(), array $data = array())
    {
        $iterator = new static($data);

        $iterator->setResourceParent($parent)
            ->setElements($data)
            ->setOptions($iterator->parseOptions($options))
            ->rewind();

        return $iterator;
    }

    protected function parseOptions(array $options)
    {
        $options = $options + $this->defaults;

        if ($missing = array_diff($this->required, array_keys($options))) {
            throw new InvalidArgumentError(sprintf('%s is a required option', implode(',', $missing)));
        }

        return $options;
    }

    /**
     * @param $parent
     * @return $this
     */
    public function setResourceParent($parent)
    {
        $this->resourceParent = $parent;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Set a particular option.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return null
     */
    public function getOption($key)
    {
        return (isset($this->options[$key])) ? $this->options[$key] : null;
    }

    /**
     * This method is called after self::rewind() and self::next() to check if the current position is valid.
     *
     * @return bool
     */
    public function valid()
    {
        return $this->offsetExists($this->position) && $this->position < $this->getOption('limit.total');
    }

    /**
     * Increment the current pointer by 1, and also update the current marker.
     */
    public function next()
    {
        $this->position++;
        return $this->current();
    }

    /**
     * Reset the pointer and current marker.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->constructResource($this->currentElement());
    }

    /**
     * @return mixed
     */
    public function currentElement()
    {
        return $this->offsetGet($this->key());
    }

    /**
     * Using a standard object, this method populates a resource model with all the object data. It does this using a
     * whatever method the parent object has for resource creation.
     *
     * @param $object Standard object
     * @return mixed
     * @throws \OpenCloud\Common\Exceptions\CollectionException
     */
    public function constructResource($object)
    {
        $className = $this->getOption('resourceClass');

        if (substr_count($className, '\\')) {
            $array = explode('\\', $className);
            $className = end($array);
        }

        $parent = $this->resourceParent;
        $getter = sprintf('get%s', ucfirst($className));

        if (method_exists($parent, $className)) {
            // $parent->server($data)
            return call_user_func(array($parent, $className), $object);
        } elseif (method_exists($parent, $getter)) {
            // $parent->getServer($data)
            return call_user_func(array($parent, $getter), $object);
        } elseif (method_exists($parent, 'resource')) {
            // $parent->resource('Server', $data)
            return $parent->resource($className, $object);
        } else {
            return $object;
        }
    }

    /**
     * Return the current position/internal pointer.
     *
     * @return int|mixed
     */
    public function key()
    {
        return $this->position;
    }

    public function getElement($offset)
    {
        return (!$this->offsetExists($offset)) ? false : $this->constructResource($this->offsetGet($offset));
    }

    /**
     * @deprecated
     */
    public function first()
    {
        Logger::newInstance()->deprecated(__METHOD__, 'getElement');
        return $this->getElement(0);
    }

    /**
     * @todo Implement
     */
    public function sort()
    {
    }

    public function search($callback)
    {
        $return = false;

        if (!is_callable($callback)) {
            throw new InvalidArgumentError('The provided argument must be a valid callback');
        }

        foreach ($this->elements as $element) {
            $resource = $this->constructResource($element);
            if (call_user_func($callback, $resource) === true) {
                $return = $resource;
                break;
            }
        }

        return $return;
    }

}