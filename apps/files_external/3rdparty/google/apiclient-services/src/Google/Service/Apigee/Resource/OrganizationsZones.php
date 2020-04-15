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
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $zones = $apigeeService->zones;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsZones extends Google_Service_Resource
{
  /**
   * Validates a certificate in a zone. (zones.certificate)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1VerifyCertificateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1VerifyCertificateResponse
   */
  public function certificate($parent, Google_Service_Apigee_GoogleCloudApigeeV1VerifyCertificateRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('certificate', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1VerifyCertificateResponse");
  }
  /**
   * Gets a zone. (zones.get)
   *
   * @param string $name Required. Name of the zone. Use the following structure
   * in your request:   `organizations/{org}/zones/{zone}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1GetZoneResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1GetZoneResponse");
  }
  /**
   * Lists the zones for an Apigee organization. (zones.listOrganizationsZones)
   *
   * @param string $parent Required. Name for the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListZonesResponse
   */
  public function listOrganizationsZones($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListZonesResponse");
  }
  /**
   * ** Note**: This feature is not available to Apigee hybrid at this time.
   *
   * Sends a test email to verify the SMTP settings for an identity provider.
   * Sends the email to the requester's email using the token. (zones.testemail)
   *
   * @param string $parent Required. Name of the zone. Use the following structure
   * in your request:   `organizations/{org}/zones/{zone}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TestEmail $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function testemail($parent, Google_Service_Apigee_GoogleCloudApigeeV1TestEmail $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testemail', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Updates a zone. (zones.update)
   *
   * @param string $name Required. Name of the zone. Use the following structure
   * in your request:   `organizations/{org}/zones/{zone}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Zone $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1UpdateZoneResponse
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1Zone $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1UpdateZoneResponse");
  }
}
