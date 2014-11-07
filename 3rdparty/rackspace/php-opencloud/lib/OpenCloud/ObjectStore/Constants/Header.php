<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Constants;

/**
 * Constants for different request and metadata headers.
 */
class Header 
{
    const OBJECT_COUNT = 'Object-Count';
    const BYTES_USED   = 'Bytes-Used';
    const ACCESS_LOGS  = 'Access-Log-Delivery';

    const TRANS_ID = 'Trans-Id';
    const ENABLED  = 'Enabled';
    const LOG_RETENTION = 'Log-Retention';
} 