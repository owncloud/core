<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\PolicyTroubleshooter\Resource;

use Google\Service\PolicyTroubleshooter\GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyRequest;
use Google\Service\PolicyTroubleshooter\GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse;

/**
 * The "iam" collection of methods.
 * Typical usage is:
 *  <code>
 *   $policytroubleshooterService = new Google\Service\PolicyTroubleshooter(...);
 *   $iam = $policytroubleshooterService->iam;
 *  </code>
 */
class Iam extends \Google\Service\Resource
{
  /**
   * Checks whether a member has a specific permission for a specific resource,
   * and explains why the member does or does not have that permission.
   * (iam.troubleshoot)
   *
   * @param GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse
   */
  public function troubleshoot(GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('troubleshoot', [$params], GoogleCloudPolicytroubleshooterV1TroubleshootIamPolicyResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Iam::class, 'Google_Service_PolicyTroubleshooter_Resource_Iam');
