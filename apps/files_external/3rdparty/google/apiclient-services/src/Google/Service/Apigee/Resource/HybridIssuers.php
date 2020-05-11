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
 * The "issuers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $issuers = $apigeeService->issuers;
 *  </code>
 */
class Google_Service_Apigee_Resource_HybridIssuers extends Google_Service_Resource
{
  /**
   * Lists hybrid services and its trusted issuers service account ids. This api
   * is authenticated and unauthorized(allow all the users) and used by runtime
   * authn-authz service to query control plane's issuer service account ids.
   * (issuers.listHybridIssuers)
   *
   * @param string $name Required. Must be of the form `hybrid/issuers`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListHybridIssuersResponse
   */
  public function listHybridIssuers($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListHybridIssuersResponse");
  }
}
