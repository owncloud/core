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
 * The "changes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $changes = $dnsService->changes;
 *  </code>
 */
class Google_Service_Dns_Resource_Changes extends Google_Service_Resource
{
  /**
   * (changes.create)
   *
   * @param string $project
   * @param string $managedZone
   * @param Google_Service_Dns_Change $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Change
   */
  public function create($project, $managedZone, Google_Service_Dns_Change $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_Change");
  }
  /**
   * (changes.get)
   *
   * @param string $project
   * @param string $managedZone
   * @param string $changeId
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Change
   */
  public function get($project, $managedZone, $changeId, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'changeId' => $changeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_Change");
  }
  /**
   * (changes.listChanges)
   *
   * @param string $project
   * @param string $managedZone
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults
   * @opt_param string pageToken
   * @opt_param string sortBy
   * @opt_param string sortOrder
   * @return Google_Service_Dns_ChangesListResponse
   */
  public function listChanges($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ChangesListResponse");
  }
}
