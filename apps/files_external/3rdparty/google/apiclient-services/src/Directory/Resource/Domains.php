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

use Google\Service\Directory\Domains as DomainsModel;
use Google\Service\Directory\Domains2;

/**
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $domains = $adminService->domains;
 *  </code>
 */
class Domains extends \Google\Service\Resource
{
  /**
   * Deletes a domain of the customer. (domains.delete)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param string $domainName Name of domain to be deleted
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $domainName, $optParams = [])
  {
    $params = ['customer' => $customer, 'domainName' => $domainName];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a domain of the customer. (domains.get)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param string $domainName Name of domain to be retrieved
   * @param array $optParams Optional parameters.
   * @return DomainsModel
   */
  public function get($customer, $domainName, $optParams = [])
  {
    $params = ['customer' => $customer, 'domainName' => $domainName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DomainsModel::class);
  }
  /**
   * Inserts a domain of the customer. (domains.insert)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param DomainsModel $postBody
   * @param array $optParams Optional parameters.
   * @return DomainsModel
   */
  public function insert($customer, DomainsModel $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], DomainsModel::class);
  }
  /**
   * Lists the domains of the customer. (domains.listDomains)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param array $optParams Optional parameters.
   * @return Domains2
   */
  public function listDomains($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Domains2::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Domains::class, 'Google_Service_Directory_Resource_Domains');
