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
 * The "consumerresources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $consumerresources = $apigeeService->consumerresources;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsConsumerresources extends Google_Service_Resource
{
  /**
   * List all API docs in a ZMS zone that match the given query. Not a recognized
   * rest pattern (consumerresources.apis)
   *
   * @param string $parent Required. Must be of the form
   * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string q
   * @opt_param string zmsId
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceCollection
   */
  public function apis($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('apis', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceCollection");
  }
  /**
   * Get all consumer resource types managed by this API.
   * (consumerresources.getResourcetypes)
   *
   * @param string $parent Required. Must be of the form
   * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceTypeCollection
   */
  public function getResourcetypes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getResourcetypes', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceTypeCollection");
  }
  /**
   * List all pages in a ZMS zone that match the query string. Not a recognized
   * rest pattern (consumerresources.pages)
   *
   * @param string $parent Required. Must be of the form
   * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string zmsId
   * @opt_param string q
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceCollection
   */
  public function pages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('pages', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PortalResourceCollection");
  }
}
