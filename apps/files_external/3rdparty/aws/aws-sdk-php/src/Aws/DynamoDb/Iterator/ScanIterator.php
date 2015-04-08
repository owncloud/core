<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb\Iterator;

use Aws\Common\Iterator\AwsResourceIterator;
use Guzzle\Common\Version;
use Guzzle\Service\Resource\Model;

/**
 * Iterator for a DynamoDB Scan operation. Can also get the total scanned count
 *
 * @deprecated Getting the scanned count is possible using event listeners, so this class is not needed
 */
class ScanIterator extends AwsResourceIterator
{
    /**
     * @var int Total number of scanned items
     */
    protected $scannedCount = 0;

    /**
     * Get the total number of scanned items
     *
     * @return int
     */
    public function getScannedCount()
    {
        Version::warn('This method is deprecated and will be removed in a future version of the SDK. Getting the '
            . 'scanned count is possible using event listeners.');

        return $this->scannedCount;
    }

    /**
     * {@inheritdoc}
     */
    protected function handleResults(Model $result)
    {
        $this->scannedCount += (int) $result->get('ScannedCount');

        return parent::handleResults($result);
    }
}
