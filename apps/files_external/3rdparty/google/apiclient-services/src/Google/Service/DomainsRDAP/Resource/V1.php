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
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $domainsrdapService = new Google_Service_DomainsRDAP(...);
 *   $v1 = $domainsrdapService->v1;
 *  </code>
 */
class Google_Service_DomainsRDAP_Resource_V1 extends Google_Service_Resource
{
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getDomains)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_RdapResponse
   */
  public function getDomains($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getDomains', array($params), "Google_Service_DomainsRDAP_RdapResponse");
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getEntities)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_RdapResponse
   */
  public function getEntities($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getEntities', array($params), "Google_Service_DomainsRDAP_RdapResponse");
  }
  /**
   * Get help information for the RDAP API, including links to documentation.
   * (v1.getHelp)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_HttpBody
   */
  public function getHelp($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getHelp', array($params), "Google_Service_DomainsRDAP_HttpBody");
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getIp)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_HttpBody
   */
  public function getIp($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getIp', array($params), "Google_Service_DomainsRDAP_HttpBody");
  }
  /**
   * The RDAP API recognizes this command from the RDAP specification but does not
   * support it. The response is a formatted 501 error. (v1.getNameservers)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DomainsRDAP_RdapResponse
   */
  public function getNameservers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getNameservers', array($params), "Google_Service_DomainsRDAP_RdapResponse");
  }
}
