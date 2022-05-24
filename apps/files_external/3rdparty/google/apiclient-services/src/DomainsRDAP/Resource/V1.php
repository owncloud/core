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

namespace Google\Service\DomainsRDAP\Resource;

use Google\Service\DomainsRDAP\HttpBody;
use Google\Service\DomainsRDAP\RdapResponse;

/**
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $domainsrdapService = new Google\Service\DomainsRDAP(...);
 *   $v1 = $domainsrdapService->v1;
 *  </code>
 */
class V1 extends \Google\Service\Resource
{
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getDomains)
   *
   * @param array $optParams Optional parameters.
   * @return RdapResponse
   */
  public function getDomains($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getDomains', [$params], RdapResponse::class);
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getEntities)
   *
   * @param array $optParams Optional parameters.
   * @return RdapResponse
   */
  public function getEntities($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getEntities', [$params], RdapResponse::class);
  }
  /**
   * Get help information for the RDAP API, including links to documentation.
   * (v1.getHelp)
   *
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function getHelp($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getHelp', [$params], HttpBody::class);
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getIp)
   *
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function getIp($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getIp', [$params], HttpBody::class);
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getNameservers)
   *
   * @param array $optParams Optional parameters.
   * @return RdapResponse
   */
  public function getNameservers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getNameservers', [$params], RdapResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1::class, 'Google_Service_DomainsRDAP_Resource_V1');
