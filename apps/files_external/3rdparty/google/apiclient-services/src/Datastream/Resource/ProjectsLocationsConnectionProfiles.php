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

namespace Google\Service\Datastream\Resource;

use Google\Service\Datastream\ConnectionProfile;
use Google\Service\Datastream\DiscoverConnectionProfileRequest;
use Google\Service\Datastream\DiscoverConnectionProfileResponse;
use Google\Service\Datastream\ListConnectionProfilesResponse;
use Google\Service\Datastream\Operation;

/**
 * The "connectionProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastreamService = new Google\Service\Datastream(...);
 *   $connectionProfiles = $datastreamService->connectionProfiles;
 *  </code>
 */
class ProjectsLocationsConnectionProfiles extends \Google\Service\Resource
{
  /**
   * Use this method to create a connection profile in a project and location.
   * (connectionProfiles.create)
   *
   * @param string $parent Required. The parent that owns the collection of
   * ConnectionProfiles.
   * @param ConnectionProfile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionProfileId Required. The connection profile
   * identifier.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, ConnectionProfile $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Use this method to delete a connection profile.. (connectionProfiles.delete)
   *
   * @param string $name Required. The name of the connection profile resource to
   * delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Use this method to discover a connection profile. The discover API call
   * exposes the data objects and metadata belonging to the profile. Typically, a
   * request returns children data objects under a parent data object that's
   * optionally supplied in the request. (connectionProfiles.discover)
   *
   * @param string $parent Required. The parent resource of the ConnectionProfile
   * type. Must be in the format `projects/locations`.
   * @param DiscoverConnectionProfileRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DiscoverConnectionProfileResponse
   */
  public function discover($parent, DiscoverConnectionProfileRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('discover', [$params], DiscoverConnectionProfileResponse::class);
  }
  /**
   * Use this method to get details about a connection profile.
   * (connectionProfiles.get)
   *
   * @param string $name Required. The name of the connection profile resource to
   * get.
   * @param array $optParams Optional parameters.
   * @return ConnectionProfile
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConnectionProfile::class);
  }
  /**
   * Use this method to list connection profiles created in a project and
   * location. (connectionProfiles.listProjectsLocationsConnectionProfiles)
   *
   * @param string $parent Required. The parent that owns the collection of
   * connection profiles.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter request.
   * @opt_param string orderBy Order by fields for the result.
   * @opt_param int pageSize Maximum number of connection profiles to return. If
   * unspecified, at most 50 connection profiles will be returned. The maximum
   * value is 1000; values above 1000 will be coerced to 1000.
   * @opt_param string pageToken Page token received from a previous
   * `ListConnectionProfiles` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListConnectionProfiles`
   * must match the call that provided the page token.
   * @return ListConnectionProfilesResponse
   */
  public function listProjectsLocationsConnectionProfiles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectionProfilesResponse::class);
  }
  /**
   * Use this method to update the parameters of a connection profile.
   * (connectionProfiles.patch)
   *
   * @param string $name Output only. The resource's name.
   * @param ConnectionProfile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Optional. Field mask is used to specify the
   * fields to be overwritten in the ConnectionProfile resource by the update. The
   * fields specified in the update_mask are relative to the resource, not the
   * full request. A field will be overwritten if it is in the mask. If the user
   * does not provide a mask then all fields will be overwritten.
   * @opt_param bool validateOnly Optional. Only validate the connection profile,
   * but do not update any resources. The default is false.
   * @return Operation
   */
  public function patch($name, ConnectionProfile $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionProfiles::class, 'Google_Service_Datastream_Resource_ProjectsLocationsConnectionProfiles');
