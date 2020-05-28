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
 * The "domains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasehostingService = new Google_Service_FirebaseHosting(...);
 *   $domains = $firebasehostingService->domains;
 *  </code>
 */
class Google_Service_FirebaseHosting_Resource_ProjectsSitesDomains extends Google_Service_Resource
{
  /**
   * Creates a domain mapping on the specified site. (domains.create)
   *
   * @param string $parent Required. The parent to create the domain association
   * for, in the format: sites/site-name
   * @param Google_Service_FirebaseHosting_Domain $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_Domain
   */
  public function create($parent, Google_Service_FirebaseHosting_Domain $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseHosting_Domain");
  }
  /**
   * Deletes the existing domain mapping on the specified site. (domains.delete)
   *
   * @param string $name Required. The name of the domain association to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_FirebasehostingEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseHosting_FirebasehostingEmpty");
  }
  /**
   * Gets a domain mapping on the specified site. (domains.get)
   *
   * @param string $name Required. The name of the domain configuration to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_Domain
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseHosting_Domain");
  }
  /**
   * Lists the domains for the specified site. (domains.listProjectsSitesDomains)
   *
   * @param string $parent Required. The parent for which to list domains, in the
   * format: sites/site-name
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token from a previous request, if
   * provided.
   * @opt_param int pageSize The page size to return. Defaults to 50.
   * @return Google_Service_FirebaseHosting_ListDomainsResponse
   */
  public function listProjectsSitesDomains($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseHosting_ListDomainsResponse");
  }
  /**
   * Updates the specified domain mapping, creating the mapping as if it does not
   * exist. (domains.update)
   *
   * @param string $name Required. The name of the domain association to update or
   * create, if an association doesn't already exist.
   * @param Google_Service_FirebaseHosting_Domain $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_Domain
   */
  public function update($name, Google_Service_FirebaseHosting_Domain $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_FirebaseHosting_Domain");
  }
}
