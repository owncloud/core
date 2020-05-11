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
 * The "site" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $site = $apigeeService->site;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesSite extends Google_Service_Resource
{
  /**
   * Updates the custom analytics script for a portal. (site.analytics)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AnalyticsUpdatePayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function analytics($parent, Google_Service_Apigee_GoogleCloudApigeeV1AnalyticsUpdatePayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('analytics', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Restricts portal registration by identifying the individual email addresses
   * or email domains that can create accounts on the portal.
   * (site.approvedEmails)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ApprovedEmailsPayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function approvedEmails($parent, Google_Service_Apigee_GoogleCloudApigeeV1ApprovedEmailsPayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('approvedEmails', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Clones an existing portal. (site.cloneOrganizationsSitesSite)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Site
   */
  public function cloneOrganizationsSitesSite($parent, Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clone', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Site");
  }
  /**
   * Sets the default visibility to all users (public), using the
   * `defaultAnonAllowed` flag, for pages and API products that are published on
   * the portal. (site.defaultanonallowed)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DefaultAnonAllowed $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function defaultanonallowed($parent, Google_Service_Apigee_GoogleCloudApigeeV1DefaultAnonAllowed $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('defaultanonallowed', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Enables or updates the custom domain for a portal. (site.domains)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfigData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfig
   */
  public function domains($parent, Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfigData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('domains', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfig");
  }
  /**
   * Gets the `defaultAnonAllowed` flag setting for a portal. This flag defines
   * the default visibility for pages and API products that are published on the
   * portal. (site.getDefaultanonallowed)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StringResponse
   */
  public function getDefaultanonallowed($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getDefaultanonallowed', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1StringResponse");
  }
  /**
   * Gets the custom domain configuration for a portal. (site.getDomains)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfig
   */
  public function getDomains($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getDomains', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomDomainConfig");
  }
  /**
   * Regenerates the secret key for a portal. (site.key)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function key($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('key', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
}
