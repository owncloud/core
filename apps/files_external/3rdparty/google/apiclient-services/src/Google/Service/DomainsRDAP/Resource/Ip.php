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
 * The "ip" collection of methods.
 * Typical usage is:
 *  <code>
 *   $domainsrdapService = new Google_Service_DomainsRDAP(...);
 *   $ip = $domainsrdapService->ip;
 *  </code>
 */
class Google_Service_DomainsRDAP_Resource_Ip extends Google_Service_Resource
{
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (ip.get)
   *
   * @param string $ipId
   * @param string $ipId1
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_RdapResponse
   */
  public function get($ipId, $ipId1, $optParams = array())
  {
    $params = array('ipId' => $ipId, 'ipId1' => $ipId1);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DomainsRDAP_RdapResponse");
  }
}
