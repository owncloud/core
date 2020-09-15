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
 * The "identityAwareProxyClients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iapService = new Google_Service_CloudIAP(...);
 *   $identityAwareProxyClients = $iapService->identityAwareProxyClients;
 *  </code>
 */
class Google_Service_CloudIAP_Resource_ProjectsBrandsIdentityAwareProxyClients extends Google_Service_Resource
{
  /**
   * Creates an Identity Aware Proxy (IAP) OAuth client. The client is owned by
   * IAP. Requires that the brand for the project exists and that it is set for
   * internal-only use. (identityAwareProxyClients.create)
   *
   * @param string $parent Required. Path to create the client in. In the
   * following format: projects/{project_number/id}/brands/{brand}. The project
   * must belong to a G Suite account.
   * @param Google_Service_CloudIAP_IdentityAwareProxyClient $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_IdentityAwareProxyClient
   */
  public function create($parent, Google_Service_CloudIAP_IdentityAwareProxyClient $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudIAP_IdentityAwareProxyClient");
  }
  /**
   * Deletes an Identity Aware Proxy (IAP) OAuth client. Useful for removing
   * obsolete clients, managing the number of clients in a given project, and
   * cleaning up after tests. Requires that the client is owned by IAP.
   * (identityAwareProxyClients.delete)
   *
   * @param string $name Required. Name of the Identity Aware Proxy client to be
   * deleted. In the following format: projects/{project_number/id}/brands/{brand}
   * /identityAwareProxyClients/{client_id}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_IapEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudIAP_IapEmpty");
  }
  /**
   * Retrieves an Identity Aware Proxy (IAP) OAuth client. Requires that the
   * client is owned by IAP. (identityAwareProxyClients.get)
   *
   * @param string $name Required. Name of the Identity Aware Proxy client to be
   * fetched. In the following format: projects/{project_number/id}/brands/{brand}
   * /identityAwareProxyClients/{client_id}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_IdentityAwareProxyClient
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudIAP_IdentityAwareProxyClient");
  }
  /**
   * Lists the existing clients for the brand.
   * (identityAwareProxyClients.listProjectsBrandsIdentityAwareProxyClients)
   *
   * @param string $parent Required. Full brand path. In the following format:
   * projects/{project_number/id}/brands/{brand}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of clients to return. The service
   * may return fewer than this value. If unspecified, at most 100 clients will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListIdentityAwareProxyClients` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListIdentityAwareProxyClients` must match the call that provided the page
   * token.
   * @return Google_Service_CloudIAP_ListIdentityAwareProxyClientsResponse
   */
  public function listProjectsBrandsIdentityAwareProxyClients($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIAP_ListIdentityAwareProxyClientsResponse");
  }
  /**
   * Resets an Identity Aware Proxy (IAP) OAuth client secret. Useful if the
   * secret was compromised. Requires that the client is owned by IAP.
   * (identityAwareProxyClients.resetSecret)
   *
   * @param string $name Required. Name of the Identity Aware Proxy client to that
   * will have its secret reset. In the following format: projects/{project_number
   * /id}/brands/{brand}/identityAwareProxyClients/{client_id}.
   * @param Google_Service_CloudIAP_ResetIdentityAwareProxyClientSecretRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIAP_IdentityAwareProxyClient
   */
  public function resetSecret($name, Google_Service_CloudIAP_ResetIdentityAwareProxyClientSecretRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetSecret', array($params), "Google_Service_CloudIAP_IdentityAwareProxyClient");
  }
}
