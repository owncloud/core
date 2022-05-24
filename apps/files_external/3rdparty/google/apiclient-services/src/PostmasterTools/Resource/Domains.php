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

namespace Google\Service\PostmasterTools\Resource;

use Google\Service\PostmasterTools\Domain;
use Google\Service\PostmasterTools\ListDomainsResponse;

/**
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailpostmastertoolsService = new Google\Service\PostmasterTools(...);
 *   $domains = $gmailpostmastertoolsService->domains;
 *  </code>
 */
class Domains extends \Google\Service\Resource
{
  /**
   * Gets a specific domain registered by the client. Returns NOT_FOUND if the
   * domain does not exist. (domains.get)
   *
   * @param string $name The resource name of the domain. It should have the form
   * `domains/{domain_name}`, where domain_name is the fully qualified domain
   * name.
   * @param array $optParams Optional parameters.
   * @return Domain
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Domain::class);
  }
  /**
   * Lists the domains that have been registered by the client. The order of
   * domains in the response is unspecified and non-deterministic. Newly created
   * domains will not necessarily be added to the end of this list.
   * (domains.listDomains)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Server may return fewer domains
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any. This is the value of
   * ListDomainsResponse.next_page_token returned from the previous call to
   * `ListDomains` method.
   * @return ListDomainsResponse
   */
  public function listDomains($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDomainsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Domains::class, 'Google_Service_PostmasterTools_Resource_Domains');
