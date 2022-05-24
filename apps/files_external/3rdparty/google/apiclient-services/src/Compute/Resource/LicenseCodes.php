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

namespace Google\Service\Compute\Resource;

use Google\Service\Compute\LicenseCode;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "licenseCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $licenseCodes = $computeService->licenseCodes;
 *  </code>
 */
class LicenseCodes extends \Google\Service\Resource
{
  /**
   * Return a specified license code. License codes are mirrored across all
   * projects that have permissions to read the License Code. *Caution* This
   * resource is intended for use only by third-party partners who are creating
   * Cloud Marketplace images.  (licenseCodes.get)
   *
   * @param string $project Project ID for this request.
   * @param string $licenseCode Number corresponding to the License code resource
   * to return.
   * @param array $optParams Optional parameters.
   * @return LicenseCode
   */
  public function get($project, $licenseCode, $optParams = [])
  {
    $params = ['project' => $project, 'licenseCode' => $licenseCode];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], LicenseCode::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. *Caution*
   * This resource is intended for use only by third-party partners who are
   * creating Cloud Marketplace images.  (licenseCodes.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LicenseCodes::class, 'Google_Service_Compute_Resource_LicenseCodes');
