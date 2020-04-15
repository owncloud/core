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
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $prod_tt_sasportalService = new Google_Service_SASPortalTesting(...);
 *   $policies = $prod_tt_sasportalService->policies;
 *  </code>
 */
class Google_Service_SASPortalTesting_Resource_Policies extends Google_Service_Resource
{
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (policies.get)
   *
   * @param Google_Service_SASPortalTesting_SasPortalGetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalPolicy
   */
  public function get(Google_Service_SASPortalTesting_SasPortalGetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SASPortalTesting_SasPortalPolicy");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (policies.set)
   *
   * @param Google_Service_SASPortalTesting_SasPortalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalPolicy
   */
  public function set(Google_Service_SASPortalTesting_SasPortalSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('set', array($params), "Google_Service_SASPortalTesting_SasPortalPolicy");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (policies.test)
   *
   * @param Google_Service_SASPortalTesting_SasPortalTestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalTestPermissionsResponse
   */
  public function test(Google_Service_SASPortalTesting_SasPortalTestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('test', array($params), "Google_Service_SASPortalTesting_SasPortalTestPermissionsResponse");
  }
}
