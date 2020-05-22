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
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $sites = $apigeeService->sites;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSites extends Google_Service_Resource
{
  /**
   * Creates a new portal. (sites.create)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Site
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Site");
  }
  /**
   * Retrieves the audience feature flag setting for a portal.
   * (sites.getAudiencesenabled)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneAudienceEnabledResponse
   */
  public function getAudiencesenabled($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getAudiencesenabled', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ZoneAudienceEnabledResponse");
  }
  /**
   * Gets the portal configuration. (sites.getConfig)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request:   `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PortalConfigResponse
   */
  public function getConfig($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PortalConfigResponse");
  }
  /**
   * Gets the custom CSS for a portal. (sites.getCustomcss)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomCss
   */
  public function getCustomcss($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getCustomcss', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomCss");
  }
  /**
   * Gets the draft token for a portal. (sites.getDrafttoken)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StringResponse
   */
  public function getDrafttoken($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getDrafttoken', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1StringResponse");
  }
  /**
   * Lists the keystores and certs that are available for TLS configuration.
   * (sites.getKeystores)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1KeystoreSetResponse
   */
  public function getKeystores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getKeystores', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1KeystoreSetResponse");
  }
  /**
   * Gets the organization type for a portal. (sites.getOrgtype)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1StringResponse
   */
  public function getOrgtype($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getOrgtype', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1StringResponse");
  }
  /**
   * Gets the details for a portal. (sites.getPortal)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Site
   */
  public function getPortal($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getPortal', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Site");
  }
  /**
   * Lists all published APIs. (sites.getPublishedapis)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PublishedApisPageResponse
   */
  public function getPublishedapis($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getPublishedapis', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PublishedApisPageResponse");
  }
  /**
   * Gets the SMTP configuration for a portal. (sites.getSmtp)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfigResponse
   */
  public function getSmtp($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getSmtp', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfigResponse");
  }
  /**
   * Gets the title and contents of the page on the portal. (sites.render)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageId
   * @opt_param string draft
   * @return Google_Service_Apigee_GoogleCloudApigeeV1PageContentResponse
   */
  public function render($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('render', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1PageContentResponse");
  }
  /**
   * Sends a test email using the email template. (sites.sendTestEmail)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SendTestEmailPayload $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function sendTestEmail($parent, Google_Service_Apigee_GoogleCloudApigeeV1SendTestEmailPayload $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('send-test-email', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Deletes a portal. (sites.trash)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function trash($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('trash', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
  /**
   * Updates the custom CSS for a portal. (sites.updateCustomcss)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1UpdateCustomCssRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomCss
   */
  public function updateCustomcss($parent, Google_Service_Apigee_GoogleCloudApigeeV1UpdateCustomCssRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCustomcss', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CustomCss");
  }
  /**
   * Updates a portal. (sites.updatePortal)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Site
   */
  public function updatePortal($parent, Google_Service_Apigee_GoogleCloudApigeeV1SiteData $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatePortal', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Site");
  }
  /**
   * Updates the SMTP configuration for a portal. (sites.updateSmtp)
   *
   * @param string $parent Required. Name of the portal. Use the following
   * structure in your request:   `organizations/{org}/sites/{site}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfigResponse
   */
  public function updateSmtp($parent, Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateSmtp', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfigResponse");
  }
}
