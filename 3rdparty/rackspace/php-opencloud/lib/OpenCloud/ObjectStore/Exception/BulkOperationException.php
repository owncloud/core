<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Exception;

class BulkOperationException extends \Exception
{
    public function __construct(array $errors)
    {
        $output = '';
        
        foreach ($errors as $error) {
            $output .= "$error[0]: $error[1]" . PHP_EOL;
        }
        
        parent::__construct(
            'These errors occurred while performing an archive upload: ' . $output
        );
    }
}