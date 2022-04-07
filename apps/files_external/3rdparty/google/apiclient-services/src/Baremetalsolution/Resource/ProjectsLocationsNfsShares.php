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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\ListNfsSharesResponse;
use Google\Service\Baremetalsolution\NfsShare;
use Google\Service\Baremetalsolution\Operation;

/**
 * The "nfsShares" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $nfsShares = $baremetalsolutionService->nfsShares;
 *  </code>
 */
class ProjectsLocationsNfsShares extends \Google\Service\Resource
{
  /**
   * Get details of a single NFS share. (nfsShares.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return NfsShare
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], NfsShare::class);
  }
  /**
   * List NFS shares. (nfsShares.listProjectsLocationsNfsShares)
   *
   * @param string $parent Required. Parent value for ListNfsSharesRequest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param int pageSize Requested page size. The server might return fewer
   * items than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results from the
   * server.
   * @return ListNfsSharesResponse
   */
  public function listProjectsLocationsNfsShares($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNfsSharesResponse::class);
  }
  /**
   * Update details of a single NFS share. (nfsShares.patch)
   *
   * @param string $name Output only. The name of the NFS share.
   * @param NfsShare $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to update. The only currently
   * supported fields are: `labels`
   * @return Operation
   */
  public function patch($name, NfsShare $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsNfsShares::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsNfsShares');
