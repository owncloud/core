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
 * Enumerated constants used in CloudFiles for URL types.
 */
class UrlType
{
    const CDN = 'CDN';
    const SSL = 'SSL';
    const STREAMING = 'Streaming';
    const IOS_STREAMING = 'IOS-Streaming';
    
    const TAR = 'tar';
    const TAR_GZ = 'tar.gz';
    const TAR_BZ2 = 'tar.bz2';
}