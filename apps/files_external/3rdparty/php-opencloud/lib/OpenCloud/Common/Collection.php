<?php

namespace OpenCloud\Common;

/**
 * Provides an abstraction for working with ordered sets of objects
 *
 * Collection objects are used whenever there are multiples; for example,
 * multiple objects in a container, or multiple servers in a service.
 *
 * @since 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Collection extends Base 
{

    private $service;
    private $itemclass;
    private $itemlist = array();
    private $pointer = 0;
    private $sortkey;
    private $next_page_class;
    private $next_page_callback;
    private $next_page_url;

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
    public function __construct($service, $itemclass, $arr) 
    {

        $this->service = $service;

        $this->debug(
            'Collection:service=%s, class=%s, array=%s', 
            get_class($service), 
            $itemclass, 
            print_r($arr, TRUE)
        );

        $this->next_page_class = $itemclass;

        $p = strrpos($itemclass, '\\');

        if ($p !== FALSE) {
            $this->itemclass = substr($itemclass, $p+1);
        } else {
            $this->itemclass = $itemclass;
        }

        if (!is_array($arr)) {
            throw new Exceptions\CollectionError(
                Lang::translate('Cannot create a Collection without an array')
            );
        }

        // save the array of items
        $this->itemlist = $arr;
    }

    public function getItemList()
    {
        return $this->itemlist;
    }

    public function count()
    {
        return count($this->itemList);
    }

    /**
     * Retrieves the service associated with the Collection
     *
     * @return Service
     */
    public function Service() 
    {
        return $this->service;
    }

    /**
     * Resets the pointer to the beginning, but does NOT return the first item
     *
     * @api
     * @return void
     */
    public function Reset() 
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
    public function First() 
    {
        $this->Reset();
        return $this->Next();
    }

    /**
     * Returns the next item in the page
     *
     * @api
     * @return Base the next item or FALSE if at the end of the page
     */
    public function Next() 
    {
        if ($this->pointer >= count($this->itemlist)) {
            return false;
        }

        if (method_exists($this->Service(), $this->itemclass)) {
            return $this->Service()->{$this->itemclass}($this->itemlist[$this->pointer++]);
        } elseif (method_exists($this->Service(), 'resource')) {
            return $this->Service()->resource($this->itemclass, $this->itemlist[$this->pointer++]);
        }
    }

    /**
     * Returns the number of items in the page
     *
     * For most services, this is the total number of items. If the Collection
     * is paginated, however, this only returns the count of items in the
     * current page of data.
     *
     * @api
     * @return integer The number of items in the set
     */
    public function Size() 
    {
        return count($this->itemlist);
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
    public function Sort($keyname = 'id') 
    {
        $this->sortkey = $keyname;
        usort($this->itemlist, array($this, 'sortCompare'));
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
    public function Select($testfunc) 
    {
        foreach ($this->itemlist as $index => $item) {
            $test = call_user_func($testfunc, $item);
            if (!is_bool($test)) {
                throw new Exceptions\DomainError(
                    Lang::translate('Callback function for Collection::Select() did not return boolean')
                );
            }
            if ($test === false) {
                unset($this->itemlist[$index]);
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
     *          |
     *      } while ($coll = $coll->NextPage());
     *
     * @api
     * @return Collection if there are more pages of results, otherwise FALSE
     */
    public function NextPage() 
    {
        if (isset($this->next_page_url)) {
            return call_user_func(
                $this->next_page_callback,
                $this->next_page_class,
                $this->next_page_url);
        }
        return false;
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
    public function SetNextPageCallback($callback, $url) 
    {
        $this->next_page_callback = $callback;
        $this->next_page_url = $url;
    }

    public function getAllItems()
    {
        $items = array();
        foreach ($this->itemlist as $item) {
            $items[] = $this->Service()->{$this->itemclass}($item);
        }
        return $items;
    }

    /********** PRIVATE METHODS **********/

    /**
     * Compares two values of sort keys
     */
    private function sortCompare($a, $b) 
    {
        $key = $this->sortkey;

        // handle strings with strcmp()
        if (is_string($a->$key)) {
            return strcmp($a->$key, $b->$key);
        }

        // handle others with logical comparisons
        if ($a->$key == $b->$key) {
            return 0;
        }

        if ($a->$key < $b->$key) {
            return -1;
        } else {
            return 1;
        }
    }

}
