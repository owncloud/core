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
 * The "consumers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $consumers = $apigeeService->consumers;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsConsumers extends Google_Service_Resource
{
  /**
   * Checks whether a developer has access to a resource. (consumers.access)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your  request:   `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CheckAccessBody $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CheckAccessResponse
   */
  public function access($parent, Google_Service_Apigee_GoogleCloudApigeeV1CheckAccessBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('access', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CheckAccessResponse");
  }
  /**
   * Checks the status of this service. (consumers.status)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your  request:   `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CapiServerStatusResponse
   */
  public function status($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('status', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CapiServerStatusResponse");
  }
}
