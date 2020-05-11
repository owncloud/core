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

/**
 * The "licenseCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $licenseCodes = $computeService->licenseCodes;
 *  </code>
 */
class Google_Service_Compute_Resource_LicenseCodes extends Google_Service_Resource
{
  /**
   * Return a specified license code. License codes are mirrored across all
   * projects that have permissions to read the License Code.  Caution This
   * resource is intended for use only by third-party partners who are creating
   * Cloud Marketplace images. (licenseCodes.get)
   *
   * @param string $project Project ID for this request.
   * @param string $licenseCode Number corresponding to the License code resource
   * to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_LicenseCode
   */
  public function get($project, $licenseCode, $optParams = array())
  {
    $params = array('project' => $project, 'licenseCode' => $licenseCode);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_LicenseCode");
  }
  /**
   * Returns permissions that a caller has on the specified resource.  Caution
   * This resource is intended for use only by third-party partners who are
   * creating Cloud Marketplace images. (licenseCodes.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, Google_Service_Compute_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Compute_TestPermissionsResponse");
  }
}
