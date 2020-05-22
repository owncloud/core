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
 * The "identity_providers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $identity_providers = $apigeeService->identity_providers;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsZonesIdentityProviders extends Google_Service_Resource
{
  /**
   * Creates an identity provider in a zone. (identity_providers.create)
   *
   * @param string $parent Required. Name of the zone. Use the following structure
   * in your request:   `organizations/{org}/zones/{zone}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1IdentityProvider $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CreateIdentityProviderResponse
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1IdentityProvider $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CreateIdentityProviderResponse");
  }
  /**
   * Gets an identity provider in a zone. (identity_providers.get)
   *
   * @param string $name Required. Name of the identity provider. Use the
   * following structure in your request:
   * `organizations/{org}/zones/{zone}/identity_providers/{identity_provider}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1GetIdentityProviderResponse
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1GetIdentityProviderResponse");
  }
  /**
   * Lists the identity providers in a zone. Underscore in URL
   * (identity_providers.listOrganizationsZonesIdentityProviders)
   *
   * @param string $parent Required. Name of the zone. Use the following structure
   * in your request:   `organizations/{org}/zones/{zone}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListIdentityProvidersResponse
   */
  public function listOrganizationsZonesIdentityProviders($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListIdentityProvidersResponse");
  }
  /**
   * Updates an identity provider in a zone. (identity_providers.patch)
   *
   * @param string $name Required. Name of the identity provider. Use the
   * following structure in your request:
   * `organizations/{org}/zones/{zone}/identity_providers/{identity_provider}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1IdentityProvider $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderResponse
   */
  public function patch($name, Google_Service_Apigee_GoogleCloudApigeeV1IdentityProvider $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderResponse");
  }
  /**
   * Updates the certificate for an identity provider.
   * (identity_providers.updateCertificate)
   *
   * @param string $parent Required. Name of the identity provider. Use the
   * following structure in your request:
   * `organizations/{org}/zones/{zone}/identity_providers/{identity_provider}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderCertificateResponse
   */
  public function updateCertificate($parent, Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCertificate', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderCertificateResponse");
  }
  /**
   * Updates the configuration for an identity provider.
   * (identity_providers.updateConfig)
   *
   * @param string $parent Required. Name of the identity provider. Use the
   * following structure in your request:
   * `organizations/{org}/zones/{zone}/identity_providers/{identity_provider}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderConfigResponse
   */
  public function updateConfig($parent, Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1UpdateIdentityProviderConfigResponse");
  }
}
