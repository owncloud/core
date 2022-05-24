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

use Google\Service\DatabaseMigrationService\GenerateSshScriptRequest;
use Google\Service\DatabaseMigrationService\ListMigrationJobsResponse;
use Google\Service\DatabaseMigrationService\MigrationJob;
use Google\Service\DatabaseMigrationService\Operation;
use Google\Service\DatabaseMigrationService\Policy;
use Google\Service\DatabaseMigrationService\PromoteMigrationJobRequest;
use Google\Service\DatabaseMigrationService\RestartMigrationJobRequest;
use Google\Service\DatabaseMigrationService\ResumeMigrationJobRequest;
use Google\Service\DatabaseMigrationService\SetIamPolicyRequest;
use Google\Service\DatabaseMigrationService\SshScript;
use Google\Service\DatabaseMigrationService\StartMigrationJobRequest;
use Google\Service\DatabaseMigrationService\StopMigrationJobRequest;
use Google\Service\DatabaseMigrationService\TestIamPermissionsRequest;
use Google\Service\DatabaseMigrationService\TestIamPermissionsResponse;
use Google\Service\DatabaseMigrationService\VerifyMigrationJobRequest;

/**
 * The "migrationJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datamigrationService = new Google\Service\DatabaseMigrationService(...);
 *   $migrationJobs = $datamigrationService->migrationJobs;
 *  </code>
 */
class ProjectsLocationsMigrationJobs extends \Google\Service\Resource
{
  /**
   * Creates a new migration job in a given project and location.
   * (migrationJobs.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * migration jobs.
   * @param MigrationJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string migrationJobId Required. The ID of the instance to create.
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function create($parent, MigrationJob $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single migration job. (migrationJobs.delete)
   *
   * @param string $name Required. Name of the migration job resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force The destination CloudSQL connection profile is always
   * deleted with the migration job. In case of force delete, the destination
   * CloudSQL replica database is also deleted.
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
   * Generate a SSH configuration script to configure the reverse SSH
   * connectivity. (migrationJobs.generateSshScript)
   *
   * @param string $migrationJob Name of the migration job resource to generate
   * the SSH script.
   * @param GenerateSshScriptRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SshScript
   */
  public function generateSshScript($migrationJob, GenerateSshScriptRequest $postBody, $optParams = [])
  {
    $params = ['migrationJob' => $migrationJob, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('generateSshScript', [$params], SshScript::class);
  }
  /**
   * Gets details of a single migration job. (migrationJobs.get)
   *
   * @param string $name Required. Name of the migration job resource to get.
   * @param array $optParams Optional parameters.
   * @return MigrationJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MigrationJob::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (migrationJobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
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
   * Lists migration jobs in a given project and location.
   * (migrationJobs.listProjectsLocationsMigrationJobs)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * migrationJobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters migration jobs
   * listed in the response. The expression must specify the field name, a
   * comparison operator, and the value that you want to use for filtering. The
   * value must be a string, a number, or a boolean. The comparison operator must
   * be either =, !=, >, or <. For example, list migration jobs created this year
   * by specifying **createTime %gt; 2020-01-01T00:00:00.000000000Z.** You can
   * also filter nested fields. For example, you could specify
   * **reverseSshConnectivity.vmIp = "1.2.3.4"** to select all migration jobs
   * connecting through the specific SSH tunnel bastion.
   * @opt_param string orderBy Sort the results based on the migration job name.
   * Valid values are: "name", "name asc", and "name desc".
   * @opt_param int pageSize The maximum number of migration jobs to return. The
   * service may return fewer than this value. If unspecified, at most 50
   * migration jobs will be returned. The maximum value is 1000; values above 1000
   * will be coerced to 1000.
   * @opt_param string pageToken The nextPageToken value received in the previous
   * call to migrationJobs.list, used in the subsequent request to retrieve the
   * next page of results. On first call this should be left blank. When
   * paginating, all other parameters provided to migrationJobs.list must match
   * the call that provided the page token.
   * @return ListMigrationJobsResponse
   */
  public function listProjectsLocationsMigrationJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMigrationJobsResponse::class);
  }
  /**
   * Updates the parameters of a single migration job. (migrationJobs.patch)
   *
   * @param string $name The name (URI) of this migration job resource, in the
   * form of:
   * projects/{project}/locations/{location}/migrationJobs/{migrationJob}.
   * @param MigrationJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique id used to identify the request. If the
   * server receives two requests with the same id, then the second request will
   * be ignored. It is recommended to always set this value to a UUID. The id must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @opt_param string updateMask Required. Field mask is used to specify the
   * fields to be overwritten in the migration job resource by the update.
   * @return Operation
   */
  public function patch($name, MigrationJob $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Promote a migration job, stopping replication to the destination and
   * promoting the destination to be a standalone database.
   * (migrationJobs.promote)
   *
   * @param string $name Name of the migration job resource to promote.
   * @param PromoteMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function promote($name, PromoteMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('promote', [$params], Operation::class);
  }
  /**
   * Restart a stopped or failed migration job, resetting the destination instance
   * to its original state and starting the migration process from scratch.
   * (migrationJobs.restart)
   *
   * @param string $name Name of the migration job resource to restart.
   * @param RestartMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function restart($name, RestartMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restart', [$params], Operation::class);
  }
  /**
   * Resume a migration job that is currently stopped and is resumable (was
   * stopped during CDC phase). (migrationJobs.resume)
   *
   * @param string $name Name of the migration job resource to resume.
   * @param ResumeMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function resume($name, ResumeMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resume', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (migrationJobs.setIamPolicy)
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
   * Start an already created migration job. (migrationJobs.start)
   *
   * @param string $name Name of the migration job resource to start.
   * @param StartMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($name, StartMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Stops a running migration job. (migrationJobs.stop)
   *
   * @param string $name Name of the migration job resource to stop.
   * @param StopMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($name, StopMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (migrationJobs.testIamPermissions)
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
  /**
   * Verify a migration job, making sure the destination can reach the source and
   * that all configuration and prerequisites are met. (migrationJobs.verify)
   *
   * @param string $name Name of the migration job resource to verify.
   * @param VerifyMigrationJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function verify($name, VerifyMigrationJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verify', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsMigrationJobs::class, 'Google_Service_DatabaseMigrationService_Resource_ProjectsLocationsMigrationJobs');
