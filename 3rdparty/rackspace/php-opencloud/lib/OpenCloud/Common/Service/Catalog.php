<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Service;

use OpenCloud\Common\Exceptions\InvalidArgumentError;

/**
 * This object represents the service catalog returned by the Rackspace API. It contains all the services available
 * to the end-user, including specific information for each service.
 */
class Catalog
{
    /**
     * @var array Service items
     */
    private $items = array();

    /**
     * Produces a Catalog from a mixed input.
     *
     * @param  $config
     * @return Catalog
     * @throws \OpenCloud\Common\Exceptions\InvalidArgumentError
     */
    public static function factory($config)
    {
        if (is_array($config)) {
            $catalog = new self();
            foreach ($config as $item) {
                $catalog->items[] = CatalogItem::factory($item);
            }
        } elseif ($config instanceof Catalog) {
            $catalog = $config;
        } else {
            throw new InvalidArgumentError(sprintf(
                'Argument for Catalog::factory must be either an array or an '
                . 'instance of %s. You passed in: %s',
                get_class(),
                print_r($config, true)
            ));
        }
        
        return $catalog;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}