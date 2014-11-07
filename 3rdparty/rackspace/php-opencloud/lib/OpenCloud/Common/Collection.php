<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common;

/**
 * @deprecated
 * @codeCoverageIgnore
 */
class Collection extends Base
{

    private $service;
    private $itemClass;
    private $itemList = array();
    private $pointer = 0;
    private $sortKey;
    private $nextPageClass;
    private $nextPageCallback;
    private $nextPageUrl;

    /**
     * A Collection is an array of objects
     *
     * Some assumptions:
     * * The `Collection` class assumes that there exists on its service
     *   a factory method with the same name of the class. For example, if
     *   you create a Collection of class `Foobar`, it will attempt to call
     *   the method `parent::Foobar()` to create instances of that class.
     * * It assumes that the factory method can take an array of values, and
     *   it passes that to the method.
     *
     * @param Service $service - the service associated with the collection
     * @param string $itemclass - the Class of each item in the collection
     *      (assumed to be the name of the factory method)
     * @param array $arr - the input array
     */
    public function __construct($service, $class, array $array = array())
    {
        $service->getLogger()->deprecated(__METHOD__, 'OpenCloud\Common\Collection\CollectionBuilder');

        $this->setService($service);

        $this->setNextPageClass($class);

        // If they've supplied a FQCN, only get the last part
        $class = (false !== ($classNamePos = strrpos($class, '\\')))
            ? substr($class, $classNamePos + 1)
            : $class;

        $this->setItemClass($class);

        // Set data
        $this->setItemList($array);
    }

    /**
     * Set the entire data array.
     *
     * @param array $array
     */
    private function setItemList(array $array)
    {
        $this->itemList = $array;
        return $this;
    }

    /**
     * Retrieve the entire data array.
     *
     * @return array
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    /**
     * Set the service.
     *
     * @param Service|PersistentObject $service
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * Retrieves the service associated with the Collection
     *
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the resource class name.
     */
    private function setItemClass($itemClass)
    {
        $this->itemClass = $itemClass;
        return $this;
    }

    /**
     * Get item class.
     */
    private function getItemClass()
    {
        return $this->itemClass;
    }

    /**
     * Set the key that will be used for sorting.
     */
    private function setSortKey($sortKey)
    {
        $this->sortKey = $sortKey;
        return $this;
    }

    /**
     * Get the key that will be used for sorting.
     */
    private function getSortKey()
    {
        return $this->sortKey;
    }

    /**
     * Set next page class.
     */
    private function setNextPageClass($nextPageClass)
    {
        $this->nextPageClass = $nextPageClass;
        return $this;
    }

    /**
     * Get next page class.
     */
    private function getNextPageClass()
    {
        return $this->nextPageClass;
    }

    /**
     * for paginated collection, sets the callback function and URL for
     * the next page
     *
     * The callback function should have the signature:
     *
     *      function Whatever($class, $url, $parent)
     *
     * and the `$url` should be the URL of the next page of results
     *
     * @param callable $callback the name of the function (or array of
     *      object, function name)
     * @param string $url the URL of the next page of results
     * @return void
     */
    public function setNextPageCallback($callback, $url)
    {
        $this->nextPageCallback = $callback;
        $this->nextPageUrl = $url;
        return $this;
    }

    /**
     * Get next page callback.
     */
    private function getNextPageCallback()
    {
        return $this->nextPageCallback;
    }

    /**
     * Get next page URL.
     */
    private function getNextPageUrl()
    {
        return $this->nextPageUrl;
    }

    /**
     * Returns the number of items in the collection
     *
     * For most services, this is the total number of items. If the Collection
     * is paginated, however, this only returns the count of items in the
     * current page of data.
     *
     * @return int
     */
    public function count()
    {
        return count($this->getItemList());
    }

    /**
     * Pseudonym for count()
     *
     * @codeCoverageIgnore
     */
    public function size()
    {
        return $this->count();
    }

    /**
     * Resets the pointer to the beginning, but does NOT return the first item
     *
     * @api
     * @return void
     */
    public function reset()
    {
        $this->pointer = 0;
    }

    /**
     * Resets the collection pointer back to the first item in the page
     * and returns it
     *
     * This is useful if you're only interested in the first item in the page.
     *
     * @api
     * @return Base the first item in the set
     */
    public function first()
    {
        $this->reset();
        return $this->next();
    }

    /**
     * Return the item at a particular point of the array.
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function getItem($pointer)
    {
        return (isset($this->itemList[$pointer])) ? $this->itemList[$pointer] : false;
    }

    /**
     * Add an item to this collection
     *
     * @param mixed $item
     */
    public function addItem($item)
    {
        $this->itemList[] = $item;
    }

    /**
     * Returns the next item in the page
     *
     * @api
     * @return Base the next item or FALSE if at the end of the page
     */
    public function next()
    {
        if ($this->pointer >= $this->count()) {
            return false;
        }

        $data  = $this->getItem($this->pointer++);
        $class = $this->getItemClass();

        // Are there specific methods in the parent/service that can be used to
        // instantiate the resource? Currently supported: getResource(), resource()
        foreach (array($class, 'get' . ucfirst($class)) as $method) {
            if (method_exists($this->service, $method)) {
                return call_user_func(array($this->service, $method), $data);
            }
        }

        // Backup method
        if (method_exists($this->service, 'resource')) {
            return $this->service->resource($class, $data);
        }

        return false;
    }

    /**
     * sorts the collection on a specified key
     *
     * Note: only top-level keys can be used as the sort key. Note that this
     * only sorts the data in the current page of the Collection (for
     * multi-page data).
     *
     * @api
     * @param string $keyname the name of the field to use as the sort key
     * @return void
     */
    public function sort($keyname = 'id')
    {
        $this->setSortKey($keyname);
        usort($this->itemList, array($this, 'sortCompare'));
    }

    /**
     * selects only specified items from the Collection
     *
     * This provides a simple form of filtering on Collections. For each item
     * in the collection, it calls the callback function, passing it the item.
     * If the callback returns `TRUE`, then the item is retained; if it returns
     * `FALSE`, then the item is deleted from the collection.
     *
     * Note that this should not supersede server-side filtering; the
     * `Collection::Select()` method requires that *all* of the data for the
     * Collection be retrieved from the server before the filtering is
     * performed; this can be very inefficient, especially for large data
     * sets. This method is mostly useful on smaller-sized sets.
     *
     * Example:
     * <code>
     * $services = $connection->ServiceList();
     * $services->Select(function($item){ return $item->region=='ORD';});
     * // now the $services Collection only has items from the ORD region
     * </code>
     *
     * `Select()` is *destructive*; that is, it actually removes entries from
     * the collection. For example, if you use `Select()` to find items with
     * the ID > 10, then use it again to find items that are <= 10, it will
     * return an empty list.
     *
     * @api
     * @param callable $testfunc a callback function that is passed each item
     *      in turn. Note that `Select()` performs an explicit test for
     *      `FALSE`, so functions like `strpos()` need to be cast into a
     *      boolean value (and not just return the integer).
     * @returns void
     * @throws DomainError if callback doesn't return a boolean value
     */
    public function select($testfunc)
    {
        foreach ($this->getItemList() as $index => $item) {
            $test = call_user_func($testfunc, $item);
            if (!is_bool($test)) {
                throw new Exceptions\DomainError(
                    Lang::translate('Callback function for Collection::Select() did not return boolean')
                );
            }
            if ($test === false) {
                unset($this->itemList[$index]);
            }
        }
    }

    /**
     * returns the Collection object for the next page of results, or
     * FALSE if there are no more pages
     *
     * Generally, the structure for a multi-page collection will look like
     * this:
     *
     *      $coll = $obj->Collection();
     *      do {
     *          while($item = $coll->Next()) {
     *              // do something with the item
     *          }
     *      } while ($coll = $coll->NextPage());
     *
     * @api
     * @return Collection if there are more pages of results, otherwise FALSE
     */
    public function nextPage()
    {
        return ($this->getNextPageUrl() !== null)
            ? call_user_func($this->getNextPageCallback(), $this->getNextPageClass(), $this->getNextPageUrl())
            : false;
    }

    /**
     * Compares two values of sort keys
     */
    private function sortCompare($a, $b)
    {
        $key = $this->getSortKey();

        // Handle strings
        if (is_string($a->$key)) {
            return strcmp($a->$key, $b->$key);
        }

        // Handle others with logical comparisons
        if ($a->$key == $b->$key) {
            return 0;
        } elseif ($a->$key < $b->$key) {
            return -1;
        } else {
            return 1;
        }
    }

}