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

use Google\Service\Directory\DomainAlias;
use Google\Service\Directory\DomainAliases as DomainAliasesModel;

/**
 * The "domainAliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $domainAliases = $adminService->domainAliases;
 *  </code>
 */
class DomainAliases extends \Google\Service\Resource
{
  /**
   * Deletes a domain Alias of the customer. (domainAliases.delete)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param string $domainAliasName Name of domain alias to be retrieved.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $domainAliasName, $optParams = [])
  {
    $params = ['customer' => $customer, 'domainAliasName' => $domainAliasName];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a domain alias of the customer. (domainAliases.get)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param string $domainAliasName Name of domain alias to be retrieved.
   * @param array $optParams Optional parameters.
   * @return DomainAlias
   */
  public function get($customer, $domainAliasName, $optParams = [])
  {
    $params = ['customer' => $customer, 'domainAliasName' => $domainAliasName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DomainAlias::class);
  }
  /**
   * Inserts a domain alias of the customer. (domainAliases.insert)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param DomainAlias $postBody
   * @param array $optParams Optional parameters.
   * @return DomainAlias
   */
  public function insert($customer, DomainAlias $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], DomainAlias::class);
  }
  /**
   * Lists the domain aliases of the customer. (domainAliases.listDomainAliases)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parentDomainName Name of the parent domain for which domain
   * aliases are to be fetched.
   * @return DomainAliasesModel
   */
  public function listDomainAliases($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DomainAliasesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainAliases::class, 'Google_Service_Directory_Resource_DomainAliases');
