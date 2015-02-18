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

namespace Aws\Emr\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable ClusterStateChangeReasonCode values
 */
class ClusterStateChangeReasonCode extends Enum
{
    const INTERNAL_ERROR = 'INTERNAL_ERROR';
    const VALIDATION_ERROR = 'VALIDATION_ERROR';
    const INSTANCE_FAILURE = 'INSTANCE_FAILURE';
    const BOOTSTRAP_FAILURE = 'BOOTSTRAP_FAILURE';
    const USER_REQUEST = 'USER_REQUEST';
    const STEP_FAILURE = 'STEP_FAILURE';
    const ALL_STEPS_COMPLETED = 'ALL_STEPS_COMPLETED';
}
