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

namespace Google\Service\DatabaseMigrationService\Resource;

use Google\Service\DatabaseMigrationService\ConnectionProfile;
use Google\Service\DatabaseMigrationService\ListConnectionProfilesResponse;
use Google\Service\DatabaseMigrationService\Operation;
use Google\Service\DatabaseMigrationService\Policy;
use Google\Service\DatabaseMigrationService\SetIamPolicyRequest;
use Google\Service\DatabaseMigrationService\TestIamPermissionsRequest;
use Google\Service\DatabaseMigrationService\TestIamPermissionsResponse;

/**
 * The "connectionProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datamigrationService = new Google\Service\DatabaseMigrationService(...);
 *   $connectionProfiles = $datamigrationService->connectionProfiles;
 *  </code>
 */
class ProjectsLocationsConnectionProfiles extends \Google\Service\Resource
{
  /**
   * Creates a new connection profile in a given project and location.
   * (connectionProfiles.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * connection profiles.
   * @param ConnectionProfile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionProfileId Required. The connection profile
   * identifier.
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function create($parent, ConnectionProfile $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Database Migration Service connection profile. A connection
   * profile can only be deleted if it is not in use by any active migration jobs.
   * (connectionProfiles.delete)
   *
   * @param string $name Required. Name of the connection profile resource to
   * delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force In case of force delete, the CloudSQL replica database
   * is also deleted (only for CloudSQL connection profile).
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single connection profile. (connectionProfiles.get)
   *
   * @param string $name Required. Name of the connection profile resource to get.
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
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (connectionProfiles.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Retrieve a list of all connection profiles in a given project and location.
   * (connectionProfiles.listProjectsLocationsConnectionProfiles)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * connection profiles.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters connection profiles
   * listed in the response. The expression must specify the field name, a
   * comparison operator, and the value that you want to use for filtering. The
   * value must be a string, a number, or a boolean. The comparison operator must
   * be either =, !=, >, or <. For example, list connection profiles created this
   * year by specifying **createTime %gt; 2020-01-01T00:00:00.000000000Z**. You
   * can also filter nested fields. For example, you could specify
   * **mySql.username = %lt;my_username%gt;** to list all connection profiles
   * configured to connect with a specific username.
   * @opt_param string orderBy the order by fields for the result.
   * @opt_param int pageSize The maximum number of connection profiles to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * connection profiles will be returned. The maximum value is 1000; values above
   * 1000 will be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
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
   * Update the configuration of a single connection profile.
   * (connectionProfiles.patch)
   *
   * @param string $name The name of this connection profile resource in the form
   * of projects/{project}/locations/{location}/connectionProfiles/{connectionProf
   * ile}.
   * @param ConnectionProfile $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @opt_param string updateMask Required. Field mask is used to specify the
   * fields to be overwritten in the connection profile resource by the update.
   * @return Operation
   */
  public function patch($name, ConnectionProfile $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (connectionProfiles.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (connectionProfiles.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionProfiles::class, 'Google_Service_DatabaseMigrationService_Resource_ProjectsLocationsConnectionProfiles');
