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
 * The "caches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $caches = $apigeeService->caches;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsCaches extends Google_Service_Resource
{
  /**
   * Deletes a cache. (caches.delete)
   *
   * @param string $name Required. Cache resource name of the form:     `organizat
   * ions/{organization_id}/environments/{environment_id}/caches/{cache_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
  /**
   * Lists all caches in an environment.
   * (caches.listOrganizationsEnvironmentsCaches)
   *
   * @param string $parent Required. The name of the parent environment under
   * which to get caches. Must be of the form:
   * `organizations/{organization_id}/environments/{environment_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironmentsCaches($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
}
