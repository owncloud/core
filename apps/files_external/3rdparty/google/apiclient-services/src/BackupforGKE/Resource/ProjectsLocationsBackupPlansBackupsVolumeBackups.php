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

namespace Google\Service\BackupforGKE\Resource;

use Google\Service\BackupforGKE\ListVolumeBackupsResponse;
use Google\Service\BackupforGKE\Policy;
use Google\Service\BackupforGKE\SetIamPolicyRequest;
use Google\Service\BackupforGKE\TestIamPermissionsRequest;
use Google\Service\BackupforGKE\TestIamPermissionsResponse;
use Google\Service\BackupforGKE\VolumeBackup;

/**
 * The "volumeBackups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gkebackupService = new Google\Service\BackupforGKE(...);
 *   $volumeBackups = $gkebackupService->volumeBackups;
 *  </code>
 */
class ProjectsLocationsBackupPlansBackupsVolumeBackups extends \Google\Service\Resource
{
  /**
   * Retrieve the details of a single VolumeBackup. (volumeBackups.get)
   *
   * @param string $name Required. Full name of the VolumeBackup resource. Format:
   * projects/locations/backupPlans/backups/volumeBackups
   * @param array $optParams Optional parameters.
   * @return VolumeBackup
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], VolumeBackup::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (volumeBackups.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
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
   * Lists the VolumeBackups for a given Backup.
   * (volumeBackups.listProjectsLocationsBackupPlansBackupsVolumeBackups)
   *
   * @param string $parent Required. The Backup that contains the VolumeBackups to
   * list. Format: projects/locations/backupPlans/backups
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Field match expression used to filter the results.
   * @opt_param string orderBy Field by which to sort the results.
   * @opt_param int pageSize The target number of results to return in a single
   * response. If not specified, a default value will be chosen by the service.
   * Note that the response may inclue a partial list and a caller should only
   * rely on the response's next_page_token to determine if there are more
   * instances left to be queried.
   * @opt_param string pageToken The value of next_page_token received from a
   * previous `ListVolumeBackups` call. Provide this to retrieve the subsequent
   * page in a multi-page list of results. When paginating, all other parameters
   * provided to `ListVolumeBackups` must match the call that provided the page
   * token.
   * @return ListVolumeBackupsResponse
   */
  public function listProjectsLocationsBackupPlansBackupsVolumeBackups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVolumeBackupsResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (volumeBackups.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * (volumeBackups.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsBackupPlansBackupsVolumeBackups::class, 'Google_Service_BackupforGKE_Resource_ProjectsLocationsBackupPlansBackupsVolumeBackups');
