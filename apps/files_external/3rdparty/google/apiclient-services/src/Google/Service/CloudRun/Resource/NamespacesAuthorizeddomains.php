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
 * The "authorizeddomains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google_Service_CloudRun(...);
 *   $authorizeddomains = $runService->authorizeddomains;
 *  </code>
 */
class Google_Service_CloudRun_Resource_NamespacesAuthorizeddomains extends Google_Service_Resource
{
  /**
   * List authorized domains. (authorizeddomains.listNamespacesAuthorizeddomains)
   *
   * @param string $parent Name of the parent Project resource. Example:
   * `projects/myproject`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @opt_param int pageSize Maximum results to return per page.
   * @return Google_Service_CloudRun_ListAuthorizedDomainsResponse
   */
  public function listNamespacesAuthorizeddomains($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudRun_ListAuthorizedDomainsResponse");
  }
}
