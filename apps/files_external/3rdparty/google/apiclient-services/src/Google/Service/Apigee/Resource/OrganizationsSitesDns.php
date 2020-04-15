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
 * The "dns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $dns = $apigeeService->dns;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesDns extends Google_Service_Resource
{
  /**
   * Checks DNS to verify that a domain has the expected canonical name (CNAME)
   * record. (dns.check)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DnsCnameCheck $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DomainVerifiedResponse
   */
  public function check($parent, Google_Service_Apigee_GoogleCloudApigeeV1DnsCnameCheck $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('check', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DomainVerifiedResponse");
  }
}
