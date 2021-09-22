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

namespace Google\Service\MyBusinessVerifications\Resource;

use Google\Service\MyBusinessVerifications\CompleteVerificationRequest;
use Google\Service\MyBusinessVerifications\CompleteVerificationResponse;
use Google\Service\MyBusinessVerifications\ListVerificationsResponse;

/**
 * The "verifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessverificationsService = new Google\Service\MyBusinessVerifications(...);
 *   $verifications = $mybusinessverificationsService->verifications;
 *  </code>
 */
class LocationsVerifications extends \Google\Service\Resource
{
  /**
   * Completes a `PENDING` verification. It is only necessary for non `AUTO`
   * verification methods. `AUTO` verification request is instantly `VERIFIED`
   * upon creation. (verifications.complete)
   *
   * @param string $name Required. Resource name of the verification to complete.
   * @param CompleteVerificationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CompleteVerificationResponse
   */
  public function complete($name, CompleteVerificationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('complete', [$params], CompleteVerificationResponse::class);
  }
  /**
   * List verifications of a location, ordered by create time.
   * (verifications.listLocationsVerifications)
   *
   * @param string $parent Required. Resource name of the location that
   * verification requests belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize How many verification to include per page. Minimum is
   * 1, and the default and maximum page size is 100.
   * @opt_param string pageToken If specified, returns the next page of
   * verifications.
   * @return ListVerificationsResponse
   */
  public function listLocationsVerifications($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVerificationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsVerifications::class, 'Google_Service_MyBusinessVerifications_Resource_LocationsVerifications');
