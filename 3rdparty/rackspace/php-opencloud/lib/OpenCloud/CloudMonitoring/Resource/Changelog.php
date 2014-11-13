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
 * Changelog class.
 */
class Changelog extends ReadOnlyResource
{
    private $id;
    private $timestamp;
    private $entity_id;
    private $alarm_id;
    private $check_id;
    private $state;
    private $analyzed_by_monitoring_zone_id;
    
    protected static $json_name = 'changelogs/alarms';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'changelogs/alarms';
    
}