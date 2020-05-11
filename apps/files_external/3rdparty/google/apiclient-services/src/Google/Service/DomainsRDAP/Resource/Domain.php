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
 * The "domain" collection of methods.
 * Typical usage is:
 *  <code>
 *   $domainsrdapService = new Google_Service_DomainsRDAP(...);
 *   $domain = $domainsrdapService->domain;
 *  </code>
 */
class Google_Service_DomainsRDAP_Resource_Domain extends Google_Service_Resource
{
  /**
   * Look up RDAP information for a domain by name. (domain.get)
   *
   * @param string $domainName Full domain name to look up. Example: "example.com"
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_HttpBody
   */
  public function get($domainName, $optParams = array())
  {
    $params = array('domainName' => $domainName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DomainsRDAP_HttpBody");
  }
}
