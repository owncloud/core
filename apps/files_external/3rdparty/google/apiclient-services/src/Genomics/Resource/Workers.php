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

namespace Google\Service\Genomics\Resource;

use Google\Service\Genomics\CheckInRequest;
use Google\Service\Genomics\CheckInResponse;

/**
 * The "workers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google\Service\Genomics(...);
 *   $workers = $genomicsService->workers;
 *  </code>
 */
class Workers extends \Google\Service\Resource
{
  /**
   * The worker uses this method to retrieve the assigned operation and provide
   * periodic status updates. (workers.checkIn)
   *
   * @param string $id The VM identity token for authenticating the VM instance.
   * https://cloud.google.com/compute/docs/instances/verifying-instance-identity
   * @param CheckInRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CheckInResponse
   */
  public function checkIn($id, CheckInRequest $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkIn', [$params], CheckInResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Workers::class, 'Google_Service_Genomics_Resource_Workers');
