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

use Google\Service\Apigee\GoogleCloudApigeeV1ActivateNatAddressRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1ListNatAddressesResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1NatAddress;
use Google\Service\Apigee\GoogleLongrunningOperation;

/**
 * The "natAddresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $natAddresses = $apigeeService->natAddresses;
 *  </code>
 */
class OrganizationsInstancesNatAddresses extends \Google\Service\Resource
{
  /**
   * Activates the NAT address. The Apigee instance can now use this for Internet
   * egress traffic. **Note:** Not supported for Apigee hybrid.
   * (natAddresses.activate)
   *
   * @param string $name Required. Name of the nat address. Use the following
   * structure in your request:
   * `organizations/{org}/instances/{instances}/natAddresses/{nataddress}``
   * @param GoogleCloudApigeeV1ActivateNatAddressRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function activate($name, GoogleCloudApigeeV1ActivateNatAddressRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Creates a NAT address. The address is created in the RESERVED state and a
   * static external IP address will be provisioned. At this time, the instance
   * will not use this IP address for Internet egress traffic. The address can be
   * activated for use once any required firewall IP whitelisting has been
   * completed. **Note:** Not supported for Apigee hybrid. (natAddresses.create)
   *
   * @param string $parent Required. Name of the instance. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`
   * @param GoogleCloudApigeeV1NatAddress $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudApigeeV1NatAddress $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the NAT address. Connections that are actively using the address are
   * drained before it is removed. **Note:** Not supported for Apigee hybrid.
   * (natAddresses.delete)
   *
   * @param string $name Required. Name of the nat address. Use the following
   * structure in your request:
   * `organizations/{org}/instances/{instances}/natAddresses/{nataddress}``
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
   * Gets the details of a NAT address. **Note:** Not supported for Apigee hybrid.
   * (natAddresses.get)
   *
   * @param string $name Required. Name of the nat address. Use the following
   * structure in your request:
   * `organizations/{org}/instances/{instances}/natAddresses/{nataddress}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1NatAddress
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1NatAddress::class);
  }
  /**
   * Lists the NAT addresses for an Apigee instance. **Note:** Not supported for
   * Apigee hybrid. (natAddresses.listOrganizationsInstancesNatAddresses)
   *
   * @param string $parent Required. Name of the instance. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of natAddresses to return. Defaults to
   * 25.
   * @opt_param string pageToken Page token, returned from a previous
   * ListNatAddresses call, that you can use to retrieve the next page of content.
   * @return GoogleCloudApigeeV1ListNatAddressesResponse
   */
  public function listOrganizationsInstancesNatAddresses($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListNatAddressesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsInstancesNatAddresses::class, 'Google_Service_Apigee_Resource_OrganizationsInstancesNatAddresses');
