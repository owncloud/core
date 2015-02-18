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

namespace Aws\Kinesis\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable ShardIteratorType values
 */
class ShardIteratorType extends Enum
{
    const AT_SEQUENCE_NUMBER = 'AT_SEQUENCE_NUMBER';
    const AFTER_SEQUENCE_NUMBER = 'AFTER_SEQUENCE_NUMBER';
    const TRIM_HORIZON = 'TRIM_HORIZON';
    const LATEST = 'LATEST';
}
