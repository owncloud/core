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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1GetSyncAuthorizationRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1IngressConfig;
use Google\Service\Apigee\GoogleCloudApigeeV1ListOrganizationsResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1Organization;
use Google\Service\Apigee\GoogleCloudApigeeV1RuntimeConfig;
use Google\Service\Apigee\GoogleCloudApigeeV1SetAddonsRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1SyncAuthorization;
use Google\Service\Apigee\GoogleLongrunningOperation;

/**
 * The "organizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $organizations = $apigeeService->organizations;
 *  </code>
 */
class Organizations extends \Google\Service\Resource
{
  /**
   * Creates an Apigee organization. See [Create an Apigee
   * organization](https://cloud.google.com/apigee/docs/api-platform/get-started
   * /create-org). (organizations.create)
   *
   * @param GoogleCloudApigeeV1Organization $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent Required. Name of the GCP project in which to
   * associate the Apigee organization. Pass the information as a query parameter
   * using the following structure in your request: `projects/`
   * @return GoogleLongrunningOperation
   */
  public function create(GoogleCloudApigeeV1Organization $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Delete an Apigee organization. Only supported for SubscriptionType TRIAL.
   * (organizations.delete)
   *
   * @param string $name Required. Name of the organization. Use the following
   * structure in your request: `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets the profile for an Apigee organization. See [Understanding
   * organizations](https://cloud.google.com/apigee/docs/api-platform/fundamentals
   * /organization-structure). (organizations.get)
   *
   * @param string $name Required. Apigee organization name in the following
   * format: `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Organization
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Organization::class);
  }
  /**
   * Gets the deployed ingress configuration for an organization.
   * (organizations.getDeployedIngressConfig)
   *
   * @param string $name Required. Name of the deployed configuration for the
   * organization in the following format:
   * 'organizations/{org}/deployedIngressConfig'.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view When set to FULL, additional details about the
   * specific deployments receiving traffic will be included in the IngressConfig
   * response's RoutingRules.
   * @return GoogleCloudApigeeV1IngressConfig
   */
  public function getDeployedIngressConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getDeployedIngressConfig', [$params], GoogleCloudApigeeV1IngressConfig::class);
  }
  /**
   * Get runtime config for an organization. (organizations.getRuntimeConfig)
   *
   * @param string $name Required. Name of the runtime config for the organization
   * in the following format: 'organizations/{org}/runtimeConfig'.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1RuntimeConfig
   */
  public function getRuntimeConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getRuntimeConfig', [$params], GoogleCloudApigeeV1RuntimeConfig::class);
  }
  /**
   * Lists the service accounts with the permissions required to allow the
   * Synchronizer to download environment data from the control plane. An ETag is
   * returned in the response to `getSyncAuthorization`. Pass that ETag when
   * calling [setSyncAuthorization](setSyncAuthorization) to ensure that you are
   * updating the correct version. If you don't pass the ETag in the call to
   * `setSyncAuthorization`, then the existing authorization is overwritten
   * indiscriminately. For more information, see [Configure the
   * Synchronizer](https://cloud.google.com/apigee/docs/hybrid/latest
   * /synchronizer-access). **Note**: Available to Apigee hybrid only.
   * (organizations.getSyncAuthorization)
   *
   * @param string $name Required. Name of the Apigee organization. Use the
   * following structure in your request: `organizations/{org}`
   * @param GoogleCloudApigeeV1GetSyncAuthorizationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SyncAuthorization
   */
  public function getSyncAuthorization($name, GoogleCloudApigeeV1GetSyncAuthorizationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getSyncAuthorization', [$params], GoogleCloudApigeeV1SyncAuthorization::class);
  }
  /**
   * Lists the Apigee organizations and associated GCP projects that you have
   * permission to access. See [Understanding
   * organizations](https://cloud.google.com/apigee/docs/api-platform/fundamentals
   * /organization-structure). (organizations.listOrganizations)
   *
   * @param string $parent Required. Use the following structure in your request:
   * `organizations`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ListOrganizationsResponse
   */
  public function listOrganizations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListOrganizationsResponse::class);
  }
  /**
   * Configures the add-ons for the Apigee organization. The existing add-on
   * configuration will be fully replaced. (organizations.setAddons)
   *
   * @param string $org Required. Name of the organization. Use the following
   * structure in your request: `organizations/{org}`
   * @param GoogleCloudApigeeV1SetAddonsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function setAddons($org, GoogleCloudApigeeV1SetAddonsRequest $postBody, $optParams = [])
  {
    $params = ['org' => $org, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAddons', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the permissions required to allow the Synchronizer to download
   * environment data from the control plane. You must call this API to enable
   * proper functioning of hybrid. Pass the ETag when calling
   * `setSyncAuthorization` to ensure that you are updating the correct version.
   * To get an ETag, call [getSyncAuthorization](getSyncAuthorization). If you
   * don't pass the ETag in the call to `setSyncAuthorization`, then the existing
   * authorization is overwritten indiscriminately. For more information, see
   * [Configure the
   * Synchronizer](https://cloud.google.com/apigee/docs/hybrid/latest
   * /synchronizer-access). **Note**: Available to Apigee hybrid only.
   * (organizations.setSyncAuthorization)
   *
   * @param string $name Required. Name of the Apigee organization. Use the
   * following structure in your request: `organizations/{org}`
   * @param GoogleCloudApigeeV1SyncAuthorization $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SyncAuthorization
   */
  public function setSyncAuthorization($name, GoogleCloudApigeeV1SyncAuthorization $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setSyncAuthorization', [$params], GoogleCloudApigeeV1SyncAuthorization::class);
  }
  /**
   * Updates the properties for an Apigee organization. No other fields in the
   * organization profile will be updated. (organizations.update)
   *
   * @param string $name Required. Apigee organization name in the following
   * format: `organizations/{org}`
   * @param GoogleCloudApigeeV1Organization $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Organization
   */
  public function update($name, GoogleCloudApigeeV1Organization $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1Organization::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Organizations::class, 'Google_Service_Apigee_Resource_Organizations');
