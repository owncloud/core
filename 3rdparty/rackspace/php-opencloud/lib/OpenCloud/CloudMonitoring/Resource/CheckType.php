<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * CheckType class.
 */
class CheckType extends ReadOnlyResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string The name of the supported check type.
     */
    private $type;

    /**
     * @var array Check type fields.
     */
    private $fields;

    /**
     * Platforms on which an agent check type is supported. This is advisory information only - the check may still work
     * on other platforms, or report that check execution failed at runtime.
     *
     * @var array
     */
    private $supported_platforms;

    protected static $json_name = false;
    protected static $url_resource = 'check_types';
    protected static $json_collection_name = 'values';

}