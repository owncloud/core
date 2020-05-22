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
 * The "file" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $file = $apigeeService->file;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesApigeeFile extends Google_Service_Resource
{
  /**
   * Deletes a file from the portal. (file.delete)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1FilenamePayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function delete($parent, Google_Service_Apigee_GoogleCloudApigeeV1FilenamePayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Uploads a file to the portal. (file.post)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1File
   */
  public function post($parent, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('post', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1File");
  }
}
