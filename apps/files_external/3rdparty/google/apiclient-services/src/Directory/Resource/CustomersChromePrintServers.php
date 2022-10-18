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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\AdminEmpty;
use Google\Service\Directory\BatchCreatePrintServersRequest;
use Google\Service\Directory\BatchCreatePrintServersResponse;
use Google\Service\Directory\BatchDeletePrintServersRequest;
use Google\Service\Directory\BatchDeletePrintServersResponse;
use Google\Service\Directory\ListPrintServersResponse;
use Google\Service\Directory\PrintServer;

/**
 * The "printServers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $printServers = $adminService->printServers;
 *  </code>
 */
class CustomersChromePrintServers extends \Google\Service\Resource
{
  /**
   * Creates multiple print servers. (printServers.batchCreatePrintServers)
   *
   * @param string $parent Required. The [unique ID](https://developers.google.com
   * /admin-sdk/directory/reference/rest/v1/customers) of the customer's Google
   * Workspace account. Format: `customers/{id}`
   * @param BatchCreatePrintServersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreatePrintServersResponse
   */
  public function batchCreatePrintServers($parent, BatchCreatePrintServersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreatePrintServers', [$params], BatchCreatePrintServersResponse::class);
  }
  /**
   * Deletes multiple print servers. (printServers.batchDeletePrintServers)
   *
   * @param string $parent Required. The [unique ID](https://developers.google.com
   * /admin-sdk/directory/reference/rest/v1/customers) of the customer's Google
   * Workspace account. Format: `customers/{customer.id}`
   * @param BatchDeletePrintServersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchDeletePrintServersResponse
   */
  public function batchDeletePrintServers($parent, BatchDeletePrintServersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDeletePrintServers', [$params], BatchDeletePrintServersResponse::class);
  }
  /**
   * Creates a print server. (printServers.create)
   *
   * @param string $parent Required. The [unique ID](https://developers.google.com
   * /admin-sdk/directory/reference/rest/v1/customers) of the customer's Google
   * Workspace account. Format: `customers/{id}`
   * @param PrintServer $postBody
   * @param array $optParams Optional parameters.
   * @return PrintServer
   */
  public function create($parent, PrintServer $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PrintServer::class);
  }
  /**
   * Deletes a print server. (printServers.delete)
   *
   * @param string $name Required. The name of the print server to be deleted.
   * Format: `customers/{customer.id}/chrome/printServers/{print_server.id}`
   * @param array $optParams Optional parameters.
   * @return AdminEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AdminEmpty::class);
  }
  /**
   * Returns a print server's configuration. (printServers.get)
   *
   * @param string $name Required. The [unique ID](https://developers.google.com
   * /admin-sdk/directory/reference/rest/v1/customers) of the customer's Google
   * Workspace account. Format: `customers/{id}`
   * @param array $optParams Optional parameters.
   * @return PrintServer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PrintServer::class);
  }
  /**
   * Lists print server configurations.
   * (printServers.listCustomersChromePrintServers)
   *
   * @param string $parent Required. The [unique ID](https://developers.google.com
   * /admin-sdk/directory/reference/rest/v1/customers) of the customer's Google
   * Workspace account. Format: `customers/{id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Search query in [Common Expression Language
   * syntax](https://github.com/google/cel-spec). Supported filters are
   * `display_name`, `description`, and `uri`. Example: `printServer.displayName
   * =='marketing-queue'`.
   * @opt_param string orderBy Sort order for results. Supported values are
   * `display_name`, `description`, or `create_time`. Default order is ascending,
   * but descending order can be returned by appending "desc" to the `order_by`
   * field. For instance, `orderBy=='description desc'` returns the print servers
   * sorted by description in descending order.
   * @opt_param string orgUnitId If `org_unit_id` is present in the request, only
   * print servers owned or inherited by the organizational unit (OU) are
   * returned. If the `PrintServer` resource's `org_unit_id` matches the one in
   * the request, the OU owns the server. If `org_unit_id` is not specified in the
   * request, all print servers are returned or filtered against.
   * @opt_param int pageSize The maximum number of objects to return (default
   * `100`, max `100`). The service might return fewer than this value.
   * @opt_param string pageToken A generated token to paginate results (the
   * `next_page_token` from a previous call).
   * @return ListPrintServersResponse
   */
  public function listCustomersChromePrintServers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPrintServersResponse::class);
  }
  /**
   * Updates a print server's configuration. (printServers.patch)
   *
   * @param string $name Immutable. Resource name of the print server. Leave empty
   * when creating. Format:
   * `customers/{customer.id}/printServers/{print_server.id}`
   * @param PrintServer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to update. Some fields are
   * read-only and cannot be updated. Values for unspecified fields are patched.
   * @return PrintServer
   */
  public function patch($name, PrintServer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PrintServer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersChromePrintServers::class, 'Google_Service_Directory_Resource_CustomersChromePrintServers');
